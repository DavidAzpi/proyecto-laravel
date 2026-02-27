<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;   // 👈 IMPORTAR
use App\Models\Fruta;    // 👈 IMPORTAR
class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('frutas')->get();

        return view('pedido.index', compact('pedidos'));
    }

    public function create()
    {
        $frutas = Fruta::all();

        return view('pedido.create', compact('frutas'));
    }

    public function save(Request $request)
    {
        $pedido = Pedido::create([
            'cliente' => $request->input('cliente'),
            'fecha' => date('Y-m-d')
        ]);

        foreach ($request->input('frutas') as $fruta_id => $cantidad) {
            if ($cantidad > 0) {
                $pedido->frutas()->attach($fruta_id, [
                    'cantidad' => $cantidad
                ]);
            }
        }

        return redirect()->route('pedido.index');
    }

}
