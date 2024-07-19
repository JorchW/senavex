<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listaProducto($id)
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
            ->leftjoin('directorio.producto_solicituds as dps', 'dps.id_producto', '=', 'dp.id_producto')
            ->join('ddjj_datos_mercancias as dm', 'dj.id_ddjj', '=', 'dm.id_ddjj')
            ->join('acuerdos as a', 'a.id_acuerdo', '=', 'dj.id_acuerdo')
            ->join('empresas as e', 'dj.id_empresa', '=', 'e.id_empresa')
            ->select('*')
            ->where('dj.id_empresa', $idDes)
            ->whereNull('dps.id_producto_solicitud')
            ->whereIn('dj.id_ddjj_estado', [6, 9, 10, 11])->get();

        $imagenempresa = DB::table('empresas as e')
            ->join('directorio.directorio_empresa_extras as dde','e.id_empresa','=','dde.id_empresa')
            ->select('dde.path_file_foto1','dde.path_file_foto2')
            ->where('e.id_empresa', $idDes)->get();

        $enviarproducto = DB::table('directorio.directorio_productos')->get();

        return view('admin.listproducto', [
            'imagenempresa' => $imagenempresa,
            'enviarproducto' => $enviarproducto,
            'empresas' => $empresas,
            'roles' => $rol,
            'productos' => $productos,
            'idempresas' => $idDes
        ]);
    }

    public function unProducto($id)
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

        $directorioproducto = DB::table('directorio.directorio_productos as dp')
            ->join('ddjjs as dj', 'dp.id_ddjj', '=', 'dj.id_ddjj')
            ->select('*')
            ->where('dj.id_ddjj', $idDes)->first();

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

        $rubrosel = DB::table('ddjjs')
            ->join('directorio.directorio_productos as dp', 'ddjjs.id_ddjj', '=', 'dp.id_ddjj')
            ->join('empresa_rubros as er', 'dp.id_empresa_rubro', '=', 'er.id_rubro')
            ->select('er.*')
            ->where('ddjjs.id_ddjj', $idDes)->get();

        $rubros = DB::table('empresa_rubros as er')
            ->join('empresas_rubros as ers', 'ers.id_rubro', '=', 'er.id_rubro')
            ->select('er.*')
            ->where('ers.id_empresa', $empresas->id_empresa)->get();

        $imagenempresa = DB::table('ddjjs as dj')
            ->join('empresas as e','dj.id_empresa','=','e.id_empresa')
            ->join('directorio.directorio_empresa_extras as dde','e.id_empresa','=','dde.id_empresa')
            ->select('dde.path_file_foto1','dde.path_file_foto2')
            ->where('dj.id_ddjj', $idDes)->get();

        return view('admin.editproducto', [
            'imagenempresa' => $imagenempresa,
            'empresas' => $empresas,
            'directorioproducto' => $directorioproducto,
            'roles' => $rol,
            'imagen' => $imagen,
            'rubrosel' => $rubrosel,
            'rubros' => $rubros,
        ]);
    }

    public function actualizarProducto($id, Request $data)
    {
        $idDes = Crypt::decryptString($id);

        $id_empresa = $data->input('id_empresa');
        $id_rubro = $data->input('id_rubro');
        $nombre_comercial = $data->input('nombre_comercial');
        $descripcion = $data->input('descripcion');

        $rules = [
            'id_empresa' => 'required|integer',
            'id_rubro' => 'required|integer',
            'nombre_comercial' => 'required',
            'descripcion' => 'required',
        ];

        $messages = [
            'id_rubro.integer' => 'El rubro es obligatorio.',
            'nombre_comercial.required' => 'El nombre comercial es obligatorio.',
            'descripcion.required' => 'La descripción es obligatoria.',
        ];

        // Verificar si hay imágenes existentes
        $existingImages = DB::table('directorio.directorio_productos')
            ->where('id_ddjj', $idDes)
            ->select('path_file_photo1', 'path_file_photo2', 'path_file_photo3')
            ->first();

        // Validar imágenes solo si no existen imágenes previas
        if (!$existingImages) {
            $rules['path_file_photo1'] = 'required|image|dimensions:width=1920,height=1920';
            $rules['path_file_photo2'] = 'required|image|dimensions:width=1920,height=1920';
            $rules['path_file_photo3'] = 'required|image|dimensions:width=1920,height=1920';

            $messages['path_file_photo1.required'] = 'La foto 1 es obligatoria.';
            $messages['path_file_photo1.dimensions'] = 'La foto 1 debe tener dimensiones de 1920x1920 píxeles.';
            $messages['path_file_photo2.required'] = 'La foto 2 es obligatoria.';
            $messages['path_file_photo2.dimensions'] = 'La foto 2 debe tener dimensiones de 1920x1920 píxeles.';
            $messages['path_file_photo3.required'] = 'La foto 3 es obligatoria.';
            $messages['path_file_photo3.dimensions'] = 'La foto 3 debe tener dimensiones de 1920x1920 píxeles.';
        }

        // Validar los datos
        $data->validate($rules, $messages);

        // Procesar y guardar las imágenes si son nuevas
        if ($data->hasFile('path_file_photo1')) {
            $file = $data->file('path_file_photo1');
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
            ->updateOrInsert(
                ['id_ddjj' => $idDes],
                [
                    'id_empresa' => $id_empresa,
                    'id_empresa_rubro' => $id_rubro,
                    'nombre_comercial' => $nombre_comercial,
                    'descripcion' => $descripcion,
                ]
            );

        return redirect()->back()->with('success', 'Se subieron los Datos con Exito!.');
    }
}