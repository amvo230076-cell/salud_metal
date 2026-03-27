<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class VerificaUsuario
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
            ->with('Error', 'Se debe de iniciar sesion o registrarse');
        }
        return $next($request);
    }
}
