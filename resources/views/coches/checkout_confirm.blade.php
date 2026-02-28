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
            Estimado {{ $cliente['nombre'] }}, su solicitud para adquirir el <strong>{{ $coche->modelo }}</strong> ha sido procesada con éxito. 
            Le hemos enviado un dossier detallado con los siguientes pasos a <strong>{{ $cliente['email'] }}</strong>.
        </p>

        <div style="background: var(--lamb-grey-light); display: inline-block; padding: 40px 80px; border: 1px solid #eee; margin-bottom: 50px;">
            <div style="font-size: 0.7rem; letter-spacing: 2px; text-transform: uppercase; color: #999; margin-bottom: 10px;">Referencia del Pedido</div>
            <div style="font-size: 1.5rem; font-weight: 800; font-family: 'Outfit';">{{ $referencia }}</div>
        </div>

        <div>
            <a href="{{ route('coches.index') }}" class="btn-premium btn-fill" style="padding: 20px 50px;">VOLVER AL SHOWROOM</a>
        </div>
    </div>
</div>
@endsection
