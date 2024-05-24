<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('list-grupo-rubro-admin/{id}', [App\Http\Controllers\HomeController::class, 'listgrupRubEmp'])->name('list-grupo-rubro-admin');
Route::post('crea-grup-rubro', [App\Http\Controllers\HomeController::class, 'agreGrupRubro'])->name('crea-grup-rubro');
Route::get('eliminar-grupo-rubros-admin/{id}', [App\Http\Controllers\HomeController::class, 'eliminarGrupoRubro'])->name('eliminar-grupo-rubros-admin');

Route::get('list-prod-admin/{id}', [App\Http\Controllers\HomeController::class, 'listProd'])->name('list-prod-admin');
Route::post('crea-prod/{id}', [App\Http\Controllers\HomeController::class, 'agreProd'])->name('crea-prod');

Route::get('list-prod-admin', [App\Http\Controllers\HomeController::class, 'listProdT'])->name('list-prod-admin');
Route::put('update-prod/{id}', [App\Http\Controllers\HomeController::class, 'updateProd'])->name('update-prod');

Route::get('one-prod-admin/{id}', [App\Http\Controllers\HomeController::class, 'oneProd'])->name('one-prod-admin');
Route::get('eliminar-prod-admin/{id}', [App\Http\Controllers\HomeController::class, 'eliminarProd'])->name('eliminar-prod-admin');
Route::get('observar-prod-admin/{id}', [App\Http\Controllers\HomeController::class, 'observadoProd'])->name('observar-prod-admin');
Route::get('publicar-prod-admin/{id}', [App\Http\Controllers\HomeController::class, 'publicarProd'])->name('publicar-prod-admin');


Route::get('list-rubros-admin', [App\Http\Controllers\HomeController::class, 'listRubro'])->name('list-rubros-admin');
Route::get('one-rubros-admin/{id}', [App\Http\Controllers\HomeController::class, 'oneRubro'])->name('one-rubros-admin');
Route::post('update-rubros/{id}', [App\Http\Controllers\HomeController::class, 'updateRubro'])->name('update-rubros');
Route::get('eliminar-rubros-admin/{id}', [App\Http\Controllers\HomeController::class, 'eliminarRubro'])->name('eliminar-rubros-admin');
Route::get('estado-rubros-admin/{id}', [App\Http\Controllers\HomeController::class, 'estadoRubro'])->name('estado-rubros-admin');

Route::get('list-categorias-admin', [App\Http\Controllers\HomeController::class, 'listCategoria'])->name('list-categorias-admin');
Route::get('one-categorias-admin/{id}', [App\Http\Controllers\HomeController::class, 'oneCategoria'])->name('one-categorias-admin');
Route::post('update-categorias/{id}', [App\Http\Controllers\HomeController::class, 'updateCategoria'])->name('update-categorias');
Route::get('eliminar-categorias-admin/{id}', [App\Http\Controllers\HomeController::class, 'eliminarCategoria'])->name('eliminar-categorias-admin');
Route::get('estado-categorias-admin/{id}', [App\Http\Controllers\HomeController::class, 'estadoCategoria'])->name('estado-categorias-admin');


Route::get('list-emp-admin', [App\Http\Controllers\HomeController::class, 'listEmp'])->name('list-emp-admin');
Route::get('one-emp-admin/{id}', [App\Http\Controllers\HomeController::class, 'oneEmp'])->name('one-emp-admin');
Route::put('update-empr/{id}', [App\Http\Controllers\HomeController::class, 'updateEmp'])->name('update-empr');
Route::get('eliminar-emp-admin/{id}', [App\Http\Controllers\HomeController::class, 'eliminarEmp'])->name('eliminar-emp-admin');
Route::get('publicar-emp-admin/{id}', [App\Http\Controllers\HomeController::class, 'publicarEmp'])->name('publicar-emp-admin');

Route::get('list-correo-admin', [App\Http\Controllers\HomeController::class, 'listCorreo'])->name('list-correo-admin');
Route::get('one-correo-admin/{id}', [App\Http\Controllers\HomeController::class, 'oneCorreo'])->name('one-correo-admin');
Route::post('enviar-correo', [App\Http\Controllers\HomeController::class, 'enviarCorreo'])->name('enviar-correo');



Route::get('/', [App\Http\Controllers\ClienteController::class, 'index'])->name('inicio');
Route::get('Inicio', [App\Http\Controllers\ClienteController::class, 'index'])->name('inicio');

Route::get('empresas', [App\Http\Controllers\ClienteController::class, 'listaEmpresas'])->name('empresas');
Route::get('rubros', [App\Http\Controllers\ClienteController::class, 'listaRubros'])->name('rubros');
Route::get('list-prod-empresas/{id}', [App\Http\Controllers\ClienteController::class, 'listaProductosEmpresa'])->name('list-prod-empresas');
Route::get('list-prod-rubros/{id}', [App\Http\Controllers\ClienteController::class, 'listaProductosRubro'])->name('list-prod-rubros');
Route::get('productos', [App\Http\Controllers\ClienteController::class, 'listaProductos'])->name('productos');
Route::get('detalle-producto/{id}', [App\Http\Controllers\ClienteController::class, 'oneProducto'])->name('detalle-producto');
Route::get('detalle-empresas/{id}', [App\Http\Controllers\ClienteController::class, 'oneEmpresa'])->name('detalle-empresas');



Route::get('correo-lista', [App\Http\Controllers\HomeController::class, 'listaCorreo'])->name('correo-lista');
Route::post('send-email/{id}',[App\Http\Controllers\MailController::class, 'sendEmail'])->name('send-email');
