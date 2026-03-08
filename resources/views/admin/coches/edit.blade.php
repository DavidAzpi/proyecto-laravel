@extends('layouts.admin')

@section('title', 'Editar Vehículo')

@section('topbar-actions')
    <a href="{{ route('admin.coches.index') }}" class="btn-admin btn-admin-outline">
        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Volver a Vehículos
    </a>
@endsection

@section('content')
<div class="admin-form-card">
    <div class="form-section-title">Editar: {{ $coche->modelo }}</div>

    <form action="{{ route('admin.coches.update', $coche->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if($coche->imagen)
        <div class="form-group">
            <label class="form-label">Imagen Actual</label>
            <img src="{{ asset('storage/' . $coche->imagen) }}" class="img-preview" alt="{{ $coche->modelo }}">
        </div>
        @endif

        <div class="form-group">
            <label class="form-label">Denominación del Modelo *</label>
            <input type="text" name="modelo" class="form-input" value="{{ old('modelo', $coche->modelo) }}" required>
            @error('modelo') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-grid-2">
            <div class="form-group">
                <label class="form-label">Precio de Venta (€) *</label>
                <input type="number" name="precio" class="form-input" value="{{ old('precio', $coche->precio) }}" step="0.01" required>
                @error('precio') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Marca Fabricante *</label>
                <select name="marca_id" class="form-select" required>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}" {{ $coche->marca_id == $marca->id ? 'selected' : '' }}>
                            {{ $marca->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('marca_id') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Nueva Imagen (Opcional)</label>
            <input type="file" name="imagen" class="form-file form-input" accept="image/*">
            @error('imagen') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Especificaciones (Tabla Pivot N:N — coche_especificacion)</label>
            <div class="spec-check-grid">
                @foreach($especificaciones as $espec)
                    <label class="spec-check-item">
                        <input type="checkbox" name="especificaciones[]" value="{{ $espec->id }}"
                               {{ $coche->especificaciones->contains($espec->id) ? 'checked' : '' }}>
                        {{ $espec->nombre }}
                        @if($coche->especificaciones->contains($espec->id))
                            @php $pivot = $coche->especificaciones->find($espec->id)?->pivot; @endphp
                            @if($pivot && $pivot->created_at)
                                <span style="font-size:0.6rem; color:var(--admin-text-muted); margin-left:4px;">({{ $pivot->created_at->format('d/m/y') }})</span>
                            @endif
                        @endif
                    </label>
                @endforeach
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-admin btn-admin-primary">Guardar Cambios</button>
            <a href="{{ route('admin.coches.index') }}" class="btn-admin btn-admin-outline">Cancelar</a>
        </div>
    </form>
</div>
@endsection
