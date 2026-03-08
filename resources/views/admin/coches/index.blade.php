@extends('layouts.admin')

@section('title', 'Vehículos')

@section('topbar-actions')
    <a href="{{ route('admin.coches.create') }}" class="btn-admin btn-admin-primary">
        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Nuevo Vehículo
    </a>
@endsection

@section('content')

<div class="admin-card">
    <div class="admin-card-header">
        <span class="admin-card-title">Listado de Vehículos</span>
        <span style="font-size:0.78rem; color:var(--admin-text-muted);">{{ $coches->count() }} registros</span>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Precio</th>
                <th>Especificaciones</th>
                <th>Creado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($coches as $coche)
            <tr>
                <td>
                    @if($coche->imagen)
                        <img src="{{ asset('storage/' . $coche->imagen) }}" alt="{{ $coche->modelo }}" style="width:60px; height:38px; object-fit:cover; border-radius:4px; border:1px solid var(--admin-border);">
                    @else
                        <div style="width:60px; height:38px; background:var(--admin-bg); border-radius:4px; border:1px solid var(--admin-border); display:flex; align-items:center; justify-content:center;">
                            <svg width="16" height="16" fill="none" stroke="#ccc" stroke-width="1.5" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                        </div>
                    @endif
                </td>
                <td style="font-weight:500;">{{ $coche->modelo }}</td>
                <td>
                    <span class="badge badge-light">{{ $coche->marca->nombre }}</span>
                </td>
                <td style="font-weight:500;">{{ number_format($coche->precio, 0, ',', '.') }} €</td>
                <td>
                    <div class="relation-tags">
                        @forelse($coche->especificaciones as $espec)
                            <span class="relation-tag" title="Añadido: {{ $espec->pivot->created_at?->format('d/m/Y') ?? '—' }}">{{ $espec->nombre }}</span>
                        @empty
                            <span style="font-size:0.75rem; color:var(--admin-text-muted);">—</span>
                        @endforelse
                    </div>
                    @if($coche->especificaciones->count() > 0)
                    <div class="pivot-info">Tabla pivot: coche_especificacion</div>
                    @endif
                </td>
                <td style="font-size:0.78rem; color:var(--admin-text-muted);">{{ $coche->created_at->format('d/m/Y') }}</td>
                <td>
                    <div style="display:flex; gap:6px; align-items:center;">
                        <a href="{{ route('admin.coches.edit', $coche->id) }}" class="btn-admin btn-admin-outline" style="padding:5px 10px; font-size:0.72rem;">Editar</a>
                        <form action="{{ route('admin.coches.delete', $coche->id) }}" method="POST" onsubmit="return confirm('¿Eliminar {{ $coche->modelo }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-admin btn-admin-danger" style="padding:5px 10px; font-size:0.72rem;">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">
                    <div class="admin-empty">
                        <p>No hay vehículos registrados.</p>
                        <a href="{{ route('admin.coches.create') }}" class="btn-admin btn-admin-primary">Añadir primero</a>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="admin-pagination">
        {{ $coches->links() }}
    </div>
</div>

@endsection
