@extends('layouts.master')

@section('title', 'Crear Cuenta')

@section('content')
<div style="display: flex; align-items: center; justify-content: center; min-height: 80vh; padding: 40px 0;">
    <div class="premium-form-container" style="margin: 0; width: 100%; max-width: 500px; padding: 60px;" data-animate>
        <div style="text-align: center; margin-bottom: 40px;">
            <div style="font-family: 'Syne', sans-serif; letter-spacing: 8px; font-size: 1.2rem; margin-bottom: 15px; color: var(--lamb-gold);">
                JOIN THE CLUB
            </div>
            <h2 style="font-size: 2rem; text-transform: uppercase; letter-spacing: 3px;">Crear <span style="font-weight: 200;">Cuenta</span></h2>
        </div>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label class="premium-label">Nombre Completo</label>
                <input type="text" name="name" class="premium-input" placeholder="Tu nombre" required value="{{ old('name') }}">
                @error('name') <span style="color: #c62828; font-size: 0.7rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-top: 30px;">
                <label class="premium-label">Correo Electrónico</label>
                <input type="email" name="email" class="premium-input" placeholder="ejemplo@phantom-cars.com" required value="{{ old('email') }}">
                @error('email') <span style="color: #c62828; font-size: 0.7rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-top: 30px;">
                <label class="premium-label">Contraseña</label>
                <input type="password" name="password" class="premium-input" placeholder="Mínimo 8 caracteres" required>
                @error('password') <span style="color: #c62828; font-size: 0.7rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-top: 30px;">
                <label class="premium-label">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" class="premium-input" placeholder="Repite tu contraseña" required>
            </div>

            <div style="margin-top: 50px;">
                <button type="submit" class="btn-premium btn-fill" style="width: 100%; justify-content: center; padding: 20px;">
                    REGISTRARSE
                </button>
            </div>
            
            <div style="margin-top: 30px; text-align: center;">
                <p style="font-size: 0.8rem; color: #999;">
                    ¿Ya tienes cuenta? <a href="{{ route('login') }}" style="color: var(--lamb-gold); text-decoration: none; font-weight: 600;">Inicia sesión</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
