@extends('layouts.admin')

@section('title', 'Editar Usuario')

@section('topbar-actions')
    <a href="{{ route('admin.users.index') }}" class="btn-admin btn-admin-outline">
        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Volver a Usuarios
    </a>
@endsection

@section('content')
<div class="admin-form-card">
    <div class="form-section-title">Editar usuario: {{ $user->name }}</div>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Nombre Completo *</label>
            <input type="text" name="name" class="form-input" value="{{ old('name', $user->name) }}" required>
            @error('name') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Email (no editable)</label>
            <input type="email" class="form-input" value="{{ $user->email }}" disabled style="opacity:0.5; cursor:not-allowed;">
        </div>

        <div class="form-group">
            <label class="form-label">Rol del Sistema *</label>
            <select name="role" class="form-select">
                <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>Usuario Cliente</option>
                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
            @error('role') <div class="form-error">{{ $message }}</div> @enderror
            @if(auth()->id() === $user->id)
                <p style="font-size:0.75rem; color:var(--admin-text-muted); margin-top:5px;">⚠ No puedes quitarte el rol de administrador a ti mismo.</p>
            @endif
        </div>

        <div style="padding:14px; background:var(--admin-bg); border-radius:6px; border:1px solid var(--admin-border); margin-bottom:20px; font-size:0.8rem;">
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px; color:var(--admin-text-muted);">
                <div><strong style="color:var(--admin-text);">Registrado:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</div>
                <div><strong style="color:var(--admin-text);">ID:</strong> #{{ $user->id }}</div>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-admin btn-admin-primary">Guardar Cambios</button>
            <a href="{{ route('admin.users.index') }}" class="btn-admin btn-admin-outline">Cancelar</a>
        </div>
    </form>
</div>
@endsection
