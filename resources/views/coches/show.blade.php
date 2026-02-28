@extends('layouts.master')

@section('title', $coche->modelo)

@section('content')
<div style="padding: 120px 0 80px;">
    <div style="display: flex; gap: 80px; align-items: flex-start;" data-animate>
        <!-- Imagen del Coche -->
        <div style="flex: 1.2;">
            <div style="background: var(--lamb-grey-light); padding: 40px; border: 1px solid #eee; position: relative; overflow: hidden;">
                <div style="position: absolute; top: 20px; left: 20px; font-family: 'Syne', sans-serif; font-size: 0.7rem; letter-spacing: 5px; opacity: 0.3; text-transform: uppercase;">
                    Phantom Spec
                </div>
                @if($coche->imagen)
                    @if(filter_var($coche->imagen, FILTER_VALIDATE_URL))
                        <img src="{{ $coche->imagen }}" alt="{{ $coche->modelo }}" style="width: 100%; filter: drop-shadow(0 20px 30px rgba(0,0,0,0.1));">
                    @else
                        <img src="{{ asset(strpos($coche->imagen, 'images/') === 0 ? $coche->imagen : 'storage/' . $coche->imagen) }}" alt="{{ $coche->modelo }}" style="width: 100%; filter: drop-shadow(0 20px 30px rgba(0,0,0,0.1));">
                    @endif
                @else
                    <img src="https://via.placeholder.com/800x600?text=No+Available+Image" alt="Placeholder" style="width: 100%; opacity: 0.5;">
                @endif
            </div>
        </div>

        <!-- Detalles del Coche -->
        <div style="flex: 0.8;">
            <div class="car-card-brand" style="font-size: 1rem; margin-bottom: 10px;">{{ $coche->marca->nombre }}</div>
            <h1 style="font-size: 4rem; margin-bottom: 20px; line-height: 1;">{{ strtoupper($coche->modelo) }}</h1>
            
            <div style="font-size: 2.5rem; font-weight: 200; color: var(--lamb-charcoal); margin-bottom: 40px; font-family: 'Outfit', sans-serif;">
                {{ number_format($coche->precio, 0, ',', '.') }} <span style="font-size: 1.2rem; vertical-align: middle; opacity: 0.6;">€</span>
            </div>

            <div style="border-top: 1px solid #eee; padding-top: 40px; margin-bottom: 50px;">
                <h3 style="font-size: 0.8rem; margin-bottom: 25px; letter-spacing: 2px;">Especificaciones Técnicas</h3>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                    @forelse($coche->especificaciones as $espec)
                        <div style="border-bottom: 1px solid #f9f9f9; padding-bottom: 15px;">
                            <div style="font-size: 0.6rem; color: #999; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">{{ $espec->nombre }}</div>
                            <div style="font-weight: 600; font-size: 1.1rem;">{{ $espec->pivot->valor }}</div>
                        </div>
                    @empty
                        <p style="font-size: 0.8rem; color: #999; grid-column: span 2;">No hay especificaciones técnicas registradas para este modelo.</p>
                    @endforelse
                </div>
            </div>

                <div style="display: flex; gap: 20px; margin-top: 50px;">
                    <a href="{{ route('coches.compra', $coche->id) }}" class="btn-premium btn-fill" style="flex: 1; text-align: center; border: none; padding: 20px;">COMPRAR AHORA</a>
                    <a href="{{ route('coches.index') }}" class="btn-premium btn-outline" style="padding: 20px 30px;">REGRESAR</a>
                </div>
        </div>
    </div>
</div>
@endsection
