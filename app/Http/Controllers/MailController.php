<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Productos;
use App\Models\Rubro;
use App\Models\Categoria;
use App\Models\Monedas;
use App\Models\UnidadMedidas;
use App\Models\Empresas;
use App\Models\Notificacion;
use Illuminate\Support\Facades\Crypt;

class MailController extends Controller
{
    //
    
    public function sendEmail($id, Request $data){
        $idDes =Crypt::decryptString($id);
        Notificacion::create([
            'correo_de'     => "pruebas.upea@senavex.gob.bo",
            'correo_para'   => $data->correo_para,
            'titulo'        => $data->titulo,
            'mensaje'       => $data->mensaje,
            'imagen'       => $data->imagen,
            'estado'        =>  "no visto",
            'id_producto'   => $idDes,
            'id_user'       => Auth::id(),
        ]);
        Productos::where('id_producto', $idDes)->update(['estado' => 'observado']);
        $mensaje = [
            'titulo' => $data->titulo,
            'descripcion' => $data->mensaje,
            'imagen' => $data->imagen,
        ];
        Mail::to("valencia.catari.juan.pablo@gmail.com")->send(new TestMail($mensaje));
        return redirect()->route('home');
    }
}
