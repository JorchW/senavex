<?php

namespace App\Http\Controllers;

use App\Models\DirectorioEmpresaExtras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Productos;
use App\Models\DirectorioProductoSolicituds;
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

class RevisionController extends Controller
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
    
    public function publicarProd(Request $request,$id)
    {
        //dump($request->users);

        dump(Auth::id());

        $id_ddjj = Crypt::decryptString($id);

        $productos = DB::table('directorio.directorio_productos as ddp')
                    ->select('*')
                    ->where('ddp.id_ddjj', $id_ddjj)->get()[0];
        
        //DirectorioProductoSolicituds::where('id_producto', $idDes)->update(['estado' => 'activo']);

        //dump($productos);

        DirectorioProductoSolicituds::create([
            'id_producto_solicitud_estado' => 1,
            'id_producto' => $productos->id_producto,
            'id_empresa' => $productos->id_empresa,
            'id_revisor' => 15713,
            'id_regional' => 7,
            'fecha_registro' => now(),
            'fecha_asignacion' => now(),
            'fecha_revision' => now(),
            'solicitud_observaciones' => '',
            'fecha_limite' => now(),
            'id_persona' => Auth::id(),
        ]);


        
        //Productos::where('id_producto', $idDes)->update(['estado' => 'activo']);
        return redirect()->route('home');
    }
}
