<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Productos;
use App\Models\Rubro;
use App\Models\Categoria;
use App\Models\Monedas;
use App\Models\UnidadMedidas;
use App\Models\Empresas;
use App\Models\GrupoRubro;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

use Illuminate\Contracts\Encryption\DecryptException;
 

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $empresa = Empresa::where('id_user', Auth::id(),)->get(); 
        $empresas = DB::table('grupo_empresa_user')
            ->join('empresas', 'grupo_empresa_user.id_empresa', '=', 'empresas.id_empresa')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->select('empresas.*')
            ->where('id_user', Auth::id(),)->get();

        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol','rol.nombre_rol')
            ->where('id_user', Auth::id(),)->get();
        return view('admin.inicio', [
            'empresas' => $empresas,
            'roles'=>$rol
        ]);
    }


    public function listProd($id)
    {
        $idDes =Crypt::decryptString($id);
        $empresas = DB::table('grupo_empresa_user')
            ->join('empresas', 'grupo_empresa_user.id_empresa', '=', 'empresas.id_empresa')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->select('empresas.*')
            ->where('id_user', Auth::id(),)->get();
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol','rol.nombre_rol')
            ->where('id_user', Auth::id(),)->get();



        $productos = Productos::where('id_empresa', $idDes)
                    ->orderBy('updated_at', 'desc')
                    ->get();
        $rubros = DB::table('grupo_rubro')
                    ->join('empresas', 'grupo_rubro.id_empresa', '=', 'empresas.id_empresa')
                    ->join('rubro', 'grupo_rubro.id_rubro', '=', 'rubro.id_rubro')
                    ->select('rubro.*')
                    ->where('grupo_rubro.id_empresa', $idDes)->get();
        $categorias =array();
        foreach ($rubros as $rubro) {
            $cats= DB::table('categoria')
                    ->select('categoria.*')
                    ->where('id_rubro', $rubro->id_rubro)->get();
            foreach ($cats as $cat) {
                array_push($categorias,$cat);
            }
        }
        $monedas = Monedas::all();
        $medidas = UnidadMedidas::all();
        return view('admin.listproducto', [
            'empresas' => $empresas,
            'roles' => $rol,
            'productos' => $productos,
            'rubros' => $rubros,
            'categorias' => $categorias,
            'monedas' => $monedas,
            'medidas' => $medidas,
            'idempresas' => $idDes
        ]);
    }
    public function agreProd($id, Request $data)
    {
        $idDes = Crypt::decryptString($id);
        $direcion = '';
        if ($data->hasFile('imagen_producto')) {
            $file = $data->file('imagen_producto');
            $endPath = 'storage/images/producto/' . $idDes . '/';
            
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $data->file('imagen_producto')->move($endPath, $fileName);
            $direcion = $endPath . $fileName;
        }
        Productos::create([
            'cantidad_disponible'   => $data->cantidad_disponible,
            'nombre_producto'       => $data->nombre_producto,
            'imagen_producto'       => URL($direcion),
            'descripcion_producto'  => $data->descripcion_producto,
            'precio_producto'       => $data->precio_producto,
            'precio_producto_max'   => $data->precio_producto_max ?? '',
            'codigo_nandina'        => $data->codigo_nandina,
            'estrella'              => $data->estrella,
            'estado_producto'       => 'normal',
            'id_rubro'              => $data->id_rubro,
            'id_categoria'          => $data->id_categoria,
            'numero_producto'       => $data->numero_producto,
            'id_unidad_medida'      => $data->id_unidad_medida,
            'id_moneda'             => $data->id_moneda,
            'estado'                => 'inactivo',
            'id_empresa'            => $idDes,
        ]);
        return redirect()->route('home');
    }
    public function oneProd($id)
    {
        $idDes =Crypt::decryptString($id);
        $empresas = DB::table('grupo_empresa_user')
            ->join('empresas', 'grupo_empresa_user.id_empresa', '=', 'empresas.id_empresa')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->select('empresas.*')
            ->where('id_user', Auth::id(),)->get();
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol','rol.nombre_rol')
            ->where('id_user', Auth::id(),)->get();


        // $productoEdit = Productos::where('id_producto', $idDes)->first();
        $productoEdit = DB::table('productos')
                        ->join('rubro', 'productos.id_rubro','=', 'rubro.id_rubro')
                        ->join('categoria', 'productos.id_categoria','=', 'categoria.id_categoria')
                        ->join('unidad_medidas', 'productos.id_unidad_medida','=', 'unidad_medidas.id_unidad_medida')
                        ->join('monedas', 'productos.id_moneda','=', 'monedas.id_moneda')
                        ->select('productos.*','rubro.nombre_rubro', 'categoria.nombre_categoria', 'unidad_medidas.nombre_unidad_medida','monedas.abrv_moneda')
                        ->where('productos.id_producto', $idDes)->first();

        $rubros = DB::table('grupo_rubro')
                    ->join('empresas', 'grupo_rubro.id_empresa', '=', 'empresas.id_empresa')
                    ->join('rubro', 'grupo_rubro.id_rubro', '=', 'rubro.id_rubro')
                    ->select('rubro.*')
                    ->where('grupo_rubro.id_empresa', $productoEdit->id_empresa)->get();
        $categorias =array();
        foreach ($rubros as $rubro) {
            $cats= DB::table('categoria')
                    ->select('categoria.*')
                    ->where('id_rubro', $rubro->id_rubro)->get();
            foreach ($cats as $cat) {
                array_push($categorias,$cat);
            }
        }
        $monedas = Monedas::all();
        $medidas = UnidadMedidas::all();
        return view('admin.editproducto', [
            'empresas' => $empresas,
            'roles' => $rol,
            'productoEdit' => $productoEdit,
            'rubros' => $rubros,
            'categorias' => $categorias,
            'monedas' => $monedas,
            'medidas' => $medidas
        ]);
    }
    public function eliminarProd($id)
    {
        $idDes =Crypt::decryptString($id);
        Productos::where('id_producto', $idDes)->update(['estado' => 'eliminado']);
        return redirect()->route('home');
    }
    public function observadoProd($id)
    {
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol','rol.nombre_rol')
            ->where('id_user', Auth::id(),)->get();
        $idDes =Crypt::decryptString($id);
        $productos = DB::table('productos')
            ->join('empresas', 'empresas.id_empresa', '=', 'productos.id_empresa')
            ->join('monedas', 'monedas.id_moneda', '=', 'productos.id_moneda')
            ->select('productos.*', 'empresas.*')
            ->where([
                ['productos.id_producto', $idDes]
            ])->orderByDesc('productos.updated_at','empresas.updated_at')->first();
        return view('admin.correo', [
            'roles' => $rol,
            'idDes' => $idDes,
            'productos' => $productos
        ]);
    }
    public function publicarProd($id)
    {
        $idDes =Crypt::decryptString($id);
        Productos::where('id_producto', $idDes)->update(['estado' => 'activo']);
        return redirect()->route('home');
    }
    public function listProdT()
    {
        $empresas = DB::table('grupo_empresa_user')
            ->join('empresas', 'grupo_empresa_user.id_empresa', '=', 'empresas.id_empresa')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->select('empresas.*')
            ->where('id_user', Auth::id(),)->get();
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol','rol.nombre_rol')
            ->where('id_user', Auth::id(),)->get();




        $productosInactivos =  DB::table('productos')
                                ->select('productos.*')
                                ->where('estado', 'inactivo')
                                ->orderBy('updated_at', 'desc')
                                ->get();
        $productosActivos = DB::table('productos')
                                ->select('productos.*')
                                ->where('estado', 'activo')
                                ->orderBy('updated_at', 'desc')
                                ->get();
        $productosObservados = DB::table('productos')
                                ->select('productos.*')
                                ->where('estado', 'observado')
                                ->orderBy('updated_at', 'desc')
                                ->get();
        $productosTodos = DB::table('productos')
                            ->select('productos.*')
                            ->orderBy('updated_at', 'desc')
                            ->get();
        return view('admin.listaproductot', [
            'empresas' => $empresas,
            'roles' => $rol,
            'prodInactivos' => $productosInactivos,
            'prodActivos' => $productosActivos,
            'prodObservados' => $productosObservados,
            'prodTodos' => $productosTodos
        ]);
    }
    public function updateProd($id, Request $data)
    {
        $idDes =Crypt::decryptString($id);
        $direcion = '';
        if ($data->hasFile('imagen_producto')) {
            $file = $data->file('imagen_producto');
            $endPath = 'storage/images/producto/' .  $idDes . '/';

            // if(File::exists($endPath))
            // {
            //     File::delete($endPath);
            // }
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $data->file('imagen_producto')->move($endPath, $fileName);
            $direcion = $endPath . $fileName;
        }
        if (strlen($direcion) < 5){
            $direcion =$data->imagen_producto;
        }
        else {
            $direcion = URL($direcion);
        }
        Productos::where('id_producto', $data->id_producto)->update([
            'cantidad_disponible'   => $data->cantidad_disponible ?? '',
            'nombre_producto'       => $data->nombre_producto,
            'imagen_producto'       => $direcion,
            'descripcion_producto'  => $data->descripcion_producto,
            'precio_producto'       => $data->precio_producto,
            'precio_producto_max'   => $data->precio_producto_max ?? '',
            'codigo_nandina'        => $data->codigo_nandina,
            'estrella'              => $data->estrella,
            'estado_producto'       => 'normal',
            'id_rubro'              => $data->id_rubro,
            'id_categoria'          => $data->id_categoria,
            'numero_producto'       => $data->numero_producto ?? '',
            'id_unidad_medida'      => $data->id_unidad_medida,
            'id_moneda'             => $data->id_moneda,
            'id_empresa'            => $idDes,
            'estado'                => 'inactivo',
        ]);
        return redirect()->route('home');
    }

    /////////////////////////////////   //////////////////////////////  //////////////////////////////////
    public function listgrupRubEmp($id){
        $idDes = Crypt::decryptString($id);
        $empresas = DB::table('grupo_empresa_user')
            ->join('empresas', 'grupo_empresa_user.id_empresa', '=', 'empresas.id_empresa')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->select('empresas.*')
            ->where('id_user', Auth::id(),)->get();

        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol','rol.nombre_rol')
            ->where('id_user', Auth::id(),)->get();


        $gruporubros = DB::table('grupo_rubro')
            ->join('empresas', 'grupo_rubro.id_empresa', '=', 'empresas.id_empresa')
            ->join('rubro', 'grupo_rubro.id_rubro', '=', 'rubro.id_rubro')
            ->select('grupo_rubro.id','empresas.id_empresa','empresas.razon_social_empresa','rubro.id_rubro','rubro.nombre_rubro','grupo_rubro.created_at')
            ->orderByDesc('empresas.updated_at','rubro.updated_at')
            ->where('grupo_rubro.id_empresa',$idDes)->get();
        $rubros = Rubro::all();
        return view('admin.gruporubro', [
            'empresas' => $empresas,
            'roles' => $rol,
            'rubros' => $rubros,
            'gruporubros'   => $gruporubros,
            'id_empresa'    =>  $idDes,
        ]);
    }
    public function agreGrupRubro(Request $data){
        GrupoRubro::create([
            'id_empresa'   => $data->id_empresa,
            'id_rubro'     => $data->id_rubro,
        ]);    
        return redirect()->route('home');
    }
    public function eliminarGrupoRubro($id){
        $idDes =Crypt::decryptString($id);
        GrupoRubro::where('id', $idDes)->delete();
        return redirect()->route('home');
    }

    ////////////////////////////////////////////////////////////////
    public function listEmp()
    {
        $empresas = DB::table('grupo_empresa_user')
            ->join('empresas', 'grupo_empresa_user.id_empresa', '=', 'empresas.id_empresa')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->select('empresas.*')
            ->orderByDesc('empresas.updated_at')
            ->where('id_user', Auth::id(),)->get();
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol','rol.nombre_rol')
            ->where('id_user', Auth::id(),)->get();

        $empresaInactivos = Empresas::all()->where('estado', 'inactivo');
        $empresaActivos = Empresas::all()->where('estado', 'activo');
        $empresaTodos = Empresas::all();
        return view('admin.listempresa', [
            'empresas' => $empresas,
            'roles' => $rol,
            'empInactivos' => $empresaInactivos,
            'empActivos' => $empresaActivos,
            'empTodos' => $empresaTodos
        ]);
    }
    public function oneEmp($id)
    {
        $idDes = Crypt::decryptString($id);
        $empresas = DB::table('grupo_empresa_user')
            ->join('empresas', 'grupo_empresa_user.id_empresa', '=', 'empresas.id_empresa')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->select('empresas.*')
            ->where('id_user', Auth::id(),)->get();
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol','rol.nombre_rol')
            ->where('id_user', Auth::id(),)->get();


        $empresasEdit = DB::table('empresas')
            ->join('estado_empresas', 'estado_empresas.id_estado_empresa', '=', 'empresas.id_estado_empresa')
            ->select('empresas.*','estado_empresas.estado_empresa')
            ->where('id_empresa', $idDes,)->first();
        // $empresasEdit = Empresas::where('id_empresa', $idDes)->first();


        return view('admin.onempresa', [
            'empresas' => $empresas,
            'roles' => $rol,
            'empresasEdit' => $empresasEdit,
        ]);
    }
    public function updateEmp($id, Request $data)
    {
        $idDes =Crypt::decryptString($id);
        $direcion = '';
        if ($data->hasFile('imagen_empresa')) {
            $file = $data->file('imagen_empresa');
            $endPath = 'storage/images/empresas/' . $idDes . '/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $data->file('imagen_empresa')->move($endPath, $fileName);
            $direcion = $endPath . $fileName;
        }
        if (strlen($direcion) < 5){
            $direcion =$data->imagen_empresa??'';
        }
        else {
            $direcion = URL($direcion);
        }
        Empresas::where('id_empresa', $idDes)->update([
            'razon_social_empresa'  => $data->razon_social_empresa ?? '',
            'descripcion_empresa'   => $data->descripcion_empresa??'',
            'nit'                   => $data->nit ?? '',
            'matricula'             => $data->matricula ?? '',
            'telefono'              => $data->telefono ?? 0,
            'celular_1'             => $data->celular_1 ?? 0,
            'nombre_1'              => $data->nombre_1?? '',
            'celular_2'             => $data->celular_2?? 0,
            'nombre_2'              => $data->nombre_2?? '',
            'email'                 => $data->email ?? '',
            'pag_web'               => $data->pag_web ?? '',
            'ruex'                  => $data->ruex ?? '',
            'estado_ruex'           => $data->estado_ruex ?? 0,
            'direccion'             => $data->direccion ?? '',
            'ubicacion'             => $data->ubicacion ?? '',
            'facebook'              => $data->facebook ?? '',
            'whatsapp'              => $data->whatsapp ?? '',
            'tiktok'                => $data->tiktok ?? '',
            'imagen_empresa'        => $direcion,
            'estado'                => 'inactivo',
        ]);
        return redirect()->route('home');
    }

    public function eliminarEmp($id)
    {
        $idDes =Crypt::decryptString($id);
        Empresas::where('id_empresa', $idDes)->update(['estado' => 'inactivo']);
        return redirect()->route('home');
    }
    public function publicarEmp($id)
    {
        $idDes =Crypt::decryptString($id);
        Empresas::where('id_empresa', $idDes)->update(['estado' => 'activo']);
        return redirect()->route('home');
    }



    ////////////////////////////////////////////////////////////////
    public function listRubro()
    {
        
        $empresas = DB::table('grupo_empresa_user')
            ->join('empresas', 'grupo_empresa_user.id_empresa', '=', 'empresas.id_empresa')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->select('empresas.*')
            ->where('id_user', Auth::id(),)
            ->get();
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol','rol.nombre_rol')
            ->where('id_user', Auth::id(),)->get();



        
        $rubros = Rubro::all();
        return view('admin.listrubro', [
            'empresas' => $empresas,
            'roles' => $rol,
            'rubros' => $rubros,
        ]);
    }
    public function oneRubro($id)
    {
        $idDes = Crypt::decryptString($id);
        $empresas = DB::table('grupo_empresa_user')
            ->join('empresas', 'grupo_empresa_user.id_empresa', '=', 'empresas.id_empresa')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->select('empresas.*')
            ->where('id_user', Auth::id(),)->get();
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol','rol.nombre_rol')
            ->where('id_user', Auth::id(),)->get();



        $rubroEdit = Rubro::where('id_rubro', $idDes)->first();


        return view('admin.onerubro', [
            'empresas' => $empresas,
            'roles' => $rol,
            'rubroEdit' => $rubroEdit,
        ]);
    }
    public function updateRubro($id, Request $data)
    {
        $idDes =Crypt::decryptString($id);
        $direcion = '';
        if ($data->hasFile('imagen_rubro')) {
            $file = $data->file('imagen_rubro');
            $endPath = 'storage/images/rubros/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $data->file('imagen_rubro')->move($endPath, $fileName);
            $direcion = $endPath . $fileName;
        }

        if (strlen($direcion) < 5){
            $direcion =$data->imagen_rubro;
        }
        else {
            $direcion = URL($direcion);
        }

        Rubro::where('id_rubro', $idDes)->update([
            'nombre_rubro'  => $data->nombre_rubro,
            'abreviacion_rubro'   => $data->abreviacion_rubro,
            'imagen_rubro'        => $direcion,
            'estado'                => 'activo',
        ]);
        return redirect()->route('home');
    }

    public function eliminarRubro($id)
    {
        $idDes =Crypt::decryptString($id);
        Rubro::where('id_rubro', $id)->update(['estado' => 'eliminado']);
        return redirect()->route('home');
    }
    public function estadoRubro($id)
    {
        $idDes =Crypt::decryptString($id);
        $rubro = Rubro::where('id_rubro', $idDes)->first();
        if ($rubro->estado == 'activo') {
            Rubro::where('id_rubro', $idDes)->update(['estado' => 'inactivo']);
        } else {
            Rubro::where('id_rubro', $idDes)->update(['estado' => 'activo']);
        }
        return redirect()->route('home');
    }



    ////////////////////////////////////////////////////////////////
    public function listCategoria()
    {
        $empresas = DB::table('grupo_empresa_user')
            ->join('empresas', 'grupo_empresa_user.id_empresa', '=', 'empresas.id_empresa')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->select('empresas.*')
            ->where('id_user', Auth::id(),)->get();
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol','rol.nombre_rol')
            ->where('id_user', Auth::id(),)->get();


        $categorias = Categoria::all();
        return view('admin.listcategoria', [
            'empresas' => $empresas,
            'roles' => $rol,
            'categorias' => $categorias,
        ]);
    }
    public function oneCategoria($id)
    {
        $idDes =Crypt::decryptString($id);
        $empresas = DB::table('grupo_empresa_user')
            ->join('empresas', 'grupo_empresa_user.id_empresa', '=', 'empresas.id_empresa')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->select('empresas.*')
            ->where('id_user', Auth::id(),)->get();
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol','rol.nombre_rol')
            ->where('id_user', Auth::id(),)->get();


        $categoriaEdit = Categoria::where('id_categoria', $idDes)->first();


        return view('admin.onecategoria', [
            'empresas' => $empresas,
            'roles' => $rol,
            'categoriaEdit' => $categoriaEdit,
        ]);
    }
    public function updateCategoria($id, Request $data)
    {
        $idDes =Crypt::decryptString($id);
        Categoria::where('id_categoria', $idDes)->update([
            'nombre_rubro'  => $data->nombre_rubro,
            'abreviacion_rubro'   => $data->abreviacion_rubro,
            'id_rubro'        => $data->id_rubro,
        ]);
        return redirect()->route('home');
    }

    public function eliminarCategoria($id)
    {
        $idDes =Crypt::decryptString($id);
        Categoria::where('id_categoria', $idDes)->update(['estado' => 'eliminado']);
        return redirect()->route('home');
    }
    public function estadoCategoria($id)
    {
        $idDes =Crypt::decryptString($id);
        $categoria = Categoria::where('id_categoria', $idDes)->first();
        if ($categoria->estado == 'activo') {
            Categoria::where('id_categoria', $idDes)->update(['estado' => 'inactivo']);
        } else {
            Categoria::where('id_categoria', $idDes)->update(['estado' => 'activo']);
        }
        return redirect()->route('home');
    }






    ///Listar correos enviados
    public function listCorreo()
    {
        
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol','rol.nombre_rol')
            ->where('id_user', Auth::id(),)->get();

       
        $notificaciones = DB::table('notificacion')
            ->select('*')
            ->where('id_user', Auth::id(),)
            ->orderByDesc('updated_at')
            ->get();

        return view('admin.listarcorreo', [
            'notificaciones' => $notificaciones,
            'roles' => $rol,
        ]);
    }
    ////Listar correos enviados
    public function oneCorreo($id)
    {
        $idDes =Crypt::decryptString($id);
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol','rol.nombre_rol')
            ->where('id_user', Auth::id(),)->get();

       
        $notificacion = DB::table('notificacion')
            ->select('*')
            ->where('id_notificacion', $idDes,)->first();

        return view('admin.onecorreo', [
            'notificacion' => $notificacion,
            'roles' => $rol,
        ]);
    }
    
}
