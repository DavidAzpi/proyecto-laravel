@extends('layouts.master')

@section('title', 'Finalizar Pedido')

@section('content')
<div style="padding: 120px 0 80px;">
    <div class="premium-form-container" data-animate style="margin-top: 0;">
        <div style="text-align: center; margin-bottom: 50px;">
            <div style="font-family: 'Syne', sans-serif; font-size: 0.7rem; letter-spacing: 5px; color: var(--lamb-gold); text-transform: uppercase; margin-bottom: 15px;">Checkout</div>
            <h2 style="font-size: 3rem; margin-bottom: 10px;">RESUMEN DEL <span style="font-weight: 200;">PEDIDO</span></h2>
        </div>

        <div style="display: flex; gap: 40px; background: var(--lamb-grey-light); padding: 30px; border: 1px solid #eee; margin-bottom: 50px; align-items: center;">
            <div style="flex: 0.4;">
                @if($coche->imagen)
                    <img src="{{ asset(strpos($coche->imagen, 'images/') === 0 ? $coche->imagen : 'storage/' . $coche->imagen) }}" style="width: 100%; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1));">
                @endif
            </div>
            <div style="flex: 0.6;">
                <div class="car-card-brand">{{ $coche->marca->nombre }}</div>
                <h3 style="font-size: 1.5rem; margin-bottom: 5px;">{{ $coche->modelo }}</h3>
                <div style="font-size: 1.2rem; font-weight: 700; color: var(--lamb-gold);">{{ number_format($coche->precio, 0, ',', '.') }} €</div>
            </div>
        </div>

        <form action="{{ route('coches.procesar_compra') }}" method="POST">
            @csrf
            <input type="hidden" name="coche_id" value="{{ $coche->id }}">
            
            <div class="form-group">
                <label class="premium-label">Nombre Completo</label>
                <input type="text" name="nombre" class="premium-input" required placeholder="Ej: Juan Pérez">
            </div>

            <div class="form-group">
                <label class="premium-label">Email de Contacto</label>
                <input type="email" name="email" class="premium-input" required placeholder="juan@ejemplo.com">
            </div>

            <div class="form-group">
                <label class="premium-label">Método de Pago (Simulación)</label>
                <select name="metodo_pago" class="premium-select" required>
                    <option value="transferencia">Transferencia Bancaria (Exclusiva)</option>
                    <option value="financiacion">Financiación Phantom Gold</option>
                    <option value="cripto">Activos Digitales (BTC/ETH)</option>
                </select>
            </div>

            <div style="margin-top: 50px; display: flex; gap: 20px;">
                <button type="submit" class="btn-premium btn-fill" style="flex: 1; border: none; cursor: pointer; padding: 20px;">CONFIRMAR RESERVA</button>
                <a href="{{ route('coches.show', $coche->id) }}" class="btn-premium btn-outline" style="padding: 20px 30px;">CANCELAR</a>
            </div>
        </form>
    </div>
</div>
@endsection
