<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class ClienteRubroController extends Controller
{
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
