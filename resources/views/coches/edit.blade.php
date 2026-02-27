@extends('layouts.master')

@section('title', 'Editar Vehículo')

@section('content')
    <div style="padding: 120px 0 80px;">
        <div
            style="max-width: 800px; margin: 0 auto; background: var(--lamb-grey-light); padding: 50px; border: 1px solid #333;">
            <h2 style="font-size: 2.5rem; margin-bottom: 40px; font-family: 'Syne', sans-serif; text-transform: uppercase;">
                Editar <span style="font-weight: 200;">Vehículo</span>
            </h2>

            <form action="{{ route('coches.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Campo oculto para el ID -->
                <input type="hidden" name="id" value="{{ $coche->id }}">

                <!-- Modelo -->
                <div class="form-group" style="margin-bottom: 30px;">
                    <label
                        style="display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; color: var(--lamb-grey-medium); margin-bottom: 10px;">Modelo
                        del Coche</label>
                    <input type="text" name="modelo" value="{{ $coche->modelo }}" required
                        style="width: 100%; background: transparent; border: 1px solid #444; color: white; padding: 15px; font-family: inherit;">
                </div>

                <!-- Marca (1:N) -->
                <div class="form-group" style="margin-bottom: 30px;">
                    <label
                        style="display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; color: var(--lamb-grey-medium); margin-bottom: 10px;">Fabricante</label>
                    <select name="marca_id" required
                        style="width: 100%; background: var(--lamb-charcoal); border: 1px solid #444; color: white; padding: 15px; font-family: inherit;">
                        @foreach($marcas as $marca)
                            <option value="{{ $marca->id }}" {{ $coche->marca_id == $marca->id ? 'selected' : '' }}>
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
                    <input type="number" name="precio" value="{{ $coche->precio }}" required min="0"
                        style="width: 100%; background: transparent; border: 1px solid #444; color: white; padding: 15px; font-family: inherit;">
                </div>

                <!-- Imagen Actual -->
                <div class="form-group" style="margin-bottom: 30px;">
                    <label
                        style="display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; color: var(--lamb-grey-medium); margin-bottom: 10px;">Imagen
                        del Vehículo</label>

                    @if($coche->imagen)
                        <div style="margin-bottom: 15px; padding: 10px; background: #1a1a1a; width: fit-content;">
                            @if(filter_var($coche->imagen, FILTER_VALIDATE_URL))
                                <img src="{{ $coche->imagen }}" style="max-height: 100px;">
                            @else
                                <img src="{{ asset('storage/' . $coche->imagen) }}" style="max-height: 100px;">
                            @endif
                            <p style="font-size: 0.6rem; color: #666; text-align: center; margin-top: 5px;">Imagen actual</p>
                        </div>
                    @endif

                    <input type="file" name="imagen" accept="image/*"
                        style="width: 100%; background: transparent; border: 1px solid #444; color: white; padding: 15px; font-family: inherit;">
                </div>

                <!-- Especificaciones (N:N con tabla pivote) -->
                <div class="form-group" style="margin-bottom: 40px;">
                    <label
                        style="display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; color: var(--lamb-grey-medium); margin-bottom: 20px; border-bottom: 1px solid #333; padding-bottom: 10px;">Especificaciones
                        Técnicas</label>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        @foreach($especificaciones as $espec)
                            @php
                                $pivotData = $coche->especificaciones->where('id', $espec->id)->first();
                                $checked = $pivotData ? 'checked' : '';
                                $valor = $pivotData ? $pivotData->pivot->valor : '';
                            @endphp
                            <div style="padding: 15px; background: #1a1a1a; display: flex; flex-direction: column; gap: 10px;">
                                <label
                                    style="display: flex; align-items: center; gap: 10px; font-size: 0.8rem; cursor: pointer;">
                                    <input type="checkbox" name="especificaciones[]" value="{{ $espec->id }}" {{ $checked }}>
                                    {{ $espec->nombre }}
                                </label>
                                <input type="text" name="valores_especificacion[]" value="{{ $valor }}"
                                    placeholder="Valor técnico..."
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
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection