@extends('layouts.master')

@section('title', 'Características Técnicas')

@section('content')
<div style="padding: 120px 0 80px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px;" data-animate>
        <h2 style="font-size: 2.5rem; font-family: 'Syne', sans-serif; text-transform: uppercase;">
            Especificaciones <span style="font-weight: 200;">Técnicas</span>
        </h2>
        @if(auth()->user()->rol === 'admin')
            <a href="{{ route('especificaciones.create') }}" class="btn-premium btn-fill">Nueva Característica</a>
        @endif
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 40px;" data-animate>
        @foreach($especificaciones as $espec)
            <div style="background: var(--lamb-grey-light); padding: 40px; border: 1px solid #eee; transition: all 0.3s;" onmouseover="this.style.borderColor='var(--lamb-gold)'; this.style.background='white'" onmouseout="this.style.borderColor='#eee'; this.style.background='var(--lamb-grey-light)'">
                <h3 style="font-family: 'Syne', sans-serif; text-transform: uppercase; margin-bottom: 20px; letter-spacing: 2px;">{{ $espec->nombre }}</h3>
                <p style="color: var(--lamb-grey-medium); font-family: 'Outfit', sans-serif; font-size: 0.95rem; line-height: 1.6; margin-bottom: 30px;">
                    {{ $espec->descripcion ?: 'Sin descripción detallada disponible actualmente para esta categoría técnica.' }}
                </p>
                
                @php
                    $modelosConSpec = \App\Models\Coche::whereHas('especificaciones', function($q) use ($espec) {
                        $q->where('especificaciones.id', $espec->id);
                    })->limit(3)->get();
                @endphp

                @if($modelosConSpec->count() > 0)
                    <div style="border-top: 1px solid #ddd; padding-top: 20px; margin-bottom: 25px;">
                        <div style="font-size: 0.6rem; color: #999; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px;">Integrado en:</div>
                        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                            @foreach($modelosConSpec as $m_coche)
                                <a href="{{ route('coches.show', $m_coche->id) }}" style="background: white; border: 1px solid #eee; padding: 5px 12px; font-size: 0.7rem; text-decoration: none; color: var(--lamb-charcoal); font-weight: 600;">
                                    {{ $m_coche->modelo }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
                
                @if(auth()->user()->rol === 'admin')
                    <div style="display: flex; gap: 20px; border-top: 1px solid #eee; padding-top: 25px;">
                        <a href="{{ route('especificaciones.edit', $espec->id) }}" style="color: var(--lamb-charcoal); text-decoration: none; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px;">EDITAR</a>
                        <a href="{{ route('especificaciones.delete', $espec->id) }}" 
                           style="color: #a00; text-decoration: none; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px;"
                           onclick="return confirm('¿Eliminar esta especificación?')">ELIMINAR</a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
