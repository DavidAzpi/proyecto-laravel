@extends('layouts.master')

@section('title', 'Editar Marca')

@section('content')
<div class="premium-form-container" data-animate>
    <h2 class="premium-form-title">Editar <span style="font-weight: 200;">{{ $marca->nombre }}</span></h2>

    <form action="{{ route('marcas.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $marca->id }}">

        <div class="form-group">
            <label class="premium-label">Nombre de la Marca</label>
            <input type="text" name="nombre" class="premium-input" value="{{ $marca->nombre }}" required>
        </div>

        <div class="form-group">
            <label class="premium-label">País de Origen</label>
            <input type="text" name="pais" class="premium-input" value="{{ $marca->pais }}" required>
        </div>

        <div class="form-group">
            <label class="premium-label">Logo Actual</label>
            @if($marca->logo)
                <div style="margin-bottom: 20px; padding: 20px; background: #f9f9f9; display: inline-block;">
                    <img src="{{ asset('storage/' . $marca->logo) }}" alt="Logo" style="height: 50px;">
                </div>
            @endif
            <input type="file" name="logo" class="premium-input" style="border-bottom: none; font-size: 0.8rem;">
            <p style="font-size: 0.7rem; color: #999; margin-top: 5px;">Sube un archivo nuevo para reemplazar el anterior.</p>
        </div>

        <div style="display: flex; gap: 20px; margin-top: 50px;">
            <button type="submit" class="btn-premium btn-fill">Actualizar Marca</button>
            <a href="{{ route('marcas.index') }}" class="btn-premium btn-outline">Cancelar</a>
        </div>
    </form>
</div>
@endsection