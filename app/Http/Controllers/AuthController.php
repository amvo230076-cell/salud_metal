<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Usuario; 
use App\Models\Cita; 

class AuthController extends Controller
{
    public function registerForm(){
        return view('auth.register');
    }   

    public function register(Request $request){ 
        $request->validate([
            'nombre' => 'required',
            'usuario' => 'required|unique:usuarios', 
            'mail' => 'required|unique:usuarios',
            'password' => 'required|confirmed|min:8',
            'rol' => 'required',
        ]);

        $user = Usuario::create([
            'nombre' => $request->nombre,
            'usuario' => $request->usuario,
            'mail' => $request->mail,
            'password' => Hash::make($request->password),
            'rol' => $request->rol
        ]);

        return redirect()->route('acceso')
        ->with('success', 'Registro completado. Ahora puedes iniciar sesión.');
    }
    
    public function loginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $data = $request->validate([
            'usuario' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();

            if(auth()->user()->rol == 'administrador') {
                return redirect()->route('admin-dashboard');
            }

            if(auth()->user()->rol == 'psicologo') {
                return redirect()->route('psico-dashboard');
            }

            return redirect()->route('mis-citas');
        }

        return back()->with('error', 'Usuario o contraseña incorrectos.');
    }
    
    public function logout(Request $request) {
        Auth::logout();

        // Cierre de credenciales en las sesiones
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('acceso');
    }

    // Vista del panel de administrador
    public function adminDashboard() {

        $usuarios = Usuario::all();
        return view('admin.dashboard', compact('usuarios'));
    }

    public function usuarios() {
        $misCitas = Cita::all();
        return view('alumno.dashboard', compact('misCitas'));
    }
}