<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrutaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PedidoController;

// Redirección inicio
Route::get('/', function () {
    return redirect()->route('fruta.index');
});

// FRUTAS
Route::prefix('frutas')->group(function () {

    Route::get('/', [FrutaController::class, 'index'])
        ->name('fruta.index');

    Route::get('/detail/{id}', [FrutaController::class, 'detail'])
        ->name('fruta.detail');

    Route::get('/crear', [FrutaController::class, 'create'])
        ->name('fruta.create');

    Route::post('/save', [FrutaController::class, 'save'])
        ->name('fruta.save');

    Route::get('/delete/{id}', [FrutaController::class, 'delete'])
        ->name('fruta.delete');

    Route::get('/editar/{id}', [FrutaController::class, 'edit'])
        ->name('fruta.edit');

    Route::post('/update', [FrutaController::class, 'update'])
        ->name('fruta.update');
});

// CATEGORIAS
Route::get('/categorias', [CategoriaController::class, 'index'])
    ->name('categoria.index');

// PEDIDOS
Route::get('/pedidos', [PedidoController::class, 'index'])
    ->name('pedido.index');

Route::get('/pedidos/crear', [PedidoController::class, 'create'])
    ->name('pedido.create');

Route::post('/pedidos/save', [PedidoController::class, 'save'])
    ->name('pedido.save');
