<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Client\ResponseSequence;
use \Illuminate\Http\Request;
use \Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Empresas;
use App\Models\EstadoEmpresas;
use App\Models\Rol;
use App\Models\Rubro;
use App\Models\GrupoRol;
use App\Models\GrupoRubro;
use App\Models\GrupoEmpresaUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
     
    public function login(Request $request){
        $request->validate([
            'ci'=> 'required',
            'password'=> 'required',
            ], [
                'ci.required' => 'El campo C.I. es obligatorio!',
                //'email.email' =>'El campo Email debe ser una direccion de correo valida!',
                'password.required' => 'El campo Contraseña es onligatorio'
            ]);

            if (Auth::attempt(['ci'=>$request->ci, 'password' => $request->password])){
                return redirect()->intended($this->redirectPath());
            } else {
                return redirect()->back()->withErrors(['ci'=>'Las credenciales no coinciden con el registro!']);
            }
    } 

    public function username(){
        return 'ci';
    }
    /**
     * Create a new controller instance.
     *     */

//    public function login(Request $request)
//    {
//        try {
//            DB::beginTransaction();
//            //$api_rest = 'http://api.taypi.senavex.gob.bo/api/pruebas/upea/v1/signin';
//            //$users = DB::connection('taypi')->select('SELECT * FROM users');
//            //return  $users;
//            if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'estado' => 'activo'])) {
//                /*$response = Http::post($api_rest, [
//                'ci' => $request->username,
//                'password' => $request->password,
//            ]);*/
//                if (true) {
//                    //$dataEmp = Http::get($api_rest . $response->object()->token);
//                    $dataEmp = DB::connection('taypi')->select("SELECT
//                        e.id_empresa, e.razon_social , e.nit, e.matricula, e.telefono, e.celular, e.email, e.pag_web,
//                        rx.ruex, rx.ruex_estado as estado_ruex,
//                        ep.id_rol, r.rol,
//                        e.id_estado_empresa, ee.descripcion_estado as estado_empresa,
//                        CASE
//                            WHEN (ers.estado IS NOT null) THEN array_agg((select row_to_json(_) from (select ers.id_rubro, er.descripcion_rubro as rubro) as _))
//                            ELSE array[]::json[]
//                        END as rubros 
//                    FROM 
//                        personas p 
//                    LEFT JOIN empresas_personas ep ON ep.id_persona = p.id_persona 
//                    LEFT JOIN empresas e ON e.id_empresa = ep.id_empresa 
//                    LEFT JOIN ruexs rx ON rx.id_empresa = e.id_empresa 
//                    LEFT JOIN rols r ON r.id_rol = ep.id_rol 
//                    LEFT JOIN empresa_estados ee ON ee.id_estado_empresa = e.id_estado_empresa
//                    LEFT JOIN empresas_rubros ers ON ers.id_empresa = e.id_empresa
//                    LEFT JOIN empresa_rubros er ON er.id_rubro = ers.id_rubro
//                    WHERE
//                        p.ci = '" . $request->username . "'
//                        AND ep.estado = true
//                        AND (ers.estado = true OR ers.estado IS null)
//                    GROUP BY
//                            e.id_empresa, p.id_persona, ep.id_rol, r.rol, ee.descripcion_estado, rx.ruex, rx.ruex_estado, ers.estado")[0];
//                    foreach ($dataEmp as $data) {
//                        $GrupEmpUserId = GrupoEmpresaUser::where([['id_user', Auth::id()], ['id_empresa', $data->id_empresa], ['id_rol', $data->id_rol]])->first();
//                        if (!$GrupEmpUserId) {
//                            GrupoEmpresaUser::create([
//                                'id_user' => Auth::id(),
//                                'id_rol' => $data->id_rol,
//                                'id_empresa' => $data->id_empresa
//                            ]);
//                        }
//                        foreach ($data->rubros as $rubro) {
//                            $RubroId = GrupoRubro::where([['id_empresa', $data->id_empresa], ['id_rubro', $rubro->id_rubro]])->first();
//                            if (!$RubroId) {
//                                GrupoRubro::create([
//                                    'id_rubro' => $rubro->id_rubro,
//                                    'id_empresa' => $data->id_empresa
//                                ]);
//                            }
//                        }
//                        DB::table('empresas')
//                            ->where('id_empresa', $data->id_empresa)
//                            ->update([
//                                'matricula'             => $data->matricula ?? 0,
//                                'ruex'                  => $data->ruex ?? 0,
//                                'estado_ruex'           => $data->estado_ruex ?? false,
//                                'id_estado_empresa'     => $data->id_estado_empresa,
//                            ]);
//                    }
//                    return $this->sendLoginResponse($request);
//                } else {
//                    return redirect()->route('home');
//                }
//            } else {
//                /*$response = Http::post($api_rest, [
//                'ci' => $request->username,
//                'password' => $request->password,
//            ]);*/
//                if (true) {
//
//                    /*$jwtToken = $response->object()->token;
//                $tokenPart = explode(".", $jwtToken);
//                $tokenDataPayload = $tokenPart[1];
//                $arrayDataPayload = base64_decode($tokenDataPayload);
//                $dataPerson = json_decode($arrayDataPayload);*/
//
//                    $dataPerson = $dataEmp = DB::connection('taypi')
//                        ->select(
//                            "SELECT u.ci, u.email, p.nombres, p.primer_apellido, p.segundo_apellido, u.password
//                            FROM users u, personas p
//                            WHERE u.id_persona = p.id_persona AND u.ci = '" . strval($request->username) . "' OR u.email = '" . strval($request->username) . "'"
//                        )[0];
//                    //$dataPerson = json_decode($dataPerson);
//                    //return $dataPerson;
//                    $user = User::create([
//                        'ci' => strval($dataPerson->ci),
//                        'nombres' => $dataPerson->nombres,
//                        'primerApellido' => $dataPerson->primerApellido ?? '',
//                        'segundoApellido' => $dataPerson->segundoApellido ?? '',
//                        'email' => $dataPerson->email ?? '',
//                        'username' => strval($dataPerson->ci),
//                        'password' => Hash::make($request->password),
//                    ]);
//
//                    $user = User::where('ci', strval($dataPerson->ci))->first();
//                    //$dataEmp = Http::get('http://api.taypi.senavex.gob.bo/api/pruebas/upea/v1/signin/' . $response->object()->token);
//
//                    $dataEmp = collect(DB::connection('taypi')
//                        ->select(
//                            "SELECT
//                                e.id_empresa, e.razon_social , e.nit, e.matricula, e.telefono, e.celular, e.email, e.pag_web,
//                                rx.ruex, rx.ruex_estado as estado_ruex,
//                                ep.id_rol, r.rol,
//                                e.id_estado_empresa, ee.descripcion_estado as estado_empresa,
//                                CASE
//                                    WHEN (ers.estado IS NOT null) THEN array_agg((select row_to_json(_) from (select ers.id_rubro, er.descripcion_rubro as rubro) as _))
//                                    ELSE array[]::json[]
//                                END as rubros 
//                            FROM personas p 
//                            LEFT JOIN empresas_personas ep ON ep.id_persona = p.id_persona 
//                            LEFT JOIN empresas e ON e.id_empresa = ep.id_empresa 
//                            LEFT JOIN ruexs rx ON rx.id_empresa = e.id_empresa 
//                            LEFT JOIN rols r ON r.id_rol = ep.id_rol 
//                            LEFT JOIN empresa_estados ee ON ee.id_estado_empresa = e.id_estado_empresa
//                            LEFT JOIN empresas_rubros ers ON ers.id_empresa = e.id_empresa
//                            LEFT JOIN empresa_rubros er ON er.id_rubro = ers.id_rubro
//                            WHERE
//                                p.ci = '" . $request->username . "'
//                                AND ep.estado = true
//                                AND (ers.estado = true OR ers.estado IS null)
//                            GROUP BY
//                                    e.id_empresa, p.id_persona, ep.id_rol, r.rol, ee.descripcion_estado, rx.ruex, rx.ruex_estado, ers.estado"
//                        ));
//                    foreach ($dataEmp as $data) {
//                        $RolId = Rol::find($data->id_rol);
//                        if (!$RolId) {
//                            Rol::create([
//                                'id_rol' => $data->id_rol,
//                                'nombre_rol' => $data->rol,
//                            ]);
//                        }
//                        $EstEmpId = EstadoEmpresas::where('id_estado_empresa', $data->id_estado_empresa)->first();
//                        if (!$EstEmpId) {
//                            EstadoEmpresas::create([
//                                'id_estado_empresa' => $data->id_estado_empresa,
//                                'estado_empresa' => $data->estado_empresa,
//                            ]);
//                        }
//                        $EmpId = Empresas::where('id_empresa', $data->id_empresa)->first();
//                        if (!$EmpId) {
//                            Empresas::create([
//                                'id_empresa'            => $data->id_empresa,
//                                'razon_social_empresa'  => $data->razon_social ?? '',
//                                'descripcion_empresa'   => '',
//                                'nit'                   => $data->nit ?? 0,
//                                'matricula'             => $data->matricula ?? 0,
//                                'telefono'              => $data->telefono ?? 0,
//                                'celular_1'             => $data->celular ?? 0,
//                                'nombre_1'              => '',
//                                'celular_2'             => 0,
//                                'nombre_2'              => '',
//                                'email'                 => $data->email ?? '',
//                                'pag_web'               => $data->pag_web ?? '',
//                                'ruex'                  => $data->ruex ?? '',
//                                'estado_ruex'           => $data->estado_ruex ?? 0,
//                                'imagen_empresa'        => '',
//                                'id_estado_empresa'     => $data->id_estado_empresa,
//                                'estado'                => 'inactivo',
//                            ]);
//                        }
//                        $Empgrupo = GrupoEmpresaUser::where('id_empresa', $data->id_empresa)->where('id_user', $user->id_user)->first();
//                        if (!$Empgrupo) {
//                            GrupoEmpresaUser::create([
//                                'id_empresa' => $data->id_empresa,
//                                'id_rol' => $data->id_rol,
//                                'id_user' => $user->id,
//                            ]);
//                        }
//                    }
//                    DB::commit();
//                    Auth::attempt(['username' => $request->username, 'password' => $request->password, 'estado' => 'activo']);
//                    return redirect()->route('home');
//                } else {
//                    return $this->sendFailedLoginResponse($request, 'auth.failed_status');
//                }
//            }
//            //code...
//        } catch (\Throwable $th) {
//            DB::rollBack();
//            dump($th->getMessage());
//            return response()->json(['success' => false, 'message' => $th->getMessage()], 400);
//        }
//    }
//    public function username()
//    {
//        return 'username';
//    }
}
