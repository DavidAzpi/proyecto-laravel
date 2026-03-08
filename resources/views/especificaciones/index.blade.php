@extends('layouts.master')

@section('title', 'Características Técnicas')

@section('content')
    <div style="padding: 120px 0 80px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px;" data-animate>
            <h2 style="font-size: 2.5rem; font-family: 'Syne', sans-serif; text-transform: uppercase; color: #111;">
                Especificaciones <span style="font-weight: 200;">Técnicas</span>
            </h2>
            @if(auth()->check() && auth()->user()->isAdmin())
                <a href="{{ route('admin.especificaciones.create') }}" class="btn-premium btn-fill">Nueva Especificación</a>
            @endif
        </div>

        @if(session('success'))
            <div style="background: #f0faf4; color: #2e7d32; padding: 14px 18px; margin-bottom: 28px; border: 1px solid #c6e8d2; font-size: 0.85rem; border-radius: 6px;">
                {{ session('success') }}
            </div>
        @endif

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 20px;">
            @forelse($especificaciones as $espec)
                <div style="background: #ffffff; border: 1px solid #ebebeb; padding: 28px; border-radius: 10px; transition: all 0.3s ease;" data-animate
                     onmouseover="this.style.borderColor='#ccc'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.06)'"
                     onmouseout="this.style.borderColor='#ebebeb'; this.style.boxShadow='none'">
                    <h3 style="font-family: 'Syne', sans-serif; font-size: 1rem; text-transform: uppercase; margin-bottom: 12px; color: #111; letter-spacing: 2px; font-weight: 500;">{{ $espec->nombre }}</h3>
                    <p style="color: #888; font-size: 0.85rem; margin-bottom: 24px; line-height: 1.7; font-weight: 300;">{{ $espec->descripcion ?? 'Sin descripción disponible.' }}</p>

                    @if(auth()->check() && auth()->user()->isAdmin())
                    <div style="display: flex; gap: 16px; border-top: 1px solid #f0f0f0; padding-top: 18px;">
                        <a href="{{ route('admin.especificaciones.edit', $espec->id) }}" style="color: #555; text-decoration: none; font-size: 0.68rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 500;">Editar</a>
                        <form action="{{ route('admin.especificaciones.delete', $espec->id) }}" method="POST" onsubmit="return confirm('¿Eliminar esta especificación?')" style="margin:0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #e53e3e; cursor: pointer; font-size: 0.68rem; text-transform: uppercase; letter-spacing: 1px; padding: 0; font-family: inherit; font-weight: 500;">Eliminar</button>
                        </form>
                    </div>
                    @endif
                </div>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 80px 0; color: #aaa;">
                    <p style="font-size: 1rem;">No hay especificaciones registradas.</p>
                </div>
            @endforelse
        </div>

        <div style="margin-top: 50px; display: flex; justify-content: center;">
            {{ $especificaciones->links() }}
        </div>
    </div>
@endsection
