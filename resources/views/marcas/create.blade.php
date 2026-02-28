@extends('layouts.master')

@section('title', 'Añadir Marca')

@section('content')
<div class="premium-form-container" data-animate>
    <h2 class="premium-form-title">Nueva <span style="font-weight: 200;">Marca</span></h2>

    <form action="{{ route('marcas.save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label class="premium-label">Nombre de la Marca</label>
            <input type="text" name="nombre" class="premium-input" placeholder="Ej: Lamborghini, Ferrari..." required>
        </div>

        <div class="form-group">
            <label class="premium-label">País de Origen</label>
            <input type="text" name="pais" class="premium-input" placeholder="Ej: Italia, Alemania..." required>
        </div>

        <div class="form-group">
            <label class="premium-label">Logo de la Marca</label>
            <input type="file" name="logo" class="premium-input" style="border-bottom: none; font-size: 0.8rem;">
            <p style="font-size: 0.7rem; color: #999; margin-top: 5px;">Formatos admitidos: JPG, PNG. Máx 2MB.</p>
        </div>

        <div style="display: flex; gap: 20px; margin-top: 50px;">
            <button type="submit" class="btn-premium btn-fill">Guardar Marca</button>
            <a href="{{ route('marcas.index') }}" class="btn-premium btn-outline">Cancelar</a>
        </div>
    </form>
</div>
@endsection