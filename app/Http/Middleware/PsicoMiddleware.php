<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class PsicoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificacion si la sesion esta activa
        if(!Auth::check()) {
            return redirect()->route('registro')
            ->with('error', 'Se debe registrar e iniciar sesion');
        }

        // Verificar que el usuario sea realmente es un psicologo
        if(Auth::user()->rol != 'psicologo') {
            if(Auth::user()->rol == 'alumno') {
                return redirect()->route('mis-citas')
                ->with('error', 'Acceso denegado: No eres psicologo');
            }
            if(Auth::user()->rol == 'administrador') {
                return redirect()->route('admin-dashboard')
                ->with('error', 'Acceso denegado: No eres psicologo');
            }
        }

        return $next($request);
    }
}
