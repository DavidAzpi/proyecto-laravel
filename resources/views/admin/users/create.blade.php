@extends('layouts.admin')

@section('title', 'Nuevo Usuario')

@section('topbar-actions')
    <a href="{{ route('admin.users.index') }}" class="btn-admin btn-admin-outline">
        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Volver a Usuarios
    </a>
@endsection

@section('content')
<div class="admin-form-card">
    <div class="form-section-title">Crear nuevo usuario</div>

    <form action="{{ route('admin.users.save') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label">Nombre Completo *</label>
            <input type="text" name="name" class="form-input" value="{{ old('name') }}" required placeholder="Ej: Juan Pérez">
            @error('name') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Email *</label>
            <input type="email" name="email" class="form-input" value="{{ old('email') }}" required placeholder="juan@ejemplo.com">
            @error('email') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Rol del Sistema *</label>
            <select name="role" class="form-select">
                <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>Usuario Cliente</option>
                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
            @error('role') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Contraseña *</label>
            <input type="password" name="password" class="form-input" required placeholder="Mínimo 8 caracteres">
            @error('password') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Confirmar Contraseña *</label>
            <input type="password" name="password_confirmation" class="form-input" required placeholder="Repite la contraseña">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-admin btn-admin-primary">Crear Usuario</button>
            <a href="{{ route('admin.users.index') }}" class="btn-admin btn-admin-outline">Cancelar</a>
        </div>
    </form>
</div>
@endsection
