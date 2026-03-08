@extends('layouts.master')

@section('title', 'Gestión de Marcas')

@section('content')
    <div style="padding: 120px 0 80px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px;" data-animate>
            <h2 style="font-size: 2.5rem; font-family: 'Syne', sans-serif; text-transform: uppercase;">
                Nuestras <span style="font-weight: 200;">Marcas</span>
            </h2>
            @if(auth()->check() && auth()->user()->isAdmin())
                <a href="{{ route('admin.marcas.create') }}" class="btn-premium btn-fill">Añadir Marca</a>
            @endif
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(400px, 1fr)); gap: 40px;" data-animate>
            @foreach($marcas as $marca)
                <div style="background: #ffffff; border: 1px solid #ebebeb; transition: all 0.35s ease; overflow: hidden; position: relative; border-radius: 10px;"
                    onmouseover="this.style.transform='translateY(-6px)'; this.style.borderColor='#d0d0d0'; this.style.boxShadow='0 12px 32px rgba(0,0,0,0.07)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#ebebeb'; this.style.boxShadow='none'">

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
                                    style="height: 80px; max-width: 150px; object-fit: contain;">
                            @endif
                        </div>

                        <div style="font-family: 'Syne', sans-serif; font-size: 0.7rem; color: var(--lamb-grey-medium); margin-bottom: 30px; letter-spacing: 1px; text-transform: uppercase;">
                            Prestigio y Rendimiento Superior
                        </div>

                        <div
                            style="border-top: 1px solid #eee; padding-top: 25px; display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 0.7rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px;">
                                {{ $marca->coches_count }} Modelos
                            </span>

                            <div style="display: flex; gap: 15px;">
                                @if(auth()->check() && auth()->user()->isAdmin())
                                    <a href="{{ route('admin.marcas.edit', $marca->id) }}"
                                        style="color: var(--lamb-charcoal); text-decoration: none; font-size: 0.7rem; font-weight: 800; text-transform: uppercase;">Editar</a>
                                    <form action="{{ route('admin.marcas.delete', $marca->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar marca?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background:none; border:none; color:#a00; cursor:pointer; font-size:0.7rem; font-weight:800; text-transform:uppercase; font-family:inherit; padding:0;">Borrar</button>
                                    </form>
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
