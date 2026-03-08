@extends('layouts.admin')

@section('title', 'Editar Marca')

@section('topbar-actions')
    <a href="{{ route('admin.marcas.index') }}" class="btn-admin btn-admin-outline">
        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Volver a Marcas
    </a>
@endsection

@section('content')
<div class="admin-form-card">
    <div class="form-section-title">Editar: {{ $marca->nombre }}</div>

    <form action="{{ route('admin.marcas.update', $marca->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if($marca->logo)
        <div class="form-group">
            <label class="form-label">Logo Actual</label>
            <img src="{{ asset('storage/' . $marca->logo) }}" style="height:40px; filter:grayscale(1); display:block; margin-bottom:8px;">
        </div>
        @endif

        <div class="form-grid-2">
            <div class="form-group">
                <label class="form-label">Nombre de la Marca *</label>
                <input type="text" name="nombre" class="form-input" value="{{ old('nombre', $marca->nombre) }}" required>
                @error('nombre') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label class="form-label">País de Origen</label>
                <input type="text" name="pais" class="form-input" value="{{ old('pais', $marca->pais) }}">
            </div>
        </div>



        <div class="form-group">
            <label class="form-label">Nuevo Logo (Opcional)</label>
            <input type="file" name="logo" class="form-file form-input" accept="image/*">
            @error('logo') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        {{-- Relación: vehículos de esta marca --}}
        @if($marca->coches->count() > 0)
        <div class="form-group" style="margin-top:8px;">
            <label class="form-label">Vehículos de esta Marca (relación 1:N)</label>
            <div style="padding:14px; background:var(--admin-bg); border-radius:6px; border:1px solid var(--admin-border);">
                <div style="display:flex; flex-wrap:wrap; gap:6px;">
                    @foreach($marca->coches as $coche)
                        <a href="{{ route('admin.coches.edit', $coche->id) }}" class="relation-tag" style="text-decoration:none; color:var(--admin-text-light);">
                            {{ $coche->modelo }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <div class="form-actions">
            <button type="submit" class="btn-admin btn-admin-primary">Guardar Cambios</button>
            <a href="{{ route('admin.marcas.index') }}" class="btn-admin btn-admin-outline">Cancelar</a>
        </div>
    </form>
</div>
@endsection
