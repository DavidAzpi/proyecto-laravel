<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Middleware para la verificación de roles de usuario.
 */
class CheckRole
{
    /**
     * Procesa la petición entrante y verifica si el usuario tiene el rol necesario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->rol !== $role) {
            return redirect('/')->with('error', 'No tienes permiso para acceder a esta sección.');
        }

        return $next($request);
    }
}
