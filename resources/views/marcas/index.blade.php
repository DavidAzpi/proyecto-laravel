@extends('layouts.master')

@section('title', 'Gestión de Marcas')

@section('content')
    <div style="padding: 120px 0 80px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px;">
            <h2 style="font-size: 2.5rem; font-family: 'Syne', sans-serif; text-transform: uppercase;">
                Nuestras <span style="font-weight: 200;">Marcas</span>
            </h2>
            <a href="{{ route('marcas.create') }}" class="btn-premium btn-fill">Añadir Marca</a>
        </div>

        <div style="overflow-x: auto;">
            <table
                style="width: 100%; border-collapse: collapse; background: var(--lamb-grey-light); border: 1px solid #333;">
                <thead>
                    <tr style="background: #111; color: white; text-align: left;">
                        <th style="padding: 20px; font-size: 0.7rem; text-transform: uppercase;">Logo</th>
                        <th style="padding: 20px; font-size: 0.7rem; text-transform: uppercase;">Nombre</th>
                        <th style="padding: 20px; font-size: 0.7rem; text-transform: uppercase;">País</th>
                        <th style="padding: 20px; font-size: 0.7rem; text-transform: uppercase;">Coches en Stock</th>
                        <th style="padding: 20px; font-size: 0.7rem; text-transform: uppercase; text-align: right;">Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($marcas as $marca)
                        <tr style="border-bottom: 1px solid #333; transition: background 0.3s;"
                            onmouseover="this.style.background='#1a1a1a'" onmouseout="this.style.background='transparent'">
                            <td style="padding: 20px;">
                                @if($marca->logo)
                                    <img src="{{ asset('storage/' . $marca->logo) }}" alt="Logo" style="height: 30px;">
                                @else
                                    <span style="font-size: 0.6rem; color: #444;">Sin logo</span>
                                @endif
                            </td>
                            <td style="padding: 20px; font-weight: 600;">{{ $marca->nombre }}</td>
                            <td style="padding: 20px; color: var(--lamb-grey-medium);">{{ $marca->pais }}</td>
                            <td style="padding: 20px;">
                                <span
                                    style="background: var(--lamb-charcoal); padding: 5px 12px; border-radius: 20px; font-size: 0.7rem;">
                                    {{ $marca->coches_count }} vehículos
                                </span>
                            </td>
                            <td style="padding: 20px; text-align: right;">
                                <div style="display: flex; gap: 15px; justify-content: flex-end;">
                                    <a href="{{ route('marcas.edit', $marca->id) }}"
                                        style="color: var(--lamb-grey-medium); text-decoration: none; font-size: 0.7rem; text-transform: uppercase; font-weight: 700;">Editar</a>
                                    <a href="{{ route('marcas.delete', $marca->id) }}"
                                        style="color: #a00; text-decoration: none; font-size: 0.7rem; text-transform: uppercase; font-weight: 700;"
                                        onclick="return confirm('¿Eliminar esta marca? Se borrarán sus coches asociados.')">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection