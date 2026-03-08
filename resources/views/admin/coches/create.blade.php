@extends('layouts.admin')

@section('title', 'Nuevo Vehículo')

@section('topbar-actions')
    <a href="{{ route('admin.coches.index') }}" class="btn-admin btn-admin-outline">
        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Volver a Vehículos
    </a>
@endsection

@section('content')
<div class="admin-form-card">
    <div class="form-section-title">Información del Vehículo</div>

    <form action="{{ route('admin.coches.save') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="form-label">Denominación del Modelo *</label>
            <input type="text" name="modelo" class="form-input" placeholder="Ej: Revuelto V12, Urus SE..." value="{{ old('modelo') }}" required>
            @error('modelo') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-grid-2">
            <div class="form-group">
                <label class="form-label">Precio de Venta (€) *</label>
                <input type="number" name="precio" class="form-input" placeholder="300000" step="0.01" value="{{ old('precio') }}" required>
                @error('precio') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Marca Fabricante *</label>
                <select name="marca_id" class="form-select" required>
                    <option value="" disabled selected>Seleccione una marca...</option>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
                            {{ $marca->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('marca_id') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Imagen del Vehículo</label>
            <input type="file" name="imagen" class="form-file form-input" accept="image/*">
            @error('imagen') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Especificaciones (Tabla Pivot N:N)</label>
            <div class="spec-check-grid">
                @foreach($especificaciones as $espec)
                    <label class="spec-check-item">
                        <input type="checkbox" name="especificaciones[]" value="{{ $espec->id }}"
                               {{ in_array($espec->id, old('especificaciones', [])) ? 'checked' : '' }}>
                        {{ $espec->nombre }}
                    </label>
                @endforeach
            </div>
            <div class="pivot-info" style="margin-top:8px;">Se guardan en la tabla pivote <strong>coche_especificacion</strong></div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-admin btn-admin-primary">Registrar Vehículo</button>
            <a href="{{ route('admin.coches.index') }}" class="btn-admin btn-admin-outline">Cancelar</a>
        </div>
    </form>
</div>
@endsection
