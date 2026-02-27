@extends('layouts.master')

@section('title', 'Características Técnicas')

@section('content')
<div style="padding: 120px 0 80px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px;">
        <h2 style="font-size: 2.5rem; font-family: 'Syne', sans-serif; text-transform: uppercase;">
            Especificaciones <span style="font-weight: 200;">Técnicas</span>
        </h2>
        <a href="{{ route('especificaciones.create') }}" class="btn-premium btn-fill">Nueva Característica</a>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px;">
        @foreach($especificaciones as $espec)
            <div style="background: var(--lamb-grey-light); padding: 30px; border: 1px solid #333;">
                <h3 style="font-family: 'Syne', sans-serif; text-transform: uppercase; margin-bottom: 15px;">{{ $espec->nombre }}</h3>
                <p style="color: var(--lamb-grey-medium); font-size: 0.9rem; margin-bottom: 25px;">{{ $espec->descripcion }}</p>
                
                <div style="display: flex; gap: 15px; border-top: 1px solid #333; padding-top: 20px;">
                    <a href="{{ route('especificaciones.edit', $espec->id) }}" style="color: white; text-decoration: none; font-size: 0.7rem; font-weight: 700;">EDITAR</a>
                    <a href="{{ route('especificaciones.delete', $espec->id) }}" 
                       style="color: #a00; text-decoration: none; font-size: 0.7rem; font-weight: 700;"
                       onclick="return confirm('¿Eliminar esta especificación?')">ELIMINAR</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
