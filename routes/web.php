<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de Phantom Cars
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EspecificacionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoController;

// Ruta principal — showroom público
Route::get('/', [CocheController::class, 'index'])->name('coches.index');

// Rutas de Autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas públicas
Route::get('/coches/{id}', [CocheController::class, 'show'])->name('coches.show');
Route::get('/coches/{id}/compra', [PedidoController::class, 'checkout'])->name('coches.checkout')->middleware('auth');
Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store')->middleware('auth');

Route::get('/marcas', [MarcaController::class, 'publicIndex'])->name('marcas.index');
Route::get('/especificaciones', [EspecificacionController::class, 'publicIndex'])->name('especificaciones.index');


// ============================================================
// Rutas protegidas para ADMIN — panel /admin
// ============================================================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    // ── USUARIOS ──────────────────────────────────────────────
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [UserController::class, 'save'])->name('admin.users.save');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // ── VEHÍCULOS ─────────────────────────────────────────────
    Route::get('/coches', [CocheController::class, 'adminIndex'])->name('admin.coches.index');
    Route::get('/coches/create', [CocheController::class, 'create'])->name('admin.coches.create');
    Route::post('/coches', [CocheController::class, 'save'])->name('admin.coches.save');
    Route::get('/coches/{id}/edit', [CocheController::class, 'edit'])->name('admin.coches.edit');
    Route::put('/coches/{id}', [CocheController::class, 'update'])->name('admin.coches.update');
    Route::delete('/coches/{id}', [CocheController::class, 'delete'])->name('admin.coches.delete');

    // ── MARCAS ────────────────────────────────────────────────
    Route::get('/marcas', [MarcaController::class, 'adminIndex'])->name('admin.marcas.index');
    Route::get('/marcas/create', [MarcaController::class, 'create'])->name('admin.marcas.create');
    Route::post('/marcas', [MarcaController::class, 'save'])->name('admin.marcas.save');
    Route::get('/marcas/{id}/edit', [MarcaController::class, 'edit'])->name('admin.marcas.edit');
    Route::put('/marcas/{id}', [MarcaController::class, 'update'])->name('admin.marcas.update');
    Route::delete('/marcas/{id}', [MarcaController::class, 'delete'])->name('admin.marcas.delete');

    // ── ESPECIFICACIONES ──────────────────────────────────────
    Route::get('/especificaciones', [EspecificacionController::class, 'adminIndex'])->name('admin.especificaciones.index');
    Route::get('/especificaciones/create', [EspecificacionController::class, 'create'])->name('admin.especificaciones.create');
    Route::post('/especificaciones', [EspecificacionController::class, 'save'])->name('admin.especificaciones.save');
    Route::get('/especificaciones/{id}/edit', [EspecificacionController::class, 'edit'])->name('admin.especificaciones.edit');
    Route::put('/especificaciones/{id}', [EspecificacionController::class, 'update'])->name('admin.especificaciones.update');
    Route::delete('/especificaciones/{id}', [EspecificacionController::class, 'delete'])->name('admin.especificaciones.delete');

    // ── PEDIDOS ───────────────────────────────────────────────
    Route::get('/pedidos', [PedidoController::class, 'index'])->name('admin.pedidos.index');
    Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy'])->name('admin.pedidos.destroy');
});
