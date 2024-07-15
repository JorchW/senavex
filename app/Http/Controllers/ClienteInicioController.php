<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteInicioController extends Controller
{
    public function inicio()
    {
        return view('vistas.inicio');
    }
}
