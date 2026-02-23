<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CocheController;
use App\Http\Controllers\MarcaController;

Route::get('/', function () {
    return redirect()->route('coches.index');
});

Route::resource('coches', CocheController::class);
Route::resource('marcas', MarcaController::class);
