@extends('layouts.admin')

@section('title', 'Nueva Marca')

@section('topbar-actions')
    <a href="{{ route('admin.marcas.index') }}" class="btn-admin btn-admin-outline">
        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Volver a Marcas
    </a>
@endsection

@section('content')
<div class="admin-form-card">
    <div class="form-section-title">Información de la Marca</div>

    <form action="{{ route('admin.marcas.save') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-grid-2">
            <div class="form-group">
                <label class="form-label">Nombre de la Marca *</label>
                <input type="text" name="nombre" class="form-input" placeholder="Ej: Lamborghini, Ferrari..." value="{{ old('nombre') }}" required>
                @error('nombre') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label class="form-label">País de Origen</label>
                <input type="text" name="pais" class="form-input" placeholder="Ej: Italia, Alemania..." value="{{ old('pais') }}">
                @error('pais') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>



        <div class="form-group">
            <label class="form-label">Logo de la Marca</label>
            <input type="file" name="logo" class="form-file form-input" accept="image/*">
            @error('logo') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-admin btn-admin-primary">Crear Marca</button>
            <a href="{{ route('admin.marcas.index') }}" class="btn-admin btn-admin-outline">Cancelar</a>
        </div>
    </form>
</div>
@endsection
