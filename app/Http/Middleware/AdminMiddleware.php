<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Verificar si la sesion esta activa
        if(!Auth::check()) {
            return redirect()->route('registro')
            ->with('warning', 'Se debe registrar e iniciar sesion');
        }

        // Verificar que el usuario sea realmente un administador
        if(Auth::user()->rol != 'administrador') {
            if(Auth::user()->rol == 'alumno') {
                return redirect()->route('mis-citas')
                ->with('warning', 'Acceso denegado: No eres administrador');
            }
            if(Auth::user()->rol == 'psicologo') {
                return redirect()->route('psico-dashboard')
                ->with('warning', 'Acceso denegado: No eres administrador');
            }
        }

        return $next($request);
    }
}
