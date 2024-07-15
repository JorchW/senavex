<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class ClienteEmpresaController extends Controller
{
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
    public function unaEmpresa($id)
    {
        $idDes = Crypt::decryptString($id);
        $detEmpresa = DB::table('empresas as e')
            ->leftjoin('directorio.directorio_empresa_extras as dee', 'e.id_empresa', '=', 'dee.id_empresa')
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
}
