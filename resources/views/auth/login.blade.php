@extends('layouts.master')

@section('title', 'Acceso Clientes')

@section('content')
<div style="display: flex; align-items: center; justify-content: center; min-height: 80vh; padding: 40px 0;">
    <div class="premium-form-container" style="margin: 0; width: 100%; max-width: 500px; padding: 80px 60px;" data-animate>
        <div style="text-align: center; margin-bottom: 50px;">
            <div style="font-family: 'Syne', sans-serif; letter-spacing: 8px; font-size: 1.5rem; margin-bottom: 20px;">
                PHANTOM <span style="font-weight: 200; opacity: 0.5;">CARS</span>
            </div>
            <h2 style="font-size: 1.5rem; text-transform: uppercase; letter-spacing: 3px;">Personal Access</h2>
        </div>

        @if ($errors->any())
            <div style="color: #c62828; font-size: 0.8rem; margin-bottom: 30px; text-align: center; background: #ffebee; padding: 15px; border-radius: 2px;">
                Identificación incorrecta. Revise sus credenciales.
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label class="premium-label">Correo Electrónico</label>
                <input type="email" name="email" class="premium-input" placeholder="id@phantom-cars.com" required value="{{ old('email') }}">
            </div>

            <div class="form-group" style="margin-top: 40px;">
                <label class="premium-label">Contraseña</label>
                <input type="password" name="password" class="premium-input" placeholder="••••••••" required>
            </div>

            <div style="margin-top: 60px;">
                <button type="submit" class="btn-premium btn-fill" style="width: 100%; justify-content: center; padding: 20px;">
                    Iniciar Sesión
                </button>
            </div>
            
            <div style="margin-top: 30px; text-align: center;">
                <p style="font-size: 0.8rem; color: #999;">
                    ¿No tienes cuenta? <a href="{{ route('register') }}" style="color: var(--lamb-gold); text-decoration: none; font-weight: 600;">Regístrate ahora</a>
                </p>
                <p style="font-size: 0.6rem; color: #777; text-transform: uppercase; letter-spacing: 1px; margin-top: 15px;">
                    Acceso restringido a personal certificado y clientes exclusivos
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
