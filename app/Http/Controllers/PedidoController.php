<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Muestra el listado de todos los pedidos (solo Admin).
     */
    public function index()
    {
        $pedidos = \App\Models\Pedido::with('coche.marca')->latest()->paginate(10);
        return view('pedidos.index', compact('pedidos'));
    }
}
