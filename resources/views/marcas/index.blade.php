@extends('layouts.master')

@section('title', 'Marcas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Marcas Disponibles</h1>
    </div>

    <div class="row">
        @foreach($marcas as $marca)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100 border-danger">
                    <div class="card-body text-center">
                        <h3 class="card-title">{{ $marca->nombre }}</h3>
                        <p class="card-text text-muted">{{ $marca->pais }}</p>
                        <div class="bg-light p-3 rounded mb-3">
                            <span class="fs-1 fw-bold text-danger">{{ $marca->coches_count }}</span>
                            <br>Coches registrados
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection