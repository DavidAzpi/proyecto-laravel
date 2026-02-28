@extends('layouts.master')

@section('title', 'Añadir Vehículo')

@section('content')
<div class="premium-form-container" data-animate>
    <h2 class="premium-form-title">Nuevo <span style="font-weight: 200;">Vehículo</span></h2>

    @if ($errors->any())
        <div style="background: #ffebee; color: #c62828; padding: 20px; margin-bottom: 30px; border-left: 5px solid #ef5350;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('coches.save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label class="premium-label">Denominación del Modelo</label>
            <input type="text" name="modelo" class="premium-input" placeholder="Ej: Revuelto V12, Urus SE..." value="{{ old('modelo') }}" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
            <div class="form-group">
                <label class="premium-label">Precio de Venta (€)</label>
                <input type="number" name="precio" class="premium-input" placeholder="0.00" step="0.01" value="{{ old('precio') }}" required>
            </div>

            <div class="form-group">
                <label class="premium-label">Marca Fabricante</label>
                <select name="marca_id" class="premium-select" required>
                    <option value="" disabled selected>Seleccione una marca...</option>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
                            {{ $marca->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group" style="margin-top: 20px;">
            <label class="premium-label">Fotografía de Exhibición</label>
            <input type="file" name="imagen" class="premium-input" style="border-bottom: none; font-size: 0.8rem;">
            <p style="font-size: 0.7rem; color: #999; margin-top: 5px;">Recomendado: Fondo neutro, 16:9. Formatos: JPG, PNG.</p>
        </div>

        <div class="specs-section" style="margin-top: 60px;">
            <label class="premium-label" style="font-size: 1rem; color: var(--lamb-black);">Características Técnicas</label>
            <p style="font-size: 0.8rem; color: #666; margin-bottom: 30px;">Seleccione las especificaciones disponibles e indique su valor correspondiente.</p>
            
            <div class="spec-grid">
                @foreach($especificaciones as $index => $espec)
                    <div class="spec-item">
                        <div class="spec-check">
                            <input type="checkbox" name="especificaciones[]" value="{{ $espec->id }}" 
                                id="spec_{{ $espec->id }}" style="accent-color: var(--lamb-gold); transform: scale(1.2);">
                            <label for="spec_{{ $espec->id }}">{{ $espec->nombre }}</label>
                        </div>
                        <input type="text" name="valores_especificacion[{{ $espec->id }}]" class="premium-input" 
                            style="font-size: 0.8rem; padding: 5px 0; margin-top: 10px;" 
                            placeholder="Valor (ej: 450 CV, 2.5L...)">
                    </div>
                @endforeach
            </div>
        </div>

        <div style="display: flex; gap: 20px; margin-top: 70px; border-top: 1px solid #eee; padding-top: 40px;">
            <button type="submit" class="btn-premium btn-fill" style="padding: 18px 45px;">Registrar Vehículo</button>
            <a href="{{ route('coches.index') }}" class="btn-premium btn-outline" style="padding: 18px 45px;">Cancelar</a>
        </div>
    </form>
</div>
@endsection