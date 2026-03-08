@extends('layouts.master')

@section('title', 'Finalizar Pedido')

@section('content')
<div style="padding: 120px 0 80px;">
    <div class="premium-form-container" data-animate style="margin-top: 0;">
        <div style="text-align: center; margin-bottom: 50px;">
            <div style="font-family: 'Syne', sans-serif; font-size: 0.7rem; letter-spacing: 5px; color: var(--lamb-gold); text-transform: uppercase; margin-bottom: 15px;">Checkout</div>
            <h2 style="font-size: 3rem; margin-bottom: 10px;">RESUMEN DEL <span style="font-weight: 200;">PEDIDO</span></h2>
            <p style="color: #888; margin-top: 10px;">Estás a punto de adquirir un <strong>{{ $coche->marca->nombre }} {{ $coche->modelo }}</strong></p>
        </div>

        <form action="{{ route('pedidos.store') }}" method="POST">
            @csrf
            <input type="hidden" name="coche_id" value="{{ $coche->id }}">

            <div class="form-group">
                <label class="premium-label">Nombre Completo</label>
                <input type="text" name="nombre_cliente" class="premium-input" required value="{{ auth()->user()->name }}" placeholder="Ej: Juan Pérez">
            </div>

            <div class="form-group">
                <label class="premium-label">Email de Contacto</label>
                <input type="email" name="email_cliente" class="premium-input" required value="{{ auth()->user()->email }}" placeholder="juan@ejemplo.com">
            </div>

            <div class="form-group">
                <label class="premium-label">Método de Pago</label>
                <select name="metodo_pago" class="premium-select" required style="width: 100%; padding: 15px; background: #fff; border: 1px solid #ddd; border-radius: 5px; font-family: 'Outfit';">
                    <option value="transferencia">Transferencia Bancaria</option>
                    <option value="tarjeta">Tarjeta de Crédito / Débito</option>
                    <option value="cripto">Activos Digitales (BTC/ETH)</option>
                </select>
            </div>

            <div style="margin: 30px 0; padding: 20px; background: #f9f9f9; border-radius: 8px; border-left: 4px solid var(--lamb-gold);">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-family: 'Syne'; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 1px;">Precio Total:</span>
                    <span style="font-size: 1.5rem; font-weight: 600; color: #111;">{{ number_format($coche->precio, 0, ',', '.') }} €</span>
                </div>
            </div>

            <div style="margin-top: 50px; display: flex; gap: 20px;">
                <button type="submit" class="btn-premium btn-fill" style="flex: 1; border: none; cursor: pointer; padding: 20px;">CONFIRMAR ADQUISICIÓN</button>
                <a href="{{ route('coches.show', $coche->id) }}" class="btn-premium btn-outline" style="padding: 20px 30px;">CANCELAR</a>
            </div>
        </form>
    </div>
</div>
@endsection
