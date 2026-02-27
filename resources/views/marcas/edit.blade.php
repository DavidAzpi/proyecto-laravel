@extends('layouts.master')

@section('title', 'Editar Marca')

@section('content')
    <div style="padding: 120px 0 80px;">
        <div
            style="max-width: 600px; margin: 0 auto; background: var(--lamb-grey-light); padding: 50px; border: 1px solid #333;">
            <h2 style="font-size: 2.5rem; margin-bottom: 40px; font-family: 'Syne', sans-serif; text-transform: uppercase;">
                Editar <span style="font-weight: 200;">Marca</span>
            </h2>

            <form action="{{ route('marcas.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $marca->id }}">

                <div class="form-group" style="margin-bottom: 30px;">
                    <label
                        style="display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; color: var(--lamb-grey-medium); margin-bottom: 10px;">Nombre
                        del Fabricante</label>
                    <input type="text" name="nombre" value="{{ $marca->nombre }}" required
                        style="width: 100%; background: transparent; border: 1px solid #444; color: white; padding: 15px;">
                </div>

                <div class="form-group" style="margin-bottom: 30px;">
                    <label
                        style="display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; color: var(--lamb-grey-medium); margin-bottom: 10px;">País
                        de Origen</label>
                    <input type="text" name="pais" value="{{ $marca->pais }}" required
                        style="width: 100%; background: transparent; border: 1px solid #444; color: white; padding: 15px;">
                </div>

                <div class="form-group" style="margin-bottom: 30px;">
                    <label
                        style="display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; color: var(--lamb-grey-medium); margin-bottom: 10px;">Logo
                        de la Marca</label>
                    @if($marca->logo)
                        <img src="{{ asset('storage/' . $marca->logo) }}" style="height: 50px; margin-bottom: 15px;">
                    @endif
                    <input type="file" name="logo" accept="image/*"
                        style="width: 100%; background: transparent; border: 1px solid #444; color: white; padding: 15px;">
                </div>

                <div style="display: flex; gap: 20px; justify-content: flex-end; margin-top: 50px;">
                    <a href="{{ route('marcas.index') }}" class="btn-premium btn-text"
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