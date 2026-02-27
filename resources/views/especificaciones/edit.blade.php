@extends('layouts.master')

@section('title', 'Editar Especificación')

@section('content')
<div style="padding: 120px 0 80px;">
    <div style="max-width: 600px; margin: 0 auto; background: var(--lamb-grey-light); padding: 50px; border: 1px solid #333;">
        <h2 style="font-size: 2.5rem; margin-bottom: 40px; font-family: 'Syne', sans-serif; text-transform: uppercase;">
            Editar <span style="font-weight: 200;">Especificación</span>
        </h2>

        <form action="{{ route('especificaciones.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $especificacion->id }}">

            <div class="form-group" style="margin-bottom: 30px;">
                <label style="display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; color: var(--lamb-grey-medium); margin-bottom: 10px;">Nombre</label>
                <input type="text" name="nombre" value="{{ $especificacion->nombre }}" required
                       style="width: 100%; background: transparent; border: 1px solid #444; color: white; padding: 15px;">
            </div>

            <div class="form-group" style="margin-bottom: 30px;">
                <label style="display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; color: var(--lamb-grey-medium); margin-bottom: 10px;">Descripción</label>
                <textarea name="descripcion" rows="4"
                          style="width: 100%; background: transparent; border: 1px solid #444; color: white; padding: 15px;">{{ $especificacion->descripcion }}</textarea>
            </div>

            <div style="display: flex; gap: 20px; justify-content: flex-end; margin-top: 50px;">
                <a href="{{ route('especificaciones.index') }}" class="btn-premium btn-text" style="padding: 15px 30px;">Cancelar</a>
                <button type="submit" class="btn-premium btn-fill" style="padding: 15px 50px; cursor: pointer; border: none;">
                    Crear
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
