<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/select',[App\Http\Controllers\EmpresaController::class, 'seleccionarEmpresa'])->name('select');
Route::get('/home/{id}', [App\Http\Controllers\EmpresaController::class, 'menuEmpresa'])->name('home');
Route::get('one-emp-admin/{id}', [App\Http\Controllers\EmpresaController::class, 'unaEmpresa'])->name('one-emp-admin');
Route::put('update-empr/{id}', [App\Http\Controllers\EmpresaController::class, 'actualizarEmpresa'])->name('update-empr');

Route::get('list-prod-admin/{id}', [App\Http\Controllers\ProductoController::class, 'listaProducto'])->name('list-prod-admin');
Route::get('one-prod-admin/{id}', [App\Http\Controllers\ProductoController::class, 'unProducto'])->name('one-prod-admin');
Route::put('update-prod/{id}', [App\Http\Controllers\ProductoController::class, 'actualizarProducto'])->name('update-prod');
Route::get('publicar-prod-admin/{id}', [App\Http\Controllers\ProductoController::class, 'publicarProducto'])->name('publicar-prod-admin');
Route::get('list-prod-rechazadas/{id}', [App\Http\Controllers\ProductoController::class, 'listaProductoRechazado'])->name('list-prod-rechazadas');
Route::get('list-prod-publicados/{id}', [App\Http\Controllers\ProductoController::class, 'listaProductoPublicado'])->name('list-prod-publicados');

Route::get('/', [App\Http\Controllers\ClienteInicioController::class, 'inicio'])->name('inicio');

Route::get('empresas', [App\Http\Controllers\ClienteEmpresaController::class, 'listaEmpresas'])->name('empresas');
Route::get('list-prod-empresas/{id}', [App\Http\Controllers\ClienteEmpresaController::class, 'listaProductosEmpresa'])->name('list-prod-empresas');
Route::get('detalle-empresas/{id}', [App\Http\Controllers\ClienteEmpresaController::class, 'unaEmpresa'])->name('detalle-empresas');

Route::get('rubros', [App\Http\Controllers\ClienteRubroController::class, 'listaRubros'])->name('rubros');
Route::get('list-prod-rubros/{id_rubro}', [App\Http\Controllers\ClienteRubroController::class, 'listaProductosRubro'])->name('list-prod-rubros');

Route::get('productos', [App\Http\Controllers\ClienteProductoController::class, 'productosBusqueda'])->name('productos');
Route::get('detalle-producto/{id}', [App\Http\Controllers\ClienteProductoController::class, 'unProducto'])->name('detalle-producto');
