@extends('layouts.master')

@section('title', 'Gestión de Marcas')

@section('content')
    <div style="padding: 120px 0 80px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px;" data-animate>
            <h2 style="font-size: 2.5rem; font-family: 'Syne', sans-serif; text-transform: uppercase;">
                Nuestras <span style="font-weight: 200;">Marcas</span>
            </h2>
            @if(auth()->user()->rol === 'admin')
                <a href="{{ route('marcas.create') }}" class="btn-premium btn-fill">Añadir Marca</a>
            @endif
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(400px, 1fr)); gap: 40px;" data-animate>
            @foreach($marcas as $marca)
                <div style="background: var(--lamb-grey-light); border: 1px solid #333; transition: all 0.4s var(--transition-premium); overflow: hidden; position: relative;"
                    onmouseover="this.style.transform='translateY(-10px)'; this.style.borderColor='var(--lamb-gold)'; this.style.background='white'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#333'; this.style.background='var(--lamb-grey-light)'">

                    <div style="padding: 40px;">
                        <div
                            style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 30px;">
                            <div>
                                <div
                                    style="font-family: 'Syne', sans-serif; font-size: 0.6rem; letter-spacing: 3px; color: var(--lamb-gold); text-transform: uppercase; margin-bottom: 5px;">
                                    {{ $marca->pais }}</div>
                                <h3 style="font-size: 2rem; margin: 0; letter-spacing: 2px;">{{ strtoupper($marca->nombre) }}
                                </h3>
                            </div>
                            @if($marca->logo)
                                <img src="{{ asset('storage/' . $marca->logo) }}" alt="Logo"
                                    style="height: 40px; filter: grayscale(1);">
                            @endif
                        </div>

                        <div
                            style="font-style: italic; font-size: 0.9rem; color: var(--lamb-charcoal); margin-bottom: 20px; font-family: 'Syne'; letter-spacing: 1px;">
                            "{{ $marca->slogan ?: 'Pure Excellence' }}"
                        </div>

                        <p
                            style="color: var(--lamb-grey-medium); font-size: 0.9rem; line-height: 1.6; margin-bottom: 30px; height: 80px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">
                            {{ $marca->descripcion ?: 'Marca de automoción de gran prestigio integrada en nuestro catálogo exclusivo de Phantom Cars.' }}
                        </p>

                        <div
                            style="border-top: 1px solid #eee; padding-top: 25px; display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 0.7rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px;">
                                {{ $marca->coches_count }} Modelos
                            </span>

                            <div style="display: flex; gap: 15px;">
                                @if(auth()->user()->rol === 'admin')
                                    <a href="{{ route('marcas.edit', $marca->id) }}"
                                        style="color: var(--lamb-charcoal); text-decoration: none; font-size: 0.7rem; font-weight: 800; text-transform: uppercase;">Editar</a>
                                    <a href="{{ route('marcas.delete', $marca->id) }}"
                                        style="color: #a00; text-decoration: none; font-size: 0.7rem; font-weight: 800; text-transform: uppercase;"
                                        onclick="return confirm('¿Eliminar marca?')">Borrar</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginacion -->
        <div class="pagination-container"
            style="display: flex; justify-content: center; margin-top: 60px; margin-bottom: 40px;">
            {{ $marcas->links() }}
        </div>
    </div>
@endsection