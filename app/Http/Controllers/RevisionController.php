<?php

namespace App\Http\Controllers;

use App\Models\DirectorioEmpresaExtras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Productos;
use App\Models\DirectorioProductoSolicituds;
use App\Models\Rubro;
use App\Models\Categoria;
use App\Models\Monedas;
use App\Models\UnidadMedidas;
use App\Models\Empresas;
use App\Models\GrupoRubro;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

use Illuminate\Contracts\Encryption\DecryptException;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class RevisionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function publicarProd(Request $request,$id)
    {

        $id_ddjj = Crypt::decryptString($id);

        $productos = DB::table('directorio.directorio_productos as ddp')
                    ->select('*')
                    ->where('ddp.id_ddjj', $id_ddjj)->get()[0];

        $asignacion = $this->asignarRevisor();

        //**EXTRAYENDO ID_REVISOR PARA OBTENER ID_REGIONAL */
        $query = "  SELECT a.id_regional from empresas_personas a
                    where a.id_persona = ? and a.estado is true and a.id_rol in (5,6,7)
                    order by a.id_empresa_persona desc";
        $ddjj_solicituds_regional = DB::select($query, [$asignacion['id_revisor']])[0];

        DirectorioProductoSolicituds::create([
            'id_producto_solicitud_estado' => 1,
            'id_producto' => $productos->id_producto,
            'id_empresa' => $productos->id_empresa,
            'id_revisor' => $asignacion['id_revisor'],
            'id_regional' => $ddjj_solicituds_regional->id_regional,
            'fecha_registro' => now(),
            'fecha_asignacion' => $asignacion['f_inicio'],
            'fecha_revision' => NULL,
            'solicitud_observaciones' => '',
            'fecha_limite' => $asignacion['f_fin'],
            'id_persona' => Auth::id(),
        ]);

        return redirect()->route('list-prod-admin', ['id' => $productos->id_empresa]);
    }

    private function asignarRevisor()
    {
        /**LISTA DE OPERADORES, ASIGNACIÓN POR RONDA*/
        $query = " SELECT a.id_persona, a.id_regional
                    from empresas_personas a
                    where a.id_empresa = 1 and a.id_rol in (5)
                    and a.estado is true
                    order by a.id_persona";
        $certificadores = DB::select($query);

        /**ULTIMO REVISOR */
        $query_producto = " SELECT * from (
                                SELECT dps.id_producto 
                                from directorio.directorio_productos ddp
                                left join directorio.producto_solicituds dps on dps.id_producto = ddp.id_producto
                                where dps.id_producto_solicitud is not null	
                            order by ddp.id_producto desc
                        ) a	group by a.id_producto";
        $result_producto = DB::select($query_producto);        
        $ultimo_id_producto = $result_producto[0]->id_producto;
        
        $query_solicitud = " SELECT dps.id_revisor
                                from directorio.producto_solicituds dps
                                where dps.id_producto = ?
                                order by dps.id_producto_solicitud desc
                            limit 1";
        $result_solicitud = DB::select($query_solicitud,[$ultimo_id_producto]);        
        $ultimo_id_revisor = $result_solicitud[0]->id_revisor;
        
        /*BUSQUEDA DE ULTIMO REVISOR PARA INICIAR INDEX*/
        $count = count($certificadores);
        $j = 0;
        $encontrado = false;
        do {
            $id_certificador = $certificadores[$j]->id_persona;
            if ($id_certificador == $ultimo_id_revisor) {
                $encontrado = true;
            } else {
                $j = $j + 1;
            }
        } while (($j < $count) && (!$encontrado));

        /*EN CASO DE DESBORDE DE LISTA VUELVE A EMPEZAR*/
        $j = $j + 1;
        if ($j >= $count){
            $j = 0;
        }
        
        //** COMPRUEBA PROCENTAJE, FERIADOS Y VACACIONES, PARA ASIGNAR TRABAJO AL CERTIFICADOR*/        
        /*La busqueda asigna el index de él siguiente revisor despues del ultimo*/
        $encontrado = false;
        do {
            /** COMPROBACION DE CONDICIONES PARA ASIGNACIÓN*/
            /** VERIFICA DE UNO EN UNO A LOS POSTULANTE */
            $id_persona = $certificadores[$j]->id_persona;
            $id_departamento = $certificadores[$j]->id_regional;
            
            $sql_asignaciones = "   SELECT a.directorio
                                    from rrhh_asignaciones a where a.id_revisor = ? and a.id_estado = 1
                                    order by a.id_rrhh_asignaciones desc
                                    limit 1 ";
            $asignaciones = DB::select($sql_asignaciones,[$id_persona])[0];
            $directorio_porcentaje = $asignaciones->directorio;

            $sql_permisos = "   SELECT a.id_estado, a.fecha_hora_inicio, a.fecha_hora_fin
                                    from rrhh_permisos a
                                    where a.id_revisor = ?
                                    order by a.id_rrhh_permisos desc
                                    limit 1 ";
            $permisos = DB::select($sql_permisos,[$id_persona]);

            $estado_vacacion = -1;
            $fecha_hora_inicio_vacacion = -1;
            $fecha_hora_fin_vacacion = -1;

            if (count($permisos) > 0){                
                $estado_vacacion = $permisos[0]->id_estado;
                $fecha_hora_inicio_vacacion = $permisos[0]->fecha_hora_inicio;
                $fecha_hora_fin_vacacion = $permisos[0]->fecha_hora_fin;
            }

            $porcentaje_control = false;
            $vacacion_control = false;

            /** COMPROBACIÓN PORCENTAJE */
            $random_asignacion = random_int(1, 100);
            if ($random_asignacion <= $directorio_porcentaje){
                $porcentaje_control = true;
            } else {
                $porcentaje_control = false;
            }

            /** CALCULO DE FECHAS */
            $date = now();
            $datestr = $date->format('Y-m-d H:i:s');
            $query = "select * from calculofechasddjj('".$datestr."', '".$id_departamento."', '48');";
            $fechasAsignacion = DB::select($query)[0];
            $f_inicio = $fechasAsignacion->f_inicio;
            $f_fin = $fechasAsignacion->f_fin;

            /** COMPROBACIÓN DE FECHAS EN CASO DE QUE TENGA PERMISO APROBADO*/
            if ($estado_vacacion == 2){
                if (now() > $fecha_hora_fin_vacacion){
                    $vacacion_control = true;
                } else {
                    if ($f_fin < $fecha_hora_inicio_vacacion){
                        $vacacion_control = true;
                    } else {
                        $vacacion_control = false;
                    }    
                }
            } else {
                $vacacion_control = true;
            }

            /** SI SE CUMPLEN AMBAS CONDICIONES SE ASIGNA LA TAREA AL REVISOR */
            if (($porcentaje_control) && ($vacacion_control)) {
                $encontrado = true;
            } else {
                $encontrado = false;
                $j = $j + 1;
                if ($j >= $count){
                    $j = 0;
                }
            }
        } while (($j < $count) && (!$encontrado));

        $array_asignacion = [
            "id_revisor" => $certificadores[$j]->id_persona,
            "f_inicio" => $f_inicio,
            "f_fin" => $f_fin,
        ];
        return $array_asignacion;
    }

    public function listProdRechazadas($id)
    {
        $idDes = Crypt::decryptString($id);

        $empresas = DB::table('empresas')
            ->join('ruexs', 'empresas.id_empresa', '=', 'ruexs.id_empresa')
            ->join('empresas_personas', 'empresas.id_empresa', '=', 'empresas_personas.id_empresa')
            ->join('personas', 'empresas_personas.id_persona', '=', 'personas.id_persona')
            ->join('users', 'personas.id_persona', '=', 'users.id_persona')
            ->select('empresas.*', 'users.*', 'ruexs.*')
            ->where('empresas.id_empresa', $idDes)->first();

        $rol = DB::table('rols')
            ->join('empresas_personas', 'rols.id_rol', '=', 'empresas_personas.id_rol')
            ->join('personas', 'empresas_personas.id_persona', '=', 'personas.id_persona')
            ->join('users', 'personas.id_persona', '=', 'users.id_persona')
            ->select('rols.id_rol', 'rols.rol')
            ->where('id_user', Auth::id(), )->get();

        $productos = DB::table('ddjjs as dj')
            ->leftjoin('directorio.directorio_productos as dp', 'dj.id_ddjj', '=', 'dp.id_ddjj')
            ->join('directorio.producto_solicituds as dps', 'dps.id_producto', '=', 'dp.id_producto')
            ->join('ddjj_datos_mercancias as dm', 'dj.id_ddjj', '=', 'dm.id_ddjj')
            ->join('acuerdos as a', 'a.id_acuerdo', '=', 'dj.id_acuerdo')
            ->join('empresas as e', 'dj.id_empresa', '=', 'e.id_empresa')
            ->select('*')
            ->where('dj.id_empresa', $idDes)
            ->whereIn('dps.id_producto_solicitud_estado', [3])->get();

        return view('listas_exportador.rechazadas', [
            'empresas' => $empresas,
            'roles' => $rol,
            'productos' => $productos,
            'idempresas' => $idDes
        ]);
    }

    public function listProdPublicados($id)
    {
        $idDes = Crypt::decryptString($id);

        $empresas = DB::table('empresas')
            ->join('ruexs', 'empresas.id_empresa', '=', 'ruexs.id_empresa')
            ->join('empresas_personas', 'empresas.id_empresa', '=', 'empresas_personas.id_empresa')
            ->join('personas', 'empresas_personas.id_persona', '=', 'personas.id_persona')
            ->join('users', 'personas.id_persona', '=', 'users.id_persona')
            ->select('empresas.*', 'users.*', 'ruexs.*')
            ->where('empresas.id_empresa', $idDes)->first();

        $rol = DB::table('rols')
            ->join('empresas_personas', 'rols.id_rol', '=', 'empresas_personas.id_rol')
            ->join('personas', 'empresas_personas.id_persona', '=', 'personas.id_persona')
            ->join('users', 'personas.id_persona', '=', 'users.id_persona')
            ->select('rols.id_rol', 'rols.rol')
            ->where('id_user', Auth::id(), )->get();

        $productos = DB::table('ddjjs as dj')
            ->leftjoin('directorio.directorio_productos as dp', 'dj.id_ddjj', '=', 'dp.id_ddjj')
            ->join('directorio.producto_solicituds as dps', 'dps.id_producto', '=', 'dp.id_producto')
            ->join('ddjj_datos_mercancias as dm', 'dj.id_ddjj', '=', 'dm.id_ddjj')
            ->join('acuerdos as a', 'a.id_acuerdo', '=', 'dj.id_acuerdo')
            ->join('empresas as e', 'dj.id_empresa', '=', 'e.id_empresa')
            ->select('*')
            ->where('dj.id_empresa', $idDes)
            ->whereIn('dps.id_producto_solicitud_estado', [3])->get();

        return view('listas_exportador.publicados', [
            'empresas' => $empresas,
            'roles' => $rol,
            'productos' => $productos,
            'idempresas' => $idDes
        ]);
    }
}
