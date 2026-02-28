@extends('layouts.master')

@section('title', 'Nueva Especificación')

@section('content')
<div class="premium-form-container" data-animate>
    <h2 class="premium-form-title">Nueva <span style="font-weight: 200;">Especificación</span></h2>

    <form action="{{ route('especificaciones.save') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="premium-label">Título de la Característica</label>
            <input type="text" name="nombre" class="premium-input" placeholder="Ej: Velocidad Máxima, Tracción..." required>
        </div>

        <div class="form-group">
            <label class="premium-label">Descripción Detallada</label>
            <textarea name="descripcion" class="premium-input" rows="4" style="resize: vertical; min-height: 100px;" placeholder="Explique qué representa este valor técnico..."></textarea>
        </div>

        <div style="display: flex; gap: 20px; margin-top: 50px;">
            <button type="submit" class="btn-premium btn-fill">Crear Registro</button>
            <a href="{{ route('especificaciones.index') }}" class="btn-premium btn-outline">Volver</a>
        </div>
    </form>
</div>
@endsection