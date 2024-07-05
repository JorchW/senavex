<?php

namespace App\Http\Controllers;

use App\Models\DirectorioEmpresaExtras;
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
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;


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
    public function select()
    {
        $empresas = DB::table('empresas')
            ->join('empresas_personas', 'empresas.id_empresa', '=', 'empresas_personas.id_empresa')
            ->join('personas', 'empresas_personas.id_persona', '=', 'personas.id_persona')
            ->join('users', 'personas.id_persona', '=', 'users.id_persona')
            ->select('empresas.*', 'users.*')
            ->where('id_user', Auth::id())->distinct()->get();
        return view('admin.select', [
            'empresas' => $empresas
        ]);
    }
    public function index($id)
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

        return view('admin.inicio', [
            'empresas' => $empresas,
            'roles' => $rol
        ]);
    }

    public function listProd($id)
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
            ->join('ddjj_datos_mercancias as dm', 'dj.id_ddjj', '=', 'dm.id_ddjj')
            ->join('acuerdos as a', 'a.id_acuerdo', '=', 'dj.id_acuerdo')
            ->join('empresas as e', 'dj.id_empresa', '=', 'e.id_empresa')
            ->select('*')
            ->where('dj.id_empresa', $idDes)
            ->whereIn('dj.id_ddjj_estado', [6, 9, 10, 11])->get();

        return view('admin.listproducto', [
            'empresas' => $empresas,
            'roles' => $rol,
            'productos' => $productos,
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
            'cantidad_disponible' => $data->cantidad_disponible,
            'nombre_producto' => $data->nombre_producto,
            'imagen_producto' => URL($direcion),
            'descripcion_producto' => $data->descripcion_producto,
            'precio_producto' => $data->precio_producto,
            'precio_producto_max' => $data->precio_producto_max ?? '',
            'codigo_nandina' => $data->codigo_nandina,
            'estrella' => $data->estrella,
            'estado_producto' => 'normal',
            'id_rubro' => $data->id_rubro,
            'id_categoria' => $data->id_categoria,
            'numero_producto' => $data->numero_producto,
            'id_unidad_medida' => $data->id_unidad_medida,
            'id_moneda' => $data->id_moneda,
            'estado' => 'inactivo',
            'id_empresa' => $idDes,
        ]);
        return redirect()->route('home');
    }
    public function oneProd($id)
    {
        $idDes = Crypt::decryptString($id);
        $empresas = DB::table('ddjjs as dj')
            ->join('ddjj_datos_mercancias as dm', 'dj.id_ddjj', '=', 'dm.id_ddjj')
            ->join('acuerdos as a', 'a.id_acuerdo', '=', 'dj.id_acuerdo')
            ->join('empresas as e', 'dj.id_empresa', '=', 'e.id_empresa')
            ->join('empresa_categorias as ec', 'e.id_categoria', '=', 'ec.id_categoria')
            ->select('e.id_empresa', '*')
            ->where('dj.id_ddjj', $idDes)
            ->whereIn('dj.id_ddjj_estado', [6, 9, 10, 11])
            ->orderBy('dj.updated_at', 'desc')->first();

        $rol = DB::table('rols')
            ->join('empresas_personas', 'rols.id_rol', '=', 'empresas_personas.id_rol')
            ->join('personas', 'empresas_personas.id_persona', '=', 'personas.id_persona')
            ->join('users', 'personas.id_persona', '=', 'users.id_persona')
            ->select('rols.id_rol', 'rols.rol')
            ->where('id_user', Auth::id(), )->get();

        $imagen = DB::table('ddjjs as dj')
            ->join('directorio.directorio_productos as dp', 'dj.id_ddjj', '=', 'dp.id_ddjj')
            ->select('*')
            ->where('dj.id_ddjj', $idDes)->first();

        $rubros = DB::table('empresa_rubros')->get();

        $rubrosel = DB::table('ddjjs')
        ->join('directorio.directorio_productos as dp','ddjjs.id_ddjj','=','dp.id_ddjj')
        ->join('empresa_rubros as er','dp.id_empresa_rubro','=','er.id_rubro')
        ->select('er.*')
        ->where('ddjjs.id_ddjj',$idDes)->get();

        $categorias = DB::table('directorio.directorio_categoria')->get();

        $categoriasel = DB::table('ddjjs')
        ->join('directorio.directorio_productos as dp','ddjjs.id_ddjj','=','dp.id_ddjj')
        ->join('directorio.directorio_categoria as dc','dp.id_categoria','=','dc.id_categoria')
        ->select('dc.*')
        ->where('ddjjs.id_ddjj',$idDes)->get();

        return view('admin.editproducto', [
            'empresas' => $empresas,
            'roles' => $rol,
            'imagen' => $imagen,
            'rubros' => $rubros,
            'rubrosel' => $rubrosel,
            'categorias' => $categorias,
            'categoriasel' => $categoriasel,
        ]);
    }
    public function eliminarProd($id)
    {
        $idDes = Crypt::decryptString($id);
        Productos::where('id_producto', $idDes)->update(['estado' => 'eliminado']);
        return redirect()->route('home');
    }
    public function observadoProd($id)
    {
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol', 'rol.nombre_rol')
            ->where('id_user', Auth::id(), )->get();
        $idDes = Crypt::decryptString($id);
        $productos = DB::table('productos')
            ->join('empresas', 'empresas.id_empresa', '=', 'productos.id_empresa')
            ->join('monedas', 'monedas.id_moneda', '=', 'productos.id_moneda')
            ->select('productos.*', 'empresas.*')
            ->where([
                ['productos.id_producto', $idDes]
            ])->orderByDesc('productos.updated_at', 'empresas.updated_at')->first();
        return view('admin.correo', [
            'roles' => $rol,
            'idDes' => $idDes,
            'productos' => $productos
        ]);
    }
    public function publicarProd($id)
    {
        $idDes = Crypt::decryptString($id);
        Productos::where('id_producto', $idDes)->update(['estado' => 'activo']);
        return redirect()->route('home');
    }
    public function listProdT()
    {
        $empresas = DB::table('grupo_empresa_user')
            ->join('empresas', 'grupo_empresa_user.id_empresa', '=', 'empresas.id_empresa')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->select('empresas.*')
            ->where('id_user', Auth::id(), )->get();
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol', 'rol.nombre_rol')
            ->where('id_user', Auth::id(), )->get();




        $productosInactivos = DB::table('productos')
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
        $id_categoria = $data->input('id_categoria');
        $id_empresa = $data->input('id_empresa');
        $id_rubro =$data-> input('id_rubro');

        $data->validate([
            'id_categoria' => 'required|integer',
            'id_empresa' => 'required|integer',
            'id_rubro' => 'required|integer',
            'path_file_photo1' => 'required|image|dimensions:width=1920,height=1920',
            'path_file_photo2' => 'required|image|dimensions:width=1920,height=1920',
            'path_file_photo3' => 'required|image|dimensions:width=1920,height=1920',
        ], [
            'id_categoria.integer' => 'La categoría es Obligatorio.',
            'id_empresa.integer' => 'La empresa es Obligatorio.',
            'id_rubro.integer' => 'El rubro es Obligatorio.',
            'path_file_photo1.required' => 'La foto 1 es Obligatorio.',
            'path_file_photo1.dimensions' => 'La foto 1 debe tener dimensiones de 1920x1920 píxeles.',
            'path_file_photo2.required' => 'La foto 2 es Obligatorio.',
            'path_file_photo2.dimensions' => 'La foto 2 debe tener dimensiones de 1920x1920 píxeles.',
            'path_file_photo3.required' => 'La foto 3 es Obligatorio.',
            'path_file_photo3.dimensions' => 'La foto 3 debe tener dimensiones de 1920x1920 píxeles.',
        ]);

        $idDes = Crypt::decryptString($id);
        if ($data->hasFile('path_file_photo1')) {
            $file = $data->file('path_file_photo1');
            $dimensions = getimagesize($file);
            $endPath = public_path('/storage/images/productos/foto1/' . $idDes . '/');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $oldImagePath = DB::table('directorio.directorio_productos')
                ->where('id_ddjj', $idDes)
                ->value('path_file_photo1');
            if ($oldImagePath && file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath));
            }
            $uploadSuccess = $file->move($endPath, $filename);
            if ($uploadSuccess) {
                $direccionImagen = '/storage/images/productos/foto1/' . $idDes . '/' . $filename;
                DB::table('directorio.directorio_productos')
                    ->updateOrInsert(
                        [
                            'id_ddjj' => $idDes
                        ],
                        ['path_file_photo1' => $direccionImagen]
                    );
            } else {
                $direccionImagen = '';
            }
        } else {
            $direccionImagen = '';
        }
        if ($data->hasFile('path_file_photo2')) {
            $file = $data->file('path_file_photo2');
            $dimensions = getimagesize($file);
            $endPath = public_path('/storage/images/productos/foto2/' . $idDes . '/');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $oldImagePath = DB::table('directorio.directorio_productos')
                ->where('id_ddjj', $idDes)
                ->value('path_file_photo2');
            if ($oldImagePath && file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath));
            }
            $uploadSuccess = $file->move($endPath, $filename);
            if ($uploadSuccess) {
                $direccionImagen2 = '/storage/images/productos/foto2/' . $idDes . '/' . $filename;
                DB::table('directorio.directorio_productos')
                    ->updateOrInsert(
                        [
                            'id_ddjj' => $idDes
                        ],
                        ['path_file_photo2' => $direccionImagen2]
                    );
            } else {
                $direccionImagen2 = '';
            }
        } else {
            $direccionImagen2 = '';
        }
        if ($data->hasFile('path_file_photo3')) {
            $file = $data->file('path_file_photo3');
            $dimensions = getimagesize($file);
            $endPath = public_path('/storage/images/productos/foto3/' . $idDes . '/');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $oldImagePath = DB::table('directorio.directorio_productos')
                ->where('id_ddjj', $idDes)
                ->value('path_file_photo3');
            if ($oldImagePath && file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath));
            }
            $uploadSuccess = $file->move($endPath, $filename);
            if ($uploadSuccess) {
                $direccionImagen3 = '/storage/images/productos/foto3/' . $idDes . '/' . $filename;
                DB::table('directorio.directorio_productos')
                    ->updateOrInsert(
                        [
                            'id_ddjj' => $idDes
                        ],
                        ['path_file_photo3' => $direccionImagen3]
                    );
            } else {
                $direccionImagen3 = '';
            }
        } else {
            $direccionImagen3 = '';
        }
        DB::table('directorio.directorio_productos')
            ->where('id_ddjj', $idDes)
            ->update([
                'id_categoria' => $id_categoria,
                'id_empresa' => $id_empresa,
                'id_empresa_rubro' => $id_rubro,
            ]);

        return redirect()->back();
    }

    /////////////////////////////////   //////////////////////////////  //////////////////////////////////
    public function listgrupRubEmp($id)
    {
        $idDes = Crypt::decryptString($id);
        $empresas = DB::table('grupo_empresa_user')
            ->join('empresas', 'grupo_empresa_user.id_empresa', '=', 'empresas.id_empresa')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->select('empresas.*')
            ->where('id_user', Auth::id(), )->get();

        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol', 'rol.nombre_rol')
            ->where('id_user', Auth::id(), )->get();


        $gruporubros = DB::table('grupo_rubro')
            ->join('empresas', 'grupo_rubro.id_empresa', '=', 'empresas.id_empresa')
            ->join('rubro', 'grupo_rubro.id_rubro', '=', 'rubro.id_rubro')
            ->select('grupo_rubro.id', 'empresas.id_empresa', 'empresas.razon_social_empresa', 'rubro.id_rubro', 'rubro.nombre_rubro', 'grupo_rubro.created_at')
            ->orderByDesc('empresas.updated_at', 'rubro.updated_at')
            ->where('grupo_rubro.id_empresa', $idDes)->get();
        $rubros = Rubro::all();
        return view('admin.gruporubro', [
            'empresas' => $empresas,
            'roles' => $rol,
            'rubros' => $rubros,
            'gruporubros' => $gruporubros,
            'id_empresa' => $idDes,
        ]);
    }
    public function agreGrupRubro(Request $data)
    {
        GrupoRubro::create([
            'id_empresa' => $data->id_empresa,
            'id_rubro' => $data->id_rubro,
        ]);
        return redirect()->route('home');
    }
    public function eliminarGrupoRubro($id)
    {
        $idDes = Crypt::decryptString($id);
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
            ->where('id_user', Auth::id(), )->get();
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol', 'rol.nombre_rol')
            ->where('id_user', Auth::id(), )->get();

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

        $imagen = DB::table('empresas')
            ->join('directorio.directorio_empresa_extras', 'empresas.id_empresa', '=', 'directorio_empresa_extras.id_empresa')
            ->select('directorio_empresa_extras.*')
            ->where('empresas.id_empresa', $idDes, )->first();

        return view('admin.onempresa', [
            'empresas' => $empresas,
            'roles' => $rol,
            'imagen' => $imagen
        ]);
    }
    public function updateEmp($id, Request $data)
    {
        $data->validate([
            'path_file_foto1' => 'required|image|dimensions:width=1920,height=1080',
            'path_file_foto2' => 'required|image|dimensions:width=1080,height=1080',
        ], [
            'path_file_foto1.required' => 'La Imagen de la Empresa es Obligatorio.',
            'path_file_foto1.dimensions' => 'La Imagen debe tener dimensiones de 1920x1080 píxeles.',
            'path_file_foto2.required' => 'El Logo de la Empresa es Obligatorio.',
            'path_file_foto2.dimensions' => 'El Logo debe tener dimensiones de 1080x1080 píxeles.',
        ]);
        $idDes = Crypt::decryptString($id);
        if ($data->hasFile('path_file_foto1')) {
            $file = $data->file('path_file_foto1');
            $dimensions = getimagesize($file);
            $endPath = public_path('/storage/images/empresas/empresa/' . $idDes . '/');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $oldImagePath = DB::table('directorio.directorio_empresa_extras')
                ->where('id_empresa', $idDes)
                ->value('path_file_foto1');
            if ($oldImagePath && file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath));
            }
            $uploadSuccess = $file->move($endPath, $filename);
            if ($uploadSuccess) {
                $direccionImagen = '/storage/images/empresas/empresa/' . $idDes . '/' . $filename;
                DB::table('directorio.directorio_empresa_extras')
                    ->updateOrInsert(
                        ['id_empresa' => $idDes],
                        ['path_file_foto1' => $direccionImagen]
                    );
            } else {
                $direccionImagen = '';
            }
        } else {
            $direccionImagen = '';
        }
        if ($data->hasFile('path_file_foto2')) {
            $file = $data->file('path_file_foto2');
            $dimensions = getimagesize($file);
            $endPath = public_path('/storage/images/empresas/logo/' . $idDes . '/');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $oldImagePath = DB::table('directorio.directorio_empresa_extras')
                ->where('id_empresa', $idDes)
                ->value('path_file_foto2');
            if ($oldImagePath && file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath));
            }
            $uploadSuccess = $file->move($endPath, $filename);
            if ($uploadSuccess) {
                $direccionImagen2 = '/storage/images/empresas/logo/' . $idDes . '/' . $filename;
                DB::table('directorio.directorio_empresa_extras')
                    ->updateOrInsert(
                        ['id_empresa' => $idDes],
                        ['path_file_foto2' => $direccionImagen2]
                    );
            } else {
                $direccionImagen2 = '';
            }
        } else {
            $direccionImagen2 = '';
        }

        return redirect()->back();
    }

    public function eliminarEmp($id)
    {
        $idDes = Crypt::decryptString($id);
        Empresas::where('id_empresa', $idDes)->update(['estado' => 'inactivo']);
        return redirect()->route('home');
    }
    public function publicarEmp($id)
    {
        $idDes = Crypt::decryptString($id);
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
            ->where('id_user', Auth::id(), )
            ->get();
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol', 'rol.nombre_rol')
            ->where('id_user', Auth::id(), )->get();




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
            ->where('id_user', Auth::id(), )->get();
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol', 'rol.nombre_rol')
            ->where('id_user', Auth::id(), )->get();



        $rubroEdit = Rubro::where('id_rubro', $idDes)->first();


        return view('admin.onerubro', [
            'empresas' => $empresas,
            'roles' => $rol,
            'rubroEdit' => $rubroEdit,
        ]);
    }
    public function updateRubro($id, Request $data)
    {
        $idDes = Crypt::decryptString($id);
        $direcion = '';
        if ($data->hasFile('imagen_rubro')) {
            $file = $data->file('imagen_rubro');
            $endPath = 'storage/images/rubros/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $data->file('imagen_rubro')->move($endPath, $fileName);
            $direcion = $endPath . $fileName;
        }

        if (strlen($direcion) < 5) {
            $direcion = $data->imagen_rubro;
        } else {
            $direcion = URL($direcion);
        }

        Rubro::where('id_rubro', $idDes)->update([
            'nombre_rubro' => $data->nombre_rubro,
            'abreviacion_rubro' => $data->abreviacion_rubro,
            'imagen_rubro' => $direcion,
            'estado' => 'activo',
        ]);
        return redirect()->route('home');
    }

    public function eliminarRubro($id)
    {
        $idDes = Crypt::decryptString($id);
        Rubro::where('id_rubro', $id)->update(['estado' => 'eliminado']);
        return redirect()->route('home');
    }
    public function estadoRubro($id)
    {
        $idDes = Crypt::decryptString($id);
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
            ->where('id_user', Auth::id(), )->get();
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol', 'rol.nombre_rol')
            ->where('id_user', Auth::id(), )->get();


        $categorias = Categoria::all();
        return view('admin.listcategoria', [
            'empresas' => $empresas,
            'roles' => $rol,
            'categorias' => $categorias,
        ]);
    }
    public function oneCategoria($id)
    {
        $idDes = Crypt::decryptString($id);
        $empresas = DB::table('grupo_empresa_user')
            ->join('empresas', 'grupo_empresa_user.id_empresa', '=', 'empresas.id_empresa')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->select('empresas.*')
            ->where('id_user', Auth::id(), )->get();
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol', 'rol.nombre_rol')
            ->where('id_user', Auth::id(), )->get();


        $categoriaEdit = Categoria::where('id_categoria', $idDes)->first();


        return view('admin.onecategoria', [
            'empresas' => $empresas,
            'roles' => $rol,
            'categoriaEdit' => $categoriaEdit,
        ]);
    }
    public function updateCategoria($id, Request $data)
    {
        $idDes = Crypt::decryptString($id);
        Categoria::where('id_categoria', $idDes)->update([
            'nombre_rubro' => $data->nombre_rubro,
            'abreviacion_rubro' => $data->abreviacion_rubro,
            'id_rubro' => $data->id_rubro,
        ]);
        return redirect()->route('home');
    }

    public function eliminarCategoria($id)
    {
        $idDes = Crypt::decryptString($id);
        Categoria::where('id_categoria', $idDes)->update(['estado' => 'eliminado']);
        return redirect()->route('home');
    }
    public function estadoCategoria($id)
    {
        $idDes = Crypt::decryptString($id);
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
            ->select('rol.id_rol', 'rol.nombre_rol')
            ->where('id_user', Auth::id(), )->get();


        $notificaciones = DB::table('notificacion')
            ->select('*')
            ->where('id_user', Auth::id(), )
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
        $idDes = Crypt::decryptString($id);
        $rol = DB::table('grupo_empresa_user')
            ->join('users', 'grupo_empresa_user.id_user', '=', 'users.id')
            ->join('rol', 'grupo_empresa_user.id_rol', '=', 'rol.id_rol')
            ->select('rol.id_rol', 'rol.nombre_rol')
            ->where('id_user', Auth::id(), )->get();


        $notificacion = DB::table('notificacion')
            ->select('*')
            ->where('id_notificacion', $idDes, )->first();

        return view('admin.onecorreo', [
            'notificacion' => $notificacion,
            'roles' => $rol,
        ]);
    }

}
