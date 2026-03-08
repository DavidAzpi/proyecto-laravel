@extends('layouts.master')

@section('title', 'Añadir Vehículo')

@section('content')
<div class="premium-form-container" data-animate>
    <h2 class="premium-form-title">Nuevo <span style="font-weight: 200;">Vehículo</span></h2>

    <form action="{{ route('coches.save') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="premium-label">Denominación del Modelo</label>
            <input type="text" name="modelo" class="premium-input" placeholder="Ej: Revuelto V12, Urus SE..." required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
            <div class="form-group">
                <label class="premium-label">Precio de Venta (€)</label>
                <input type="number" name="precio" class="premium-input" placeholder="0.00" step="0.01" required>
            </div>

            <div class="form-group">
                <label class="premium-label">Marca Fabricante</label>
                <select name="marca_id" class="premium-input" required style="background: transparent; color: #111;">
                    <option value="" disabled selected>Seleccione una marca...</option>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group" style="margin-top: 30px;">
            <label class="premium-label">Especificaciones Disponibles</label>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px; margin-top: 15px;">
                @foreach($especificaciones as $espec)
                    <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; color: #444; font-size: 0.9rem;">
                        <input type="checkbox" name="especificaciones[]" value="{{ $espec->id }}">
                        {{ $espec->nombre }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="form-group" style="margin-top: 30px;">
            <label class="premium-label">Imagen del Vehículo (Subir archivo)</label>
            <input type="file" name="imagen" class="premium-input" style="border-bottom: none; font-size: 0.8rem; padding-top:10px;">
        </div>

        <div style="display: flex; gap: 20px; margin-top: 70px; border-top: 1px solid #eee; padding-top: 40px;">
            <button type="submit" class="btn-premium btn-fill" style="padding: 18px 45px;">Registrar Vehículo</button>
            <a href="/" class="btn-premium btn-outline" style="padding: 18px 45px;">Cancelar</a>
        </div>
    </form>
</div>
@endsection
