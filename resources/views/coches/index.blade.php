@extends('layouts.master')

@section('title', 'Listado de Coches')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Listado de Coches Deportivos</h1>
        <a href="{{ route('coches.create') }}" class="btn btn-danger">Añadir Nuevo Coche</a>
    </div>

    <div class="row">
        @foreach($coches as $coche)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    @if($coche->imagen)
                        <img src="{{ asset('storage/' . $coche->imagen) }}" class="card-img-top" alt="{{ $coche->modelo }}">
                    @else
                        <img src="https://via.placeholder.com/400x200?text=Sin+Imagen" class="card-img-top" alt="Sin imagen">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $coche->modelo }}</h5>
                        <p class="card-text text-muted mb-1">{{ $coche->marca->nombre }} ({{ $coche->marca->pais }})</p>
                        <p class="card-text fw-bold text-danger fs-5">{{ number_format($coche->precio, 0, ',', '.') }} €</p>

                        <div class="mb-3">
                            @foreach($coche->especificaciones as $spec)
                                <span class="badge bg-secondary mb-1" title="{{ $spec->descripcion }}">{{ $spec->nombre }}:
                                    {{ $spec->pivot->valor }}</span>
                            @endforeach
                        </div>

                        <div class="mt-auto d-flex justify-content-between">
                            <a href="{{ route('coches.edit', $coche) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                            <form action="{{ route('coches.destroy', $coche) }}" method="POST"
                                onsubmit="return confirm('¿Estás seguro?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $coches->links('pagination::bootstrap-5') }}
    </div>
@endsection