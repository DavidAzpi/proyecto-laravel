<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Coche;
use App\Models\Marca;
use App\Models\User;
use App\Models\Especificacion;
use App\Models\Pedido;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'coches'          => Coche::count(),
            'marcas'          => Marca::count(),
            'usuarios'        => User::count(),
            'especificaciones' => Especificacion::count(),
            'pedidos'         => Pedido::count(),
            'ingresos'        => Pedido::sum('precio'),
        ];

        $recentCoches  = Coche::with('marca')->latest()->take(5)->get();
        $allMarcas     = Marca::withCount('coches')->orderBy('nombre')->get();
        $recentEspecs  = Especificacion::latest()->take(5)->get();
        $recentUsers   = User::latest()->take(5)->get();
        $recentPedidos = Pedido::with(['coche', 'user'])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'stats', 'recentCoches', 'allMarcas', 'recentEspecs', 'recentUsers', 'recentPedidos'
        ));
    }
}
