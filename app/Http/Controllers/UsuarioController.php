<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $usuarios = Usuario::all();
        return view('index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Usuario::create([
            'nombre'=> $request->nombre,
            'usuario'=> $request->usuario,
            'password'=> bcrypt($request->password),
            'rol'=> $request->rol,
            'is_admin' => $request->rol == 'administrador'
        ]);
        return redirect()->route('admin-dashboard')
        ->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->update([
            'nombre' => $request->nombre,
            'usuario' => $request->usuario,
            'password' => bcrypt($request->password),
            'rol' => $request->rol
        ]);

        return redirect()->route('admin-dashboard')
        ->with('success', 'Usuario actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('admin-dashboard')
        ->with('success', 'Usuario eliminado del sistema.');
    }
}
