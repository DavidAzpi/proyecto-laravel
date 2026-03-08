@extends('layouts.admin')

@section('title', 'Nueva Especificación')

@section('topbar-actions')
    <a href="{{ route('admin.especificaciones.index') }}" class="btn-admin btn-admin-outline">
        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Volver
    </a>
@endsection

@section('content')
<div class="admin-form-card">
    <div class="form-section-title">Nueva Especificación Técnica</div>

    <form action="{{ route('admin.especificaciones.save') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label">Nombre *</label>
            <input type="text" name="nombre" class="form-input" placeholder="Ej: Motor V12, Tracción total, Frenos cerámicos..." value="{{ old('nombre') }}" required>
            @error('nombre') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-textarea" placeholder="Descripción detallada de la especificación...">{{ old('descripcion') }}</textarea>
            @error('descripcion') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-admin btn-admin-primary">Crear Especificación</button>
            <a href="{{ route('admin.especificaciones.index') }}" class="btn-admin btn-admin-outline">Cancelar</a>
        </div>
    </form>
</div>
@endsection
