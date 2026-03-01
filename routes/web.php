<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\EspecificacionController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de la Aplicacion (Phantom Cars)
|--------------------------------------------------------------------------
*/

// Rutas de Autenticacion
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Redireccion inicial
Route::get('/', function () {
    return redirect()->route('coches.index');
});

// RUTAS PUBLICAS (Lectura para todos autenticados)
Route::middleware(['auth'])->group(function () {
    Route::get('/coches', [CocheController::class, 'index'])->name('coches.index');
    Route::get('/coches/{id}', [CocheController::class, 'show'])->name('coches.show');
    Route::get('/coches/{id}/compra', [CocheController::class, 'compra'])->name('coches.compra');
    Route::post('/coches/compra', [CocheController::class, 'procesarCompra'])->name('coches.procesar_compra');
    Route::get('/marcas', [MarcaController::class, 'index'])->name('marcas.index');
    Route::get('/especificaciones', [EspecificacionController::class, 'index'])->name('especificaciones.index');
});

// RUTAS PROTEGIDAS (Solo Admin)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // Gestion de Pedidos
    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');

    // Gestion de Coches
    Route::prefix('coches')->group(function () {
        Route::get('/crear', [CocheController::class, 'create'])->name('coches.create');
        Route::post('/guardar', [CocheController::class, 'store'])->name('coches.save');
        Route::get('/editar/{id}', [CocheController::class, 'edit'])->name('coches.edit');
        Route::post('/actualizar', [CocheController::class, 'update'])->name('coches.update');
        Route::get('/eliminar/{id}', [CocheController::class, 'destroy'])->name('coches.delete');
    });

    // Gestion de Marcas
    Route::prefix('marcas')->group(function () {
        Route::get('/crear', [MarcaController::class, 'create'])->name('marcas.create');
        Route::post('/guardar', [MarcaController::class, 'store'])->name('marcas.save');
        Route::get('/editar/{id}', [MarcaController::class, 'edit'])->name('marcas.edit');
        Route::post('/actualizar', [MarcaController::class, 'update'])->name('marcas.update');
        Route::get('/eliminar/{id}', [MarcaController::class, 'destroy'])->name('marcas.delete');
    });

    // Gestion de Especificaciones
    Route::prefix('especificaciones')->group(function () {
        Route::get('/crear', [EspecificacionController::class, 'create'])->name('especificaciones.create');
        Route::post('/guardar', [EspecificacionController::class, 'store'])->name('especificaciones.save');
        Route::get('/editar/{id}', [EspecificacionController::class, 'edit'])->name('especificaciones.edit');
        Route::post('/actualizar', [EspecificacionController::class, 'update'])->name('especificaciones.update');
        Route::get('/eliminar/{id}', [EspecificacionController::class, 'destroy'])->name('especificaciones.delete');
    });
});
