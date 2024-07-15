<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

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

    public function login(Request $request)
    {
        $request->validate([
            'ci' => 'required',
            'password' => 'required',
        ], [
            'ci.required' => 'El campo C.I. es obligatorio!',
            'password.required' => 'El campo Contraseña es onligatorio'
        ]);

        if (Auth::attempt(['ci' => $request->ci, 'password' => $request->password])) {
            return redirect()->intended($this->redirectPath());
        } else {
            return redirect()->back()->withErrors(['ci' => 'Las credenciales no coinciden con el registro!']);
        }
    }

    public function username()
    {
        return 'ci';
    }
}
