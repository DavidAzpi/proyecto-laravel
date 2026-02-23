@extends('layouts.master')

@section('title', 'Añadir Coche')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-danger text-white">
                    <h3 class="mb-0">Añadir Nuevo Coche Deportivo</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('coches.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="marca_id" class="form-label">Marca</label>
                            <select class="form-select" id="marca_id" name="marca_id" required>
                                <option value="">Selecciona una marca...</option>
                                @foreach($marcas as $marca)
                                    <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
                                        {{ $marca->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="modelo" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" value="{{ old('modelo') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio (€)</label>
                            <input type="number" class="form-control" id="precio" name="precio" value="{{ old('precio') }}"
                                required step="0.01">
                        </div>

                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                        </div>

                        <div class="mb-4">
                            <h5>Especificaciones</h5>
                            <div class="row">
                                @foreach($especificaciones as $spec)
                                    <div class="col-md-6 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="specs[]"
                                                value="{{ $spec->id }}" id="spec_{{ $spec->id }}">
                                            <label class="form-check-label" for="spec_{{ $spec->id }}">
                                                {{ $spec->nombre }}
                                            </label>
                                        </div>
                                        <input type="text" class="form-control form-control-sm mt-1" name="spec_valor[]"
                                            placeholder="Valor (ej: Sí, 600cv...)">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-danger btn-lg">Guardar Coche</button>
                            <a href="{{ route('coches.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection