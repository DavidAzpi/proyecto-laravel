@extends('layouts.master')

@section('title', 'Editar Marca')

@section('content')
<div class="premium-form-container" data-animate>
    <h2 class="premium-form-title">Editar <span style="font-weight: 200;">Marca</span></h2>

    <form action="{{ route('marcas.update', $marca->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if($marca->logo)
            <div style="margin-bottom: 30px;">
                <label class="premium-label">Logo Actual</label>
                <div style="width: 100px; height: 100px; background: #f9f9f9; padding: 10px; border: 1px solid #eee; margin-top: 10px;">
                    <img src="{{ asset('storage/' . $marca->logo) }}" style="width: 100%; height: 100%; object-fit: contain;">
                </div>
            </div>
        @endif

        <div class="form-group">
            <label class="premium-label">Nombre de la Marca</label>
            <input type="text" name="nombre" class="premium-input" value="{{ $marca->nombre }}" required>
        </div>

        <div class="form-group">
            <label class="premium-label">País de Origen</label>
            <input type="text" name="pais" class="premium-input" value="{{ $marca->pais }}" required>
        </div>

        <div class="form-group">
            <label class="premium-label">Nuevo Logo (Opcional)</label>
            <input type="file" name="logo" class="premium-input" style="border-bottom: none; font-size: 0.8rem; padding-top: 10px;">
            <p style="font-size: 0.7rem; color: #999; margin-top: 5px;">Sube un archivo nuevo para reemplazar el anterior.</p>
        </div>

        <div style="display: flex; gap: 20px; margin-top: 50px;">
            <button type="submit" class="btn-premium btn-fill">Actualizar Marca</button>
            <a href="/marcas" class="btn-premium btn-outline">Cancelar</a>
        </div>
    </form>
</div>
@endsection
