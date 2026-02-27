@extends('layouts.master')

@section('title', 'Nuestras Marcas')

@section('content')
    <div style="padding-top: 80px; text-align: center;" data-animate>
        <h1 style="font-size: 3.5rem; margin-bottom: 20px;">Marcas de Prestigio</h1>
        <p style="color: var(--lamb-grey-medium); max-width: 600px; margin: 0 auto 80px;">Colaboramos con los fabricantes
            más exclusivos del mundo para ofrecer una experiencia de conducción sin precedentes.</p>
    </div>

    <div
        style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px; margin-bottom: 100px;">
        @foreach($marcas as $index => $marca)
            <div class="brand-item" data-animate
                style="transition-delay: {{ $index * 0.1 }}s; border: 1px solid #eee; padding: 40px; text-align: center; transition: all 0.3s var(--transition-premium);">
                <div style="height: 100px; display: flex; align-items: center; justify-content: center; margin-bottom: 30px;">
                    <div style="font-size: 1.5rem; font-weight: 800; color: #ddd; letter-spacing: 5px;">{{ $marca->nombre }}
                    </div>
                </div>
                <h3 style="font-size: 1.4rem; margin-bottom: 10px;">{{ $marca->nombre }}</h3>
                <p
                    style="color: var(--lamb-gold); font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 20px;">
                    {{ $marca->pais }}</p>

                <div style="background: var(--lamb-grey-light); padding: 20px; border-radius: 2px;">
                    <span
                        style="font-size: 2rem; font-weight: 800; color: var(--lamb-charcoal);">{{ $marca->coches_count }}</span>
                    <p
                        style="font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; color: var(--lamb-grey-medium); margin-top: 5px;">
                        Vehículos Disponibles</p>
                </div>
            </div>
        @endforeach
    </div>

    <style>
        .brand-item:hover {
            background-color: var(--lamb-charcoal);
            border-color: var(--lamb-charcoal);
        }

        .brand-item:hover h3 {
            color: white;
        }

        .brand-item:hover p {
            color: var(--lamb-gold);
        }

        .brand-item:hover div div {
            color: #222 !important;
        }
    </style>
@endsection