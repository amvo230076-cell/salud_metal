<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class AlumnoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Funcionamiento del Middleware (ESCRIBIR EL CODIGO AQUI)
        // Verificar si la sesion del usuario esta activa
        if(!Auth::check()) {
            return redirect()->route('acceso')
            ->with('warning', 'Se debe de iniciar sesion o registrarse');
        }

        if(Auth::user()->rol != 'alumno') {
            if(Auth::user()->rol == 'psicologo') {
                return redirect()->route('psico-dashboard')
                ->with('warning', 'Acceso denegado: Zona exclusiva para alumnos');
            }
            if(Auth::user()->rol == 'administrador') {
                return redirect()->route('admin-dashboard')
                ->with('warning', 'Acceso denegado: Zona exclusiva para alumnos');
            }
        }
        return $next($request);
    }
}
