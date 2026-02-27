@extends('layouts.master')

@section('title', 'Añadir Coche')

@section('content')
    <div class="premium-form-container" data-animate>
        <h2 class="premium-form-title">Añadir Vehículo</h2>

        @if ($errors->any())
            <div
                style="background: #ffebee; color: #c62828; padding: 20px; border-radius: 4px; border-left: 5px solid #d32f2f; margin-bottom: 30px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('coches.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="marca_id" class="premium-label">Marca del Fabricante</label>
                <select class="premium-select" id="marca_id" name="marca_id" required>
                    <option value="">Seleccione marca...</option>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
                            {{ $marca->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="modelo" class="premium-label">Modelo</label>
                <input type="text" class="premium-input" id="modelo" name="modelo" value="{{ old('modelo') }}"
                    placeholder="Nombre del modelo" required>
            </div>

            <div class="form-group">
                <label for="precio" class="premium-label">Precio (€)</label>
                <input type="number" class="premium-input" id="precio" name="precio" value="{{ old('precio') }}"
                    placeholder="0.00" required step="0.01">
            </div>

            <div class="form-group">
                <label for="imagen" class="premium-label">Fotografía del Vehículo</label>
                <input type="file" class="premium-input" id="imagen" name="imagen" accept="image/*" style="border: none;">
            </div>

            <div class="form-group" style="margin-top: 50px;">
                <label class="premium-label">Especificaciones Técnicas</label>
                <div class="spec-grid">
                    @foreach($especificaciones as $index => $spec)
                        <div class="spec-item">
                            <div class="spec-check">
                                <input type="checkbox" name="specs[]" value="{{ $spec->id }}" id="spec_{{ $spec->id }}">
                                <label for="spec_{{ $spec->id }}">{{ $spec->nombre }}</label>
                            </div>
                            <input type="text" class="premium-input" name="spec_valor[]"
                                style="font-size: 0.8rem; padding: 10px 0;" placeholder="Valor">
                        </div>
                    @endforeach
                </div>
            </div>

            <div style="display: flex; gap: 20px; margin-top: 60px;">
                <button type="submit" class="btn-premium btn-fill" style="flex: 1; border: none; cursor: pointer;">Guardar
                    Vehículo</button>
                <a href="{{ route('coches.index') }}" class="btn-premium btn-text"
                    style="flex: 1; text-align: center;">Cancelar</a>
            </div>
        </form>
    </div>
@endsection