<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function seleccionarEmpresa()
    {
        $empresas = DB::table('empresas')
            ->join('empresas_personas', 'empresas.id_empresa', '=', 'empresas_personas.id_empresa')
            ->join('personas', 'empresas_personas.id_persona', '=', 'personas.id_persona')
            ->join('users', 'personas.id_persona', '=', 'users.id_persona')
            ->join('empresa_estados as ee', 'ee.id_estado_empresa', '=', 'empresas.id_estado_empresa')
            ->join('ruexs as r', 'empresas.id_empresa', '=', 'r.id_empresa')
            ->select('empresas.*', 'users.*', 'ee.*', 'r.*')
            ->where('ee.descripcion_estado','like','Empresa con RUEX')
            ->where('r.ruex_estado',[true])
            ->where('id_user', Auth::id())->get();

        $empresasvencida = DB::table('empresas')
            ->join('empresas_personas', 'empresas.id_empresa', '=', 'empresas_personas.id_empresa')
            ->join('personas', 'empresas_personas.id_persona', '=', 'personas.id_persona')
            ->join('users', 'personas.id_persona', '=', 'users.id_persona')
            ->join('empresa_estados as ee', 'ee.id_estado_empresa', '=', 'empresas.id_estado_empresa')
            ->join('ruexs as r', 'empresas.id_empresa', '=', 'r.id_empresa')
            ->select('empresas.*', 'users.*', 'ee.*', 'r.*')
            ->where('ee.descripcion_estado','like','Empresa con RUEX - Vencido')
            ->where('r.ruex_estado',[false])
            ->where('id_user', Auth::id())->get();

        //$ruexs = DB::table('empresas as e')
        //    ->join('ruexs as r', 'e.id_empresa', '=', 'r.id_empresa')
        //    ->join('empresas_personas', 'e.id_empresa', '=', 'empresas_personas.id_empresa')
        //    ->join('personas', 'empresas_personas.id_persona', '=', 'personas.id_persona')
        //    ->join('users', 'personas.id_persona', '=', 'users.id_persona')
        //    ->select('r.ruex')
        //    ->where('id_user',Auth::id())
        //    ->whereIn('r.ruex_estado',[true])->get();


        return view('admin.select', [
            'empresas' => $empresas,
            'empresasvencidas' => $empresasvencida
        ]);
    }
    public function menuEmpresa($id)
    {
        $idDes = Crypt::decryptString($id);

        $empresas = DB::table('empresas')
            ->join('empresas_personas', 'empresas.id_empresa', '=', 'empresas_personas.id_empresa')
            ->join('personas', 'empresas_personas.id_persona', '=', 'personas.id_persona')
            ->join('users', 'personas.id_persona', '=', 'users.id_persona')
            ->select('empresas.*', 'users.*')
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
    public function unaEmpresa($id)
    {
        $idDes = Crypt::decryptString($id);
        $empresas = DB::table('empresas')
            ->join('ruexs', 'empresas.id_empresa', '=', 'ruexs.id_empresa')
            ->join('empresas_personas', 'empresas.id_empresa', '=', 'empresas_personas.id_empresa')
            ->join('personas', 'empresas_personas.id_persona', '=', 'personas.id_persona')
            ->join('users', 'personas.id_persona', '=', 'users.id_persona')
            ->select('empresas.*', 'users.*', 'ruexs.*')
            ->where('empresas.id_empresa', $idDes)->first();

        $directorioempresa = DB::table('directorio.directorio_empresa_extras as dee')
            ->join('empresas as e', 'dee.id_empresa', '=', 'e.id_empresa')
            ->select('dee.*')
            ->where('e.id_empresa', $idDes)->first();

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
            'directorioempresa' => $directorioempresa,
            'roles' => $rol,
            'imagen' => $imagen
        ]);
    }
    public function actualizarEmpresa($id, Request $data)
    {
        $idDes = Crypt::decryptString($id);

        $telefono = $data->input('telefono');
        $celular = $data->input('celular');
        $facebook = $data->input('facebook');
        $instagram = $data->input('instagram');
        $tiktok = $data->input('tiktok');
        $mail = $data->input('mail');
        $paginaweb = $data->input('paginaweb');

        $existingImage = DB::table('directorio.directorio_empresa_extras')
            ->where('id_empresa', $idDes)
            ->value('path_file_foto1');

        $rules = [
            'facebook' => 'nullable|url',
            'mail' => 'nullable|email',
            'paginaweb' => 'nullable|url',
            'telefono' => 'nullable|numeric|digits_between:7,10',
            'celular' => 'nullable|numeric|digits_between:8,10',
        ];
        $messages = [
            'telefono.numeric' => 'El teléfono debe contener solo números.',
            'telefono.digits_between' => 'El teléfono debe tener entre 7 y 10 dígitos.',
            'celular.numeric' => 'El celular debe contener solo números.',
            'celular.digits_between' => 'El celular debe tener entre 8 y 10 dígitos.',
            'facebook.url' => 'URL de facebook no es válida.',
            'mail.email' => 'Introduzca una dirección de correo válida.',
            'paginaweb.url' => 'La dirección de la página web debe ser una URL válida.',
        ];

        if (!$existingImage) {
            $rules['path_file_foto1'] = 'required|image|dimensions:width=1920,height=1080';
            $rules['path_file_foto2'] = 'required|image|dimensions:width=1080,height=1080';
            $messages['path_file_foto1.required'] = 'Imagen de la Empresa Obligatorio';
            $messages['path_file_foto1.dimensions'] = 'La imagen debe tener dimensiones de 1920x1080 px.';
            $messages['path_file_foto2.required'] = 'El Logo de la Empresa es Obligatorio.';
            $messages['path_file_foto2.dimensions'] = 'El Logo debe tener dimensiones de 1080x1080 px.';
        }

        $data->validate($rules, $messages);

        if ($data->hasFile('path_file_foto1')) {
            $file = $data->file('path_file_foto1');
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
        }

        if ($data->hasFile('path_file_foto2')) {
            $file = $data->file('path_file_foto2');
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
        }

        DB::table('directorio.directorio_empresa_extras')
            ->where('id_empresa', $idDes)
            ->update([
                'telefono' => $telefono,
                'celular' => $celular,
                'facebook' => $facebook,
                'instagram' => $instagram,
                'tiktok' => $tiktok,
                'mail' => $mail,
                'paginaweb' => $paginaweb,
            ]);

        return redirect()->back()->with('success', 'Se actualizaron los Datos con Exito!.');
    }
}
