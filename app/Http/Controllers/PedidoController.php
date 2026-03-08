<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Coche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Muestra el formulario de checkout para un coche específico.
     */
    public function checkout($id)
    {
        $coche = Coche::findOrFail($id);
        return view('coches.checkout', compact('coche'));
    }

    /**
     * Procesa la compra y guarda el pedido.
     */
    public function store(Request $request)
    {
        $request->validate([
            'coche_id'       => 'required|exists:coches,id',
            'nombre_cliente' => 'required|string|max:255',
            'email_cliente'  => 'required|email|max:255',
            'metodo_pago'    => 'required|string',
        ]);

        $coche = Coche::findOrFail($request->coche_id);

        Pedido::create([
            'user_id'        => Auth::id(),
            'coche_id'       => $coche->id,
            'precio'         => $coche->precio,
            'nombre_cliente' => $request->nombre_cliente,
            'email_cliente'  => $request->email_cliente,
            'metodo_pago'    => $request->metodo_pago,
        ]);

        return view('coches.checkout_confirm');
    }

    /**
     * Listado de todos los pedidos para el panel admin.
     */
    public function index()
    {
        $pedidos = Pedido::with(['user', 'coche'])->latest()->paginate(10);
        return view('admin.pedidos.index', compact('pedidos'));
    }

    /**
     * Eliminar un pedido del sistema.
     */
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();
        return back()->with('success', 'Registro de pedido eliminado.');
    }
}
