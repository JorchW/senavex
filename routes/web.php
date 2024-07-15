<?php
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::prefix('')->group(function () {
        Route::controller(EmpresaController::class)->group(function () {
            Route::get('/select', 'seleccionarEmpresa')->name('select');
            Route::get('/home/{id}', 'menuEmpresa')->name('home');
            Route::get('one-emp-admin/{id}', 'unaEmpresa')->name('one-emp-admin');
            Route::put('update-empr/{id}', 'actualizarEmpresa')->name('update-empr');
        });
    });

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

Route::prefix('')->group(function () {
    Route::get('/', [App\Http\Controllers\ClienteInicioController::class, 'inicio'])->name('inicio');
});
Route::prefix('')->group(function () {
    Route::get('empresas', [App\Http\Controllers\ClienteEmpresaController::class, 'listaEmpresas'])->name('empresas');
    Route::get('list-prod-empresas/{id}', [App\Http\Controllers\ClienteEmpresaController::class, 'listaProductosEmpresa'])->name('list-prod-empresas');
    Route::get('detalle-empresas/{id}', [App\Http\Controllers\ClienteEmpresaController::class, 'unaEmpresa'])->name('detalle-empresas');
});

Route::prefix('')->group(function () {
    Route::get('rubros', [App\Http\Controllers\ClienteRubroController::class, 'listaRubros'])->name('rubros');
    Route::get('list-prod-rubros/{id_rubro}', [App\Http\Controllers\ClienteRubroController::class, 'listaProductosRubro'])->name('list-prod-rubros');

});
Route::prefix('')->group(function () {
    Route::get('productos', [App\Http\Controllers\ClienteProductoController::class, 'productosBusqueda'])->name('productos');
    Route::get('detalle-producto/{id}', [App\Http\Controllers\ClienteProductoController::class, 'unProducto'])->name('detalle-producto');
});