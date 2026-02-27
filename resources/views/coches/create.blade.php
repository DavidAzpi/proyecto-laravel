@extends('layouts.master')

@section('title', 'Añadir Vehículo')

@section('content')
    <div style="padding: 120px 0 80px;">
        <div
            style="max-width: 800px; margin: 0 auto; background: var(--lamb-grey-light); padding: 50px; border: 1px solid #333;">
            <h2 style="font-size: 2.5rem; margin-bottom: 40px; font-family: 'Syne', sans-serif; text-transform: uppercase;">
                Nuevo <span style="font-weight: 200;">Vehículo</span>
            </h2>

            @if($errors->any())
                <div
                    style="background: #ffebee; color: #c62828; padding: 20px; margin-bottom: 30px; border-left: 5px solid #ef5350;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('coches.save') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Modelo -->
                <div class="form-group" style="margin-bottom: 30px;">
                    <label
                        style="display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; color: var(--lamb-grey-medium); margin-bottom: 10px;">Modelo
                        del Coche</label>
                    <input type="text" name="modelo" value="{{ old('modelo') }}" required
                        style="width: 100%; background: transparent; border: 1px solid #444; color: white; padding: 15px; font-family: inherit;">
                </div>

                <!-- Marca (1:N) -->
                <div class="form-group" style="margin-bottom: 30px;">
                    <label
                        style="display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; color: var(--lamb-grey-medium); margin-bottom: 10px;">Fabricante</label>
                    <select name="marca_id" required
                        style="width: 100%; background: var(--lamb-charcoal); border: 1px solid #444; color: white; padding: 15px; font-family: inherit;">
                        <option value="">Selecciona una marca...</option>
                        @foreach($marcas as $marca)
                            <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
                                {{ $marca->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Precio -->
                <div class="form-group" style="margin-bottom: 30px;">
                    <label
                        style="display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; color: var(--lamb-grey-medium); margin-bottom: 10px;">Precio
                        (€)</label>
                    <input type="number" name="precio" value="{{ old('precio') }}" required min="0"
                        style="width: 100%; background: transparent; border: 1px solid #444; color: white; padding: 15px; font-family: inherit;">
                </div>

                <!-- Imagen (Gestión de imágenes) -->
                <div class="form-group" style="margin-bottom: 30px;">
                    <label
                        style="display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; color: var(--lamb-grey-medium); margin-bottom: 10px;">Imagen
                        del Vehículo</label>
                    <input type="file" name="imagen" accept="image/*"
                        style="width: 100%; background: transparent; border: 1px solid #444; color: white; padding: 15px; font-family: inherit;">
                </div>

                <!-- Especificaciones (N:N con tabla pivote) -->
                <div class="form-group" style="margin-bottom: 40px;">
                    <label
                        style="display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; color: var(--lamb-grey-medium); margin-bottom: 20px; border-bottom: 1px solid #333; padding-bottom: 10px;">Especificaciones
                        Técnicas</label>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        @foreach($especificaciones as $indice => $espec)
                            <div style="padding: 15px; background: #1a1a1a; display: flex; flex-direction: column; gap: 10px;">
                                <label
                                    style="display: flex; align-items: center; gap: 10px; font-size: 0.8rem; cursor: pointer;">
                                    <input type="checkbox" name="especificaciones[]" value="{{ $espec->id }}">
                                    {{ $espec->nombre }}
                                </label>
                                <input type="text" name="valores_especificacion[]" placeholder="Valor (ej: V12, 700CV...)"
                                    style="width: 100%; background: #222; border: 1px solid #444; color: white; padding: 10px; font-size: 0.75rem;">
                            </div>
                        @endforeach
                    </div>
                </div>

                <div style="display: flex; gap: 20px; justify-content: flex-end; margin-top: 50px;">
                    <a href="{{ route('coches.index') }}" class="btn-premium btn-text"
                        style="padding: 15px 30px;">Cancelar</a>
                    <button type="submit" class="btn-premium btn-fill"
                        style="padding: 15px 50px; cursor: pointer; border: none;">
                        Registrar Vehículo
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection