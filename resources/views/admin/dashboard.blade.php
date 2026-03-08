@extends('layouts.admin')

@section('title', 'Dashboard')

@section('topbar-actions')
    <a href="{{ route('coches.index') }}" class="btn-admin btn-admin-outline" style="font-size:0.72rem;">
        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
        Ver Showroom
    </a>
@endsection

@section('content')

{{-- Stats --}}
<div class="admin-stats-grid">
    <div class="stat-card">
        <div class="stat-label">Vehículos</div>
        <div class="stat-value">{{ $stats['coches'] }}</div>
        <div class="stat-sub"><a href="{{ route('admin.coches.index') }}" style="color:inherit; text-decoration:underline; font-size:0.7rem;">Gestionar →</a></div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Marcas</div>
        <div class="stat-value">{{ $stats['marcas'] }}</div>
        <div class="stat-sub"><a href="{{ route('admin.marcas.index') }}" style="color:inherit; text-decoration:underline; font-size:0.7rem;">Gestionar →</a></div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Especificaciones</div>
        <div class="stat-value">{{ $stats['especificaciones'] }}</div>
        <div class="stat-sub"><a href="{{ route('admin.especificaciones.index') }}" style="color:inherit; text-decoration:underline; font-size:0.7rem;">Gestionar →</a></div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Usuarios</div>
        <div class="stat-value">{{ $stats['usuarios'] }}</div>
        <div class="stat-sub"><a href="{{ route('admin.users.index') }}" style="color:inherit; text-decoration:underline; font-size:0.7rem;">Gestionar →</a></div>
    </div>
    <div class="stat-card" style="background:var(--admin-text); color:#fff; border-color:var(--admin-text);">
        <div class="stat-label" style="opacity:0.8;">Pedidos Totales</div>
        <div class="stat-value">{{ $stats['pedidos'] }}</div>
        <div class="stat-sub"><a href="{{ route('admin.pedidos.index') }}" style="color:#fff; text-decoration:underline; font-size:0.7rem; opacity:0.8;">Ver pedidos →</a></div>
    </div>
    <div class="stat-card" style="border-left:4px solid var(--admin-text);">
        <div class="stat-label">Ingresos Totales</div>
        <div class="stat-value" style="font-size:1.6rem;">{{ number_format($stats['ingresos'], 0, ',', '.') }} €</div>
        <div class="stat-sub" style="color:var(--admin-text-muted);">Acumulado histórico</div>
    </div>
</div>

{{-- Quick access grid --}}
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">

    {{-- Coches --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <span class="admin-card-title">Vehículos recientes</span>
            <a href="{{ route('admin.coches.create') }}" class="btn-admin btn-admin-primary" style="font-size:0.72rem; padding:6px 12px;">+ Nuevo</a>
        </div>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentCoches as $coche)
                <tr>
                    <td style="font-weight:500;">{{ $coche->modelo }}</td>
                    <td style="color:var(--admin-text-muted);">{{ $coche->marca->nombre }}</td>
                    <td>{{ number_format($coche->precio, 0, ',', '.') }} €</td>
                    <td>
                        <a href="{{ route('admin.coches.edit', $coche->id) }}" class="btn-admin btn-admin-ghost" style="padding:4px 8px; font-size:0.7rem;">Editar</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" style="text-align:center; color:var(--admin-text-muted); padding:24px;">Sin vehículos</td></tr>
                @endforelse
            </tbody>
        </table>
        @if($stats['coches'] > 5)
        <div style="padding:12px 20px; border-top:1px solid var(--admin-border);">
            <a href="{{ route('admin.coches.index') }}" style="font-size:0.75rem; color:var(--admin-text-muted); text-decoration:none;">Ver todos ({{ $stats['coches'] }}) →</a>
        </div>
        @endif
    </div>

    {{-- Marcas --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <span class="admin-card-title">Marcas</span>
            <a href="{{ route('admin.marcas.create') }}" class="btn-admin btn-admin-primary" style="font-size:0.72rem; padding:6px 12px;">+ Nueva</a>
        </div>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>País</th>
                    <th>Modelos</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($allMarcas as $marca)
                <tr>
                    <td style="font-weight:500;">{{ $marca->nombre }}</td>
                    <td style="color:var(--admin-text-muted);">{{ $marca->pais ?: '—' }}</td>
                    <td><span class="badge badge-light">{{ $marca->coches_count }}</span></td>
                    <td>
                        <a href="{{ route('admin.marcas.edit', $marca->id) }}" class="btn-admin btn-admin-ghost" style="padding:4px 8px; font-size:0.7rem;">Editar</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" style="text-align:center; color:var(--admin-text-muted); padding:24px;">Sin marcas</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Especificaciones --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <span class="admin-card-title">Especificaciones</span>
            <a href="{{ route('admin.especificaciones.create') }}" class="btn-admin btn-admin-primary" style="font-size:0.72rem; padding:6px 12px;">+ Nueva</a>
        </div>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentEspecs as $espec)
                <tr>
                    <td style="font-weight:500;">{{ $espec->nombre }}</td>
                    <td style="color:var(--admin-text-muted); font-size:0.78rem;">{{ Str::limit($espec->descripcion, 40) ?: '—' }}</td>
                    <td>
                        <a href="{{ route('admin.especificaciones.edit', $espec->id) }}" class="btn-admin btn-admin-ghost" style="padding:4px 8px; font-size:0.7rem;">Editar</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" style="text-align:center; color:var(--admin-text-muted); padding:24px;">Sin especificaciones</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Usuarios --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <span class="admin-card-title">Usuarios recientes</span>
            <a href="{{ route('admin.users.index') }}" class="btn-admin btn-admin-outline" style="font-size:0.72rem; padding:6px 12px;">Ver todos</a>
        </div>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentUsers as $user)
                <tr>
                    <td>
                        <div style="font-weight:500; font-size:0.85rem;">{{ $user->name }}</div>
                        <div style="font-size:0.72rem; color:var(--admin-text-muted);">{{ $user->email }}</div>
                    </td>
                    <td>
                        <span class="badge {{ $user->isAdmin() ? 'badge-dark' : 'badge-light' }}">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn-admin btn-admin-ghost" style="padding:4px 8px; font-size:0.7rem;">Editar</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" style="text-align:center; color:var(--admin-text-muted); padding:24px;">Sin usuarios</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pedidos --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <span class="admin-card-title">Últimos Pedidos</span>
            <a href="{{ route('admin.pedidos.index') }}" class="btn-admin btn-admin-outline" style="font-size:0.72rem; padding:6px 12px;">Ver todos</a>
        </div>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Coche</th>
                    <th>Cliente</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentPedidos as $pedido)
                <tr>
                    <td style="font-weight:500; font-size:0.85rem;">{{ $pedido->coche->modelo }}</td>
                    <td style="font-size:0.72rem;">{{ $pedido->nombre_cliente }}</td>
                    <td style="font-size:0.82rem; font-weight:500;">{{ number_format($pedido->precio, 0, ',', '.') }} €</td>
                </tr>
                @empty
                <tr><td colspan="3" style="text-align:center; color:var(--admin-text-muted); padding:24px;">Sin pedidos</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
