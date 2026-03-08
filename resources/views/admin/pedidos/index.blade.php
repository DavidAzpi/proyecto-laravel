@extends('layouts.admin')

@section('title', 'Registro de Pedidos')

@section('content')

<div class="admin-card">
    <div class="admin-card-header">
        <span class="admin-card-title">Listado de Ventas y Reservas</span>
        <span style="font-size:0.78rem; color:var(--admin-text-muted);">{{ $pedidos->total() }} registros</span>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Coche</th>
                <th>Cliente (Usuario)</th>
                <th>Precio</th>
                <th>Método Pago</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pedidos as $pedido)
            <tr>
                <td>#{{ $pedido->id }}</td>
                <td>
                    <div style="font-weight: 500;">{{ $pedido->coche->modelo }}</div>
                    <div style="font-size: 0.7rem; color: #888;">{{ $pedido->coche->marca->nombre }}</div>
                </td>
                <td>
                    <div style="font-weight: 500;">{{ $pedido->nombre_cliente }}</div>
                    <div style="font-size: 0.7rem; color: #888;">{{ $pedido->email_cliente }} ({{ $pedido->user->name }})</div>
                </td>
                <td style="font-weight: 500;">{{ number_format($pedido->precio, 0, ',', '.') }} €</td>
                <td>
                    <span class="badge badge-light" style="text-transform: capitalize;">{{ $pedido->metodo_pago }}</span>
                </td>
                <td style="font-size:0.78rem; color:var(--admin-text-muted);">{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <form action="{{ route('admin.pedidos.destroy', $pedido->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este registro de pedido?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-admin btn-admin-danger" style="padding:5px 10px; font-size:0.72rem;">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">
                    <div class="admin-empty">
                        <p>No se han registrado pedidos todavía.</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="admin-pagination">
        {{ $pedidos->links() }}
    </div>
</div>

@endsection
