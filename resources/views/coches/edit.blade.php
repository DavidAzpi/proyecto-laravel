@extends('layouts.master')

@section('title', 'Editar Vehículo')

@section('content')
<div class="premium-form-container" data-animate>
    <h2 class="premium-form-title">Editar <span style="font-weight: 200;">{{ $coche->modelo }}</span></h2>

    @if ($errors->any())
        <div style="background: #ffebee; color: #c62828; padding: 20px; margin-bottom: 30px; border-left: 5px solid #ef5350;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('coches.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $coche->id }}">
        
        <div class="form-group">
            <label class="premium-label">Denominación del Modelo</label>
            <input type="text" name="modelo" class="premium-input" value="{{ old('modelo', $coche->modelo) }}" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
            <div class="form-group">
                <label class="premium-label">Precio de Venta (€)</label>
                <input type="number" name="precio" class="premium-input" step="0.01" value="{{ old('precio', $coche->precio) }}" required>
            </div>

            <div class="form-group">
                <label class="premium-label">Marca Fabricante</label>
                <select name="marca_id" class="premium-select" required>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}" {{ old('marca_id', $coche->marca_id) == $marca->id ? 'selected' : '' }}>
                            {{ $marca->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group" style="margin-top: 20px;">
            <label class="premium-label">Imagen Actual</label>
            <div style="margin-bottom: 20px; border: 1px solid #eee; padding: 10px; background: #fafafa; display: inline-block;">
                @if($coche->imagen)
                    <img src="{{ filter_var($coche->imagen, FILTER_VALIDATE_URL) ? $coche->imagen : asset('storage/' . $coche->imagen) }}" 
                        alt="Preview" style="max-height: 150px;">
                @else
                    <span style="font-size: 0.7rem; color: #999;">Sin imagen asignada</span>
                @endif
            </div>
            <label class="premium-label">Nueva Fotografía (Opcional)</label>
            <input type="file" name="imagen" class="premium-input" style="border-bottom: none; font-size: 0.8rem;">
        </div>

        <div class="specs-section" style="margin-top: 60px;">
            <label class="premium-label" style="font-size: 1rem; color: var(--lamb-black);">Características Técnicas</label>
            <div class="spec-grid">
                @foreach($especificaciones as $index => $espec)
                    @php
                        $relacion = $coche->especificaciones->where('id', $espec->id)->first();
                        $isChecked = $relacion ? 'checked' : '';
                        $valorExistente = $relacion ? $relacion->pivot->valor : '';
                    @endphp
                    <div class="spec-item" style="{{ $isChecked ? 'border: 1px solid var(--lamb-gold); background: white;' : '' }}">
                        <div class="spec-check">
                            <input type="checkbox" name="especificaciones[]" value="{{ $espec->id }}" 
                                id="spec_{{ $espec->id }}" {{ $isChecked }} style="accent-color: var(--lamb-gold); transform: scale(1.2);">
                            <label for="spec_{{ $espec->id }}">{{ $espec->nombre }}</label>
                        </div>
                        <input type="text" name="valores_especificacion[{{ $espec->id }}]" class="premium-input" 
                            style="font-size: 0.8rem; padding: 5px 0; margin-top: 10px;" 
                            placeholder="Valor..." value="{{ old('valores_especificacion.'.$espec->id, $valorExistente) }}">
                    </div>
                @endforeach
            </div>
        </div>

        <div style="display: flex; gap: 20px; margin-top: 70px; border-top: 1px solid #eee; padding-top: 40px;">
            <button type="submit" class="btn-premium btn-fill" style="padding: 18px 45px;">Guardar Cambios</button>
            <a href="{{ route('coches.index') }}" class="btn-premium btn-outline" style="padding: 18px 45px;">Cancelar</a>
        </div>
    </form>
</div>
@endsection