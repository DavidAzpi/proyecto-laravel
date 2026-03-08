@extends('layouts.admin')

@section('title', 'Especificaciones')

@section('topbar-actions')
    <a href="{{ route('admin.especificaciones.create') }}" class="btn-admin btn-admin-primary">
        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Nueva Especificación
    </a>
@endsection

@section('content')

<div class="admin-card">
    <div class="admin-card-header">
        <span class="admin-card-title">Listado de Especificaciones</span>
        <span style="font-size:0.78rem; color:var(--admin-text-muted);">{{ $especificaciones->count() }} registros</span>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Vehículos que la usan</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($especificaciones as $espec)
            <tr>
                <td style="font-weight:500;">{{ $espec->nombre }}</td>
                <td style="font-size:0.82rem; color:var(--admin-text-muted); max-width:280px;">
                    {{ $espec->descripcion ?: '—' }}
                </td>
                <td>
                    <div class="relation-tags">
                        @forelse($espec->coches as $coche)
                            <span class="relation-tag" title="Pivot: coche_id={{ $coche->id }}">{{ $coche->modelo }}</span>
                        @empty
                            <span style="font-size:0.75rem; color:var(--admin-text-muted);">Sin asignar</span>
                        @endforelse
                    </div>
                    @if($espec->coches->count() > 0)
                        <div class="pivot-info">Tabla pivot: coche_especificacion ({{ $espec->coches->count() }} entradas)</div>
                    @endif
                </td>
                <td>
                    <div style="display:flex; gap:6px; align-items:center;">
                        <a href="{{ route('admin.especificaciones.edit', $espec->id) }}" class="btn-admin btn-admin-outline" style="padding:5px 10px; font-size:0.72rem;">Editar</a>
                        <form action="{{ route('admin.especificaciones.delete', $espec->id) }}" method="POST" onsubmit="return confirm('¿Eliminar la especificación {{ $espec->nombre }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-admin btn-admin-danger" style="padding:5px 10px; font-size:0.72rem;">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="admin-empty">
                        <p>No hay especificaciones registradas.</p>
                        <a href="{{ route('admin.especificaciones.create') }}" class="btn-admin btn-admin-primary">Añadir primera</a>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="admin-pagination">
        {{ $especificaciones->links() }}
    </div>
</div>

@endsection
