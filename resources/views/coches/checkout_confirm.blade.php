@extends('layouts.master')

@section('title', 'Pedido Confirmado')

@section('content')
<div style="padding: 150px 0 100px; text-align: center;">
    <div data-animate>
        <div style="width: 100px; height: 100px; background: var(--lamb-gold); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 40px; font-size: 3rem;">
            ✓
        </div>
        <div style="font-family: 'Syne', sans-serif; font-size: 0.8rem; letter-spacing: 5px; color: var(--lamb-gold); text-transform: uppercase; margin-bottom: 15px;">Enhorabuena</div>
        <h2 style="font-size: 4rem; margin-bottom: 20px;">PEDIDO <span style="font-weight: 200;">CONFIRMADO</span></h2>

        <p style="color: var(--lamb-grey-medium); max-width: 600px; margin: 0 auto 40px; line-height: 1.8; font-size: 1.1rem;">
            Su reserva ha sido procesada con éxito y registrada en nuestro sistema central. El administrador revisará su solicitud en breve.
        </p>

        <div>
            <a href="{{ route('coches.index') }}" class="btn-premium btn-fill" style="padding: 20px 50px;">VOLVER AL SHOWROOM</a>
        </div>
    </div>
</div>
@endsection
