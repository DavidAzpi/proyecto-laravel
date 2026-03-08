@extends('layouts.master')

@section('title', 'Editar Especificación')

@section('content')
<div class="premium-form-container" data-animate>
    <h2 class="premium-form-title">Editar <span style="font-weight: 200;">Especificación</span></h2>

    <form action="{{ route('especificaciones.update', $especificacion->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="premium-label">Título de la Característica</label>
            <input type="text" name="nombre" class="premium-input" value="{{ $especificacion->nombre }}" required>
        </div>

        <div class="form-group">
            <label class="premium-label">Descripción Detallada</label>
            <textarea name="descripcion" class="premium-input" rows="4" style="resize: vertical; min-height: 100px;">{{ $especificacion->descripcion }}</textarea>
        </div>

        <div style="display: flex; gap: 20px; margin-top: 50px;">
            <button type="submit" class="btn-premium btn-fill">Guardar Cambios</button>
            <a href="/especificaciones" class="btn-premium btn-outline">Cancelar</a>
        </div>
    </form>
</div>
@endsection
