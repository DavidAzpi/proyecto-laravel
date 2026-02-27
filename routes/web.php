<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\EspecificacionController;

/*
|--------------------------------------------------------------------------
| Rutas de la Aplicación (Phantom Cars)
|--------------------------------------------------------------------------
| Todas las rutas están en español para cumplir los requisitos.
*/

// Redirección inicial al listado de coches
Route::get('/', function () {
    return redirect()->action([CocheController::class, 'index']);
});

// RUTAS PARA COCHES (Entidad Principal B)
Route::prefix('coches')->group(function () {
    Route::get('/', [CocheController::class, 'index'])->name('coches.index');
    Route::get('/crear', [CocheController::class, 'create'])->name('coches.create');
    Route::post('/guardar', [CocheController::class, 'save'])->name('coches.save');
    Route::get('/editar/{id}', [CocheController::class, 'edit'])->name('coches.edit');
    Route::post('/actualizar', [CocheController::class, 'update'])->name('coches.update');
    Route::get('/eliminar/{id}', [CocheController::class, 'delete'])->name('coches.delete');
});

// RUTAS PARA MARCAS (Entidad Principal A - Relación 1:N con Coches)
Route::prefix('marcas')->group(function () {
    Route::get('/', [MarcaController::class, 'index'])->name('marcas.index');
    Route::get('/crear', [MarcaController::class, 'create'])->name('marcas.create');
    Route::post('/guardar', [MarcaController::class, 'save'])->name('marcas.save');
    Route::get('/editar/{id}', [MarcaController::class, 'edit'])->name('marcas.edit');
    Route::post('/actualizar', [MarcaController::class, 'update'])->name('marcas.update');
    Route::get('/eliminar/{id}', [MarcaController::class, 'delete'])->name('marcas.delete');
});

// RUTAS PARA ESPECIFICACIONES (Entidad Principal C - Relación N:N con Coches)
Route::prefix('especificaciones')->group(function () {
    Route::get('/', [EspecificacionController::class, 'index'])->name('especificaciones.index');
    Route::get('/crear', [EspecificacionController::class, 'create'])->name('especificaciones.create');
    Route::post('/guardar', [EspecificacionController::class, 'save'])->name('especificaciones.save');
    Route::get('/editar/{id}', [EspecificacionController::class, 'edit'])->name('especificaciones.edit');
    Route::post('/actualizar', [EspecificacionController::class, 'update'])->name('especificaciones.update');
    Route::get('/eliminar/{id}', [EspecificacionController::class, 'delete'])->name('especificaciones.delete');
});
