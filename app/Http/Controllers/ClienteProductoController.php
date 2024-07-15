<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class ClienteProductoController extends Controller
{
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
    public function unProducto($id)
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
}
