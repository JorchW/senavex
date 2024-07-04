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
    public function index(){
        return view('vistas.inicio');
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////
    public function listaProductos(Request $request){
        $buscador_producto = trim($request->get('buscador_producto'));
        $productos = DB::table('directorio.directorio_productos')
        ->join('empresas', 'empresas.id_empresa', '=', 'directorio_productos.id_empresa')
        ->select('directorio_productos.*','empresas.*')
        ->where([
        ])->orderByDesc('productos.updated_at','empresas.updated_at')->paginate(8);


        return view ('vistas.productos',[
            'productos' => $productos,
            'buscador_producto' => $buscador_producto,
        ]);
    }
    public function oneProducto($id){
        $idDes = Crypt::decryptString($id);
        $detProducto = DB::table('productos')
                    ->join('empresas', 'empresas.id_empresa', '=', 'productos.id_empresa')
                    ->join('monedas', 'monedas.id_moneda', '=', 'productos.id_moneda')
                    ->select('productos.*', 'monedas.*', 'empresas.*')
                    ->where([
                        ['productos.estado', 'activo'],
                        ['empresas.estado', 'activo'],
                        ['productos.id_producto',$idDes]
                    ])->orderByDesc('productos.updated_at','empresas.updated_at')->first();
        $productos = DB::table('productos')
                        ->join('empresas', 'empresas.id_empresa', '=', 'productos.id_empresa')
                        ->join('monedas', 'monedas.id_moneda', '=', 'productos.id_moneda')
                        ->select('productos.*', 'monedas.*', 'empresas.*')
                        ->where([
                            ['productos.estado', 'activo'],
                            ['empresas.estado', 'activo'],
                            ['productos.id_rubro',$detProducto->id_rubro]
                        ])->orderByDesc('productos.updated_at','empresas.updated_at')->get();
                        
        return view('vistas.detalleProducto',[
            'detProducto' => $detProducto,
            'productos' => $productos,
        ]);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function listaEmpresas(Request $request){
        $buscador_empresa = trim($request->get('buscador_empresa'));
        $buscador_empresa_m = mb_strtolower($buscador_empresa, 'UTF-8');
        $empresas = DB::table('empresas as e')
        ->leftJoin('directorio.directorio_empresa_extras as de','e.id_empresa','=','de.id_empresa')
        ->select('e.*','de.path_file_foto1')
            ->where([
                ['e.razon_social', 'ILIKE', '%'.$buscador_empresa_m.'%']
            ])
            ->orderByDesc('updated_at')->paginate(3);

        return view('vistas.empresas', [
            'empresas' => $empresas,
            'buscador_empresa' => $buscador_empresa 
        ]);
    }
    
    public function oneEmpresa($id){
        $idDes = Crypt::decryptString($id);
        $detEmpresa = DB::table('empresas')
                    ->where([
                        ['id_empresa',$idDes]
                    ])->first();
        $productos = DB::table('directorio.directorio_productos')
                        ->join('empresas', 'empresas.id_empresa', '=', 'directorio_productos.id_empresa')
                        ->select('directorio_productos.*','empresas.*')
                        ->where([
                            ['directorio_productos.id_empresa',$idDes]
                            
                        ])->orderByDesc('directorio_productos.updated_at','empresas.updated_at')->get();
        return view('vistas.detalleEmpresa',[
            'detEmpresa' => $detEmpresa,
            'productos' => $productos
        ]);
    }
    public function listaProductosEmpresa($id){
        $idDes = Crypt::decryptString($id);
        $productos = DB::table('productos')
        ->join('empresas', 'empresas.id_empresa', '=', 'productos.id_empresa')
        ->join('monedas', 'monedas.id_moneda', '=', 'productos.id_moneda')
        ->select('productos.*', 'monedas.*', 'empresas.*')
        ->where([
            ['productos.estado', 'activo'],
            ['empresas.estado', 'activo'],
            ['empresas.id_empresa',$idDes]
        ])->orderByDesc('productos.updated_at','empresas.updated_at')->paginate(8);


        return view ('vistas.productos_emp_rub',[
            'productos' => $productos,
            'titulo' => 'Empresas'
        ]);
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////    

    public function listaRubros(Request $request){
        $buscador_rubro = trim($request->get('buscador_rubro'));
        $buscador_rubro = strtoupper($buscador_rubro);
        $rubros = DB::table('empresa_rubros')
        ->select('*')
        ->where([
            ['descripcion_rubro', 'like', '%'.$buscador_rubro.'%']
        ])->orderByDesc('updated_at')->paginate(6, ['*'], 'page', null);

        return view ('vistas.listarubro',[
            'rubros' => $rubros,
            'buscador_rubro'    => $buscador_rubro
        ]);
    }
    public function oneRubro($id){
        $idDes = Crypt::decryptString($id);
        $detEmpresa = DB::table('empresas')
                    ->where([
                        ['estado', 'activo'],
                        ['id_empresa',$idDes]
                    ])->first();
        $productos = DB::table('productos')
                        ->join('empresas', 'empresas.id_empresa', '=', 'productos.id_empresa')
                        ->join('monedas', 'monedas.id_moneda', '=', 'productos.id_moneda')
                        ->select('productos.*', 'monedas.*', 'empresas.*')
                        ->where([
                            ['productos.estado', 'activo'],
                            ['empresas.estado', 'activo'],
                            ['productos.id_empresa',$idDes]
                        ])->orderByDesc('productos.updated_at','empresas.updated_at')->get();
        return view('vistas.detalleEmpresa',[
            'detEmpresa' => $detEmpresa,
            'productos' => $productos
        ]);
    }
    public function listaProductosRubro($id){
        $idDes = Crypt::decryptString($id);
        $productos = DB::table('productos')
        ->join('empresas', 'empresas.id_empresa', '=', 'productos.id_empresa')
        ->join('monedas', 'monedas.id_moneda', '=', 'productos.id_moneda')
        ->join('rubro', 'rubro.id_rubro', '=', 'productos.id_rubro')
        ->select('productos.*', 'monedas.*', 'empresas.*')
        ->where([
            ['productos.estado', 'activo'],
            ['empresas.estado', 'activo'],
            ['productos.id_rubro',$idDes]
        ])->orderByDesc('productos.updated_at','empresas.updated_at')->get();

        return view ('vistas.productos_emp_rub',[
            'productos' => $productos,
            'titulo' => 'Rubros'
        ]);
    }
}
