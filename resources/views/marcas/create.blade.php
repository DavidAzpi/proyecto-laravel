@extends('layouts.master')

@section('title', 'Añadir Marca')

@section('content')
    <div style="padding: 120px 0 80px;">
        <div
            style="max-width: 600px; margin: 0 auto; background: var(--lamb-grey-light); padding: 50px; border: 1px solid #333;">
            <h2 style="font-size: 2.5rem; margin-bottom: 40px; font-family: 'Syne', sans-serif; text-transform: uppercase;">
                Nueva <span style="font-weight: 200;">Marca</span>
            </h2>

            <form action="{{ route('marcas.save') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group" style="margin-bottom: 30px;">
                    <label
                        style="display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; color: var(--lamb-grey-medium); margin-bottom: 10px;">Nombre
                        del Fabricante</label>
                    <input type="text" name="nombre" required
                        style="width: 100%; background: transparent; border: 1px solid #444; color: white; padding: 15px;">
                </div>

                <div class="form-group" style="margin-bottom: 30px;">
                    <label
                        style="display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; color: var(--lamb-grey-medium); margin-bottom: 10px;">País
                        de Origen</label>
                    <input type="text" name="pais" required
                        style="width: 100%; background: transparent; border: 1px solid #444; color: white; padding: 15px;">
                </div>

                <div class="form-group" style="margin-bottom: 30px;">
                    <label
                        style="display: block; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; color: var(--lamb-grey-medium); margin-bottom: 10px;">Logo
                        de la Marca</label>
                    <input type="file" name="logo" accept="image/*"
                        style="width: 100%; background: transparent; border: 1px solid #444; color: white; padding: 15px;">
                </div>

                <div style="display: flex; gap: 20px; justify-content: flex-end; margin-top: 50px;">
                    <a href="{{ route('marcas.index') }}" class="btn-premium btn-text"
                        style="padding: 15px 30px;">Cancelar</a>
                    <button type="submit" class="btn-premium btn-fill"
                        style="padding: 15px 50px; cursor: pointer; border: none;">
                        Crear Fabricante
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection