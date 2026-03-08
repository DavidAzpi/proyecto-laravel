@extends('layouts.admin')

@section('title', 'Usuarios')

@section('topbar-actions')
    <a href="{{ route('admin.users.create') }}" class="btn-admin btn-admin-primary">
        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Nuevo Usuario
    </a>
@endsection

@section('content')

<div class="admin-card">
    <div class="admin-card-header">
        <span class="admin-card-title">Gestión de Usuarios</span>
        <span style="font-size:0.78rem; color:var(--admin-text-muted);">{{ $users->count() }} registros</span>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                    <div style="display:flex; align-items:center; gap:10px;">
                        <div style="width:28px; height:28px; background:{{ $user->isAdmin() ? 'var(--admin-text)' : 'var(--admin-bg)' }}; border:1px solid var(--admin-border); border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:0.7rem; font-weight:600; color:{{ $user->isAdmin() ? '#fff' : 'var(--admin-text-muted)' }}; flex-shrink:0;">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <span style="font-weight:500;">{{ $user->name }}</span>
                        @if(auth()->id() === $user->id)
                            <span class="badge badge-gold" style="font-size:0.55rem;">Tú</span>
                        @endif
                    </div>
                </td>
                <td style="color:var(--admin-text-muted); font-size:0.82rem;">{{ $user->email }}</td>
                <td>
                    <span class="badge {{ $user->isAdmin() ? 'badge-dark' : 'badge-light' }}">
                        {{ $user->role }}
                    </span>
                </td>
                <td style="font-size:0.78rem; color:var(--admin-text-muted);">{{ $user->created_at->format('d/m/Y') }}</td>
                <td>
                    <div style="display:flex; gap:6px; align-items:center;">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn-admin btn-admin-outline" style="padding:5px 10px; font-size:0.72rem;">Editar</a>
                        @if(auth()->id() !== $user->id)
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Eliminar al usuario {{ $user->name }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-admin btn-admin-danger" style="padding:5px 10px; font-size:0.72rem;">Eliminar</button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="admin-pagination">
        {{ $users->links() }}
    </div>
</div>

@endsection
