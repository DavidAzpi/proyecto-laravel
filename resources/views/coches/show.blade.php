@extends('layouts.master')

@section('title', 'Detalle Vehículo')

@section('content')
<div style="padding: 120px 0 80px;">
    <div style="display: flex; gap: 80px; align-items: flex-start;" data-animate>
        <!-- Imagen del Coche -->
        <div style="flex: 1.2;">
    <div style="background: #f8f8f6; padding: 40px; border: 1px solid #ebebeb; position: relative; overflow: hidden; border-radius: 10px;">
                <div style="position: absolute; top: 20px; left: 20px; font-family: 'Syne', sans-serif; font-size: 0.7rem; letter-spacing: 5px; opacity: 0.3; text-transform: uppercase;">
                    Phantom Spec
                </div>
                @if($coche->imagen)
                    <img src="{{ asset('storage/' . $coche->imagen) }}" 
                         alt="{{ $coche->modelo }}" 
                         style="width: 100%; height: auto; object-fit: contain;">
                @else
                    <img src="https://placehold.co/800x600/000000/C6A869?text={{ $coche->modelo }}" 
                         alt="{{ $coche->modelo }}" 
                         style="width: 100%; height: auto; object-fit: contain; opacity: 0.4;">
                @endif
            </div>
        </div>

        <!-- Detalles del Coche -->
        <div style="flex: 0.8;">
            <div style="font-family: 'Syne', sans-serif; font-size: 0.8rem; color: var(--lamb-gold); text-transform: uppercase; letter-spacing: 3px; margin-bottom: 10px;">
                — {{ $coche->marca->nombre }} —
            </div>
            <h1 style="font-family: 'Syne', sans-serif; font-size: 4rem; margin-bottom: 20px; line-height: 1; text-transform: uppercase;">
                {{ $coche->modelo }}
            </h1>

            <div style="font-size: 2.2rem; font-weight: 300; color: var(--lamb-charcoal); margin-bottom: 40px; font-family: 'Outfit', sans-serif;">
                {{ number_format($coche->precio, 0, ',', '.') }} <span style="font-size: 1.2rem; vertical-align: middle; opacity: 0.6;">€</span>
            </div>

            <div style="border-top: 1px solid #eee; padding-top: 40px; margin-bottom: 50px;">
                <h3 style="font-family: 'Syne', sans-serif; font-size: 0.8rem; margin-bottom: 25px; letter-spacing: 2px; text-transform: uppercase;">Especificaciones Técnicas</h3>
                <ul style="list-style: none; padding: 0;">
                    @forelse($coche->especificaciones as $espec)
                        <li style="margin-bottom: 15px; border-left: 2px solid var(--lamb-gold); padding-left: 15px; position: relative;">
                            <strong style="display: block; font-size: 0.9rem; text-transform: uppercase;">{{ $espec->nombre }}</strong>
                            <span style="font-size: 0.8rem; color: #666;">{{ $espec->descripcion }}</span>
                            <div style="font-size: 0.6rem; color: #bbb; margin-top: 5px; text-transform: uppercase; letter-spacing: 1px;">Asociado el: {{ $espec->pivot->created_at->format('d/m/Y') }}</div>
                        </li>
                    @empty
                        <p style="font-size: 0.8rem; color: #999;">Este modelo no tiene especificaciones registradas.</p>
                    @endforelse
                </ul>
            </div>

            <div style="display: flex; gap: 20px; margin-top: 50px;">
                <a href="{{ route('coches.checkout', $coche->id) }}" class="btn-premium btn-fill" style="flex: 1; text-align: center; border: none; padding: 20px;">ADQUIRIR AHORA</a>
                <a href="{{ route('coches.index') }}" class="btn-premium btn-outline" style="padding: 20px 30px;">REGRESAR</a>
            </div>
        </div>
    </div>
</div>
@endsection
