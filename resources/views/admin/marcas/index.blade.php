@extends('layouts.admin')

@section('title', 'Marcas')

@section('topbar-actions')
    <a href="{{ route('admin.marcas.create') }}" class="btn-admin btn-admin-primary">
        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Nueva Marca
    </a>
@endsection

@section('content')

<div class="admin-card">
    <div class="admin-card-header">
        <span class="admin-card-title">Listado de Marcas</span>
        <span style="font-size:0.78rem; color:var(--admin-text-muted);">{{ $marcas->count() }} registros</span>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Nombre</th>
                <th>País</th>
                <th>Slogan</th>
                <th>Modelos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($marcas as $marca)
            <tr>
                <td>
                    @if($marca->logo)
                        <img src="{{ asset('storage/' . $marca->logo) }}" alt="{{ $marca->nombre }}" style="height:50px; max-width:100px; object-fit:contain;">
                    @else
                        <div style="width:40px; height:30px; background:var(--admin-bg); border-radius:4px; border:1px solid var(--admin-border);"></div>
                    @endif
                </td>
                <td style="font-weight:500;">{{ $marca->nombre }}</td>
                <td style="color:var(--admin-text-muted);">{{ $marca->pais ?: '—' }}</td>
                <td style="font-size:0.78rem; color:var(--admin-text-muted); font-style:italic;">{{ $marca->slogan ? '"'.$marca->slogan.'"' : '—' }}</td>
                <td>
                    <span class="badge badge-light">{{ $marca->coches_count }} modelos</span>
                </td>
                <td>
                    <div style="display:flex; gap:6px; align-items:center;">
                        <a href="{{ route('admin.marcas.edit', $marca->id) }}" class="btn-admin btn-admin-outline" style="padding:5px 10px; font-size:0.72rem;">Editar</a>
                        <form action="{{ route('admin.marcas.delete', $marca->id) }}" method="POST" onsubmit="return confirm('¿Eliminar la marca {{ $marca->nombre }}? Se perderán sus relaciones.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-admin btn-admin-danger" style="padding:5px 10px; font-size:0.72rem;">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">
                    <div class="admin-empty">
                        <p>No hay marcas registradas.</p>
                        <a href="{{ route('admin.marcas.create') }}" class="btn-admin btn-admin-primary">Añadir primera marca</a>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="admin-pagination">
        {{ $marcas->links() }}
    </div>
</div>

@endsection
