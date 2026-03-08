@extends('layouts.admin')

@section('title', 'Editar Especificación')

@section('topbar-actions')
    <a href="{{ route('admin.especificaciones.index') }}" class="btn-admin btn-admin-outline">
        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Volver
    </a>
@endsection

@section('content')
<div class="admin-form-card">
    <div class="form-section-title">Editar: {{ $especificacion->nombre }}</div>

    <form action="{{ route('admin.especificaciones.update', $especificacion->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Nombre *</label>
            <input type="text" name="nombre" class="form-input" value="{{ old('nombre', $especificacion->nombre) }}" required>
            @error('nombre') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-textarea">{{ old('descripcion', $especificacion->descripcion) }}</textarea>
            @error('descripcion') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        {{-- Relaciones N:N --}}
        @if($especificacion->coches->count() > 0)
        <div class="form-group">
            <label class="form-label">Vehículos con esta especificación (Tabla Pivot N:N)</label>
            <div style="padding:14px; background:var(--admin-bg); border-radius:6px; border:1px solid var(--admin-border);">
                <table style="width:100%; font-size:0.8rem; border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th style="text-align:left; padding:4px 8px; color:var(--admin-text-muted); font-size:0.65rem; letter-spacing:1px; text-transform:uppercase; font-weight:600;">Vehículo</th>
                            <th style="text-align:left; padding:4px 8px; color:var(--admin-text-muted); font-size:0.65rem; letter-spacing:1px; text-transform:uppercase; font-weight:600;">Marca</th>
                            <th style="text-align:left; padding:4px 8px; color:var(--admin-text-muted); font-size:0.65rem; letter-spacing:1px; text-transform:uppercase; font-weight:600;">Asignado en</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($especificacion->coches as $coche)
                        <tr>
                            <td style="padding:6px 8px; font-weight:500;">{{ $coche->modelo }}</td>
                            <td style="padding:6px 8px; color:var(--admin-text-muted);">{{ $coche->marca->nombre }}</td>
                            <td style="padding:6px 8px; color:var(--admin-text-muted);">{{ $coche->pivot->created_at?->format('d/m/Y') ?? '—' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pivot-info" style="margin-top:8px; padding:0 8px;">Datos de la tabla pivote: <strong>coche_especificacion</strong></div>
            </div>
        </div>
        @endif

        <div class="form-actions">
            <button type="submit" class="btn-admin btn-admin-primary">Guardar Cambios</button>
            <a href="{{ route('admin.especificaciones.index') }}" class="btn-admin btn-admin-outline">Cancelar</a>
        </div>
    </form>
</div>
@endsection
