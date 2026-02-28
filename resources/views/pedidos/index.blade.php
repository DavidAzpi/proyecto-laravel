@extends('layouts.master')

@section('title', 'Gestión de Pedidos')

@section('content')
<div style="padding: 120px 0 80px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px;" data-animate>
        <h2 style="font-size: 2.5rem; font-family: 'Syne', sans-serif; text-transform: uppercase;">
            Registro de <span style="font-weight: 200;">Pedidos</span>
        </h2>
        <div style="font-family: 'Outfit'; font-size: 0.8rem; color: var(--lamb-gold); letter-spacing: 2px;">
            TOTAL: {{ $pedidos->total() }} RESERVAS
        </div>
    </div>

    <div style="overflow-x: auto;" data-animate>
        <table style="width: 100%; border-collapse: collapse; background: var(--lamb-grey-light); border: 1px solid #333; font-family: 'Outfit', sans-serif;">
            <thead>
                <tr style="background: #111; color: white; text-align: left;">
                    <th style="padding: 20px; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 2px;">Referencia</th>
                    <th style="padding: 20px; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 2px;">Cliente</th>
                    <th style="padding: 20px; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 2px;">Vehículo</th>
                    <th style="padding: 20px; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 2px;">Total</th>
                    <th style="padding: 20px; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 2px;">Fecha</th>
                    <th style="padding: 20px; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 2px;">Pago</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                    <tr style="border-bottom: 1px solid #ddd; transition: background 0.3s;"
                        onmouseover="this.style.background='white'" onmouseout="this.style.background='transparent'">
                        <td style="padding: 20px; font-weight: 800; color: var(--lamb-gold);">{{ $pedido->referencia }}</td>
                        <td style="padding: 20px;">
                            <div style="font-weight: 600;">{{ $pedido->nombre }}</div>
                            <div style="font-size: 0.8rem; color: #666;">{{ $pedido->email }}</div>
                        </td>
                        <td style="padding: 20px;">
                            <div style="text-transform: uppercase; font-size: 0.8rem; font-weight: 700;">{{ $pedido->coche->marca->nombre }}</div>
                            <div style="color: var(--lamb-grey-medium);">{{ $pedido->coche->modelo }}</div>
                        </td>
                        <td style="padding: 20px; font-weight: 700;">{{ number_format($pedido->total, 0, ',', '.') }} €</td>
                        <td style="padding: 20px; font-size: 0.85rem; color: #666;">{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                        <td style="padding: 20px;">
                            <span style="background: var(--lamb-charcoal); color: white; padding: 5px 12px; border-radius: 2px; font-size: 0.65rem; text-transform: uppercase; font-weight: 700; letter-spacing: 1px;">
                                {{ $pedido->metodo_pago }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination-container" style="display: flex; justify-content: center; margin-top: 50px;">
        {{ $pedidos->links() }}
    </div>
</div>
@endsection
