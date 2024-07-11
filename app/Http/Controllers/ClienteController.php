<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Rubro;
use App\Models\Categoria;
use App\Models\Monedas;
use App\Models\UnidadMedidas;
use App\Models\Empresas;
use App\Models\GrupoRubro;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class ClienteController extends Controller
{
    public function index()
    {
        return view('vistas.inicio');
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////
    public function productosBusqueda(Request $request)
    {
        $descripcion_busqueda = $request->get('descripcion_busqueda');

        $sql_busqueda = "SELECT d.id_ddjj, ddm.denominacion_comercial, e.id_empresa, e.razon_social, ddp.id_producto, ddp.path_file_photo1, ddp.path_file_photo2, ddp.path_file_photo3    
                            from ddjjs d
                            inner join empresas e on e.id_empresa = d.id_empresa
                            inner join ddjj_datos_mercancias ddm on ddm.id_ddjj = d.id_ddjj
                            inner join directorio.directorio_productos ddp on ddp.id_ddjj =  d.id_ddjj
                            inner join directorio.producto_solicituds dps on dps.id_producto = ddp.id_producto
                            where ddm.denominacion_comercial like '%" . $descripcion_busqueda . "%'
                            and e.id_estado_empresa = 4 and d.id_ddjj_estado in (6, 9, 10, 11)  and dps.id_producto_solicitud_estado = 2";


        //$productos = DB::table('ddjjs as d')
        //    ->join('empresas as e', 'e.id_empresa', '=', 'd.id_empresa')
        //    ->join('ddjj_datos_mercancias as ddm', 'ddm.id_ddjj', '=', 'd.id_ddjj')
        //    ->join('directorio.directorio_productos as ddp', 'ddp.id_ddjj', '=', 'd.id_ddjj')
        //    ->join('directorio.producto_solicituds as dps', 'dps.id_producto', '=', 'ddp.id_producto')
        //    ->select('*')
        //    ->where('ddm.denominacion_comercial', 'like', '%' . $descripcion_busqueda . '%')
        //    ->whereIn('e.id_estado_empresa',[4])
        //    ->whereIn('d.id_ddjj_estado',[6,9,10,11])
        //    ->whereIn('dps.id_producto_solicitud_estado', [2])->get();
            
        $result_busqueda = DB::select($sql_busqueda);

        return view('vistas.busqueda_productos', [
        //    'productos' => $productos,
            'result_busqueda' => $result_busqueda,
            'descripcion_busqueda' => $descripcion_busqueda
        ]);
    }
    public function oneProducto($id)
    {
        $idDes = Crypt::decryptString($id);
        $detProducto = DB::table('ddjjs as d')
            ->join('empresas as e', 'd.id_empresa', '=', 'e.id_empresa')
            ->leftjoin('directorio.directorio_empresa_extras as dee', 'dee.id_empresa', '=', 'e.id_empresa')
            ->join('ddjj_datos_mercancias as ddm', 'ddm.id_ddjj', '=', 'd.id_ddjj')
            ->join('directorio.directorio_productos as ddp', 'ddp.id_ddjj', '=', 'd.id_ddjj')
            ->join('empresa_rubros as er', 'ddp.id_empresa_rubro', '=', 'er.id_rubro')
            ->join('directorio.producto_solicituds as dps', 'dps.id_producto', '=', 'ddp.id_producto')
            ->select('e.*', 'ddp.*', 'ddm.*', 'dee.*', 'er.*')
            ->where('ddp.id_producto', $idDes)->first();
        //"SELECT d.id_ddjj, ddm.denominacion_comercial, e.id_empresa, e.razon_social, ddp.id_producto, ddp.path_file_photo1, ddp.path_file_photo2, ddp.path_file_photo3    
        //                    from ddjjs d
        //                    inner join empresas e on e.id_empresa = d.id_empresa
        //                    inner join ddjj_datos_mercancias ddm on ddm.id_ddjj = d.id_ddjj
        //                    inner join directorio.directorio_productos ddp on ddp.id_ddjj =  d.id_ddjj
        //                    inner join directorio.producto_solicituds dps on dps.id_producto = ddp.id_producto
        //                    where ddm.denominacion_comercial like '%" . $descripcion_busqueda . "%'
        //                    and e.id_estado_empresa = 4 and d.id_ddjj_estado in (6, 9, 10, 11) ";
        //$productos = DB::table('productos')
        //                ->join('empresas', 'empresas.id_empresa', '=', 'productos.id_empresa')
        //                ->join('monedas', 'monedas.id_moneda', '=', 'productos.id_moneda')
        //                ->select('productos.*', 'monedas.*', 'empresas.*')
        //                ->where([
        //                    ['productos.estado', 'activo'],
        //                    ['empresas.estado', 'activo'],
        //                    ['productos.id_rubro',$detProducto->id_rubro]
        //                ])->orderByDesc('productos.updated_at','empresas.updated_at')->get();

        return view('vistas.detalleProducto', [
            'detProducto' => $detProducto,
            //'productos' => $productos,
        ]);
    }

    public function listaEmpresas(Request $request)
    {
        $buscador_empresa = trim($request->get('buscador_empresa'));


        $empresas = DB::table('empresas as e')
            ->leftJoin('directorio.directorio_empresa_extras as de', 'e.id_empresa', '=', 'de.id_empresa')
            ->select('e.*', 'de.path_file_foto1')
            ->where([
                ['e.razon_social', 'ILIKE', '%' . $buscador_empresa . '%']
            ])
            ->whereIn('e.id_empresa', function ($query) {
                $query->select('dps.id_empresa')
                    ->from('directorio.producto_solicituds as dps')
                    ->where('dps.id_producto_solicitud_estado', 2)
                    ->groupBy('dps.id_empresa');
            })
            ->orderByDesc('updated_at')->paginate(3);

        return view('vistas.empresas', [
            'empresas' => $empresas,
            'buscador_empresa' => $buscador_empresa
        ]);
    }

    public function oneEmpresa($id)
    {
        $idDes = Crypt::decryptString($id);
        $detEmpresa = DB::table('empresas as e')
            ->join('directorio.directorio_empresa_extras as dee', 'e.id_empresa', '=', 'dee.id_empresa')
            ->select('*')
            ->where('e.id_empresa', $idDes)->first();

        $productos = DB::table('directorio.directorio_productos')
            ->join('empresas', 'empresas.id_empresa', '=', 'directorio_productos.id_empresa')
            ->select('directorio_productos.*', 'empresas.*')
            ->where([
                ['directorio_productos.id_empresa', $idDes]

            ])->orderByDesc('directorio_productos.updated_at', 'empresas.updated_at')->get();
        return view('vistas.detalleEmpresa', [
            'detEmpresa' => $detEmpresa,
            'productos' => $productos
        ]);
    }
    public function listaProductosEmpresa($id)
    {
        $idDes = Crypt::decryptString($id);

        $productos = DB::table('ddjjs as dj')
            ->leftjoin('directorio.directorio_productos as dp', 'dj.id_ddjj', '=', 'dp.id_ddjj')
            ->join('directorio.producto_solicituds as dps', 'dps.id_producto', '=', 'dp.id_producto')
            ->join('ddjj_datos_mercancias as dm', 'dj.id_ddjj', '=', 'dm.id_ddjj')
            ->join('acuerdos as a', 'a.id_acuerdo', '=', 'dj.id_acuerdo')
            ->join('empresas as e', 'dj.id_empresa', '=', 'e.id_empresa')
            ->select('*')
            ->where('e.id_empresa', $idDes)
            ->whereIn('dps.id_producto_solicitud_estado', [2])->get();

        return view('vistas.productos_emp_rub', [
            'productos' => $productos,
            'titulo' => 'Empresas'
        ]);
    }

    public function listaRubros(Request $request)
    {
        $buscador_rubro = trim($request->get('buscador_rubro'));
        $buscador_rubro = strtoupper($buscador_rubro);
        $rubros = DB::table('empresa_rubros')
            ->select('*')
            ->where([
                ['descripcion_rubro', 'like', '%' . $buscador_rubro . '%']
            ])->orderBy('id_rubro')->paginate(6, ['*'], 'page', null);

        return view('vistas.listarubro', [
            'rubros' => $rubros,
            'buscador_rubro' => $buscador_rubro
        ]);
    }
    public function oneRubro($id)
    {
        $idDes = Crypt::decryptString($id);
        $detEmpresa = DB::table('empresas')
            ->where([
                ['estado', 'activo'],
                ['id_empresa', $idDes]
            ])->first();
        $productos = DB::table('productos')
            ->join('empresas', 'empresas.id_empresa', '=', 'productos.id_empresa')
            ->join('monedas', 'monedas.id_moneda', '=', 'productos.id_moneda')
            ->select('productos.*', 'monedas.*', 'empresas.*')
            ->where([
                ['productos.estado', 'activo'],
                ['empresas.estado', 'activo'],
                ['productos.id_empresa', $idDes]
            ])->orderByDesc('productos.updated_at', 'empresas.updated_at')->get();
        return view('vistas.detalleEmpresa', [
            'detEmpresa' => $detEmpresa,
            'productos' => $productos
        ]);
    }
    public function listaProductosRubro($id_rubro)
    {
        $idDes = Crypt::decryptString($id_rubro);

        $sql_busqueda = "SELECT d.id_ddjj, ddm.denominacion_comercial, e.id_empresa, e.razon_social, ddp.id_producto, ddp.path_file_photo1, ddp.path_file_photo2, ddp.path_file_photo3    
                            from ddjjs d
                            inner join empresas e on e.id_empresa = d.id_empresa
                            inner join ddjj_datos_mercancias ddm on ddm.id_ddjj = d.id_ddjj
                            inner join directorio.directorio_productos ddp on ddp.id_ddjj =  d.id_ddjj
                            inner join directorio.producto_solicituds dps on dps.id_producto = ddp.id_producto
                            where ddp.id_empresa_rubro = $idDes
                            and e.id_estado_empresa = 4 and d.id_ddjj_estado in (6, 9, 10, 11) and dps.id_producto_solicitud_estado = 2";
        $result_busqueda = DB::select($sql_busqueda);

        return view('vistas.busqueda_productos', [
            'result_busqueda' => $result_busqueda,
            'descripcion_busqueda' => '',
        ]);
    }
}
