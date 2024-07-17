<?php
use App\Http\Controllers\ClienteInicioController;
use App\Http\Controllers\ClienteEmpresaController;
use App\Http\Controllers\ClienteProductoController;
use App\Http\Controllers\ClienteRubroController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::group(['middleware' => ['auth:sanctum']], function () {
    //empresas
    Route::prefix('')->group(function () {
        Route::controller(EmpresaController::class)->group(function () {
            Route::get('/select', 'seleccionarEmpresa')->name('select');
            Route::get('/home/{id}', 'menuEmpresa')->name('home');
            Route::get('one-emp-admin/{id}', 'unaEmpresa')->name('one-emp-admin');
            Route::put('update-empr/{id}', 'actualizarEmpresa')->name('update-empr');
        });
    });
    //productos
    Route::prefix('')->group(function () {
        Route::controller(ProductoController::class)->group(function () {
            Route::get('list-prod-admin/{id}', 'listaProducto')->name('list-prod-admin');
            Route::get('one-prod-admin/{id}', 'unProducto')->name('one-prod-admin');
            Route::put('update-prod/{id}', 'actualizarProducto')->name('update-prod');
            Route::get('publicar-prod-admin/{id}', 'publicarProducto')->name('publicar-prod-admin');
            Route::get('list-prod-rechazadas/{id}', 'listaProductoRechazado')->name('list-prod-rechazadas');
            Route::get('list-prod-publicados/{id}', 'listaProductoPublicado')->name('list-prod-publicados');
        });
    });
});
//inicio directorio exportador
Route::prefix('')->group(function () {
    Route::controller(ClienteInicioController::class)->group(function(){
        Route::get('/','inicio')->name('inicio');
    });
});
//empresas directorio exportador
Route::prefix('')->group(function () {
    Route::controller(ClienteEmpresaController::class)->group(function(){
    Route::get('empresas','listaEmpresas')->name('empresas');
    Route::get('list-prod-empresas/{id}','listaProductosEmpresa')->name('list-prod-empresas');
    Route::get('detalle-empresas/{id}','unaEmpresa')->name('detalle-empresas');
    });
});
//rubros directorio exportador
Route::prefix('')->group(function () {
    Route::controller(ClienteRubroController::class)->group(function(){
    Route::get('rubros','listaRubros')->name('rubros');
    Route::get('list-prod-rubros/{id_rubro}','listaProductosRubro')->name('list-prod-rubros');
    });
});
//productos directorio exportador
Route::prefix('')->group(function () {
    Route::controller(ClienteProductoController::class)->group(function(){
    Route::get('productos','productosBusqueda')->name('productos');
    Route::get('detalle-producto/{id}','unProducto')->name('detalle-producto');
    });
});