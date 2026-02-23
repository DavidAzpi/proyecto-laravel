<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::withCount('coches')->get();
        return view('marcas.index', compact('marcas'));
    }

    // Other methods can be implemented as needed, but let's stick to index for now
}
