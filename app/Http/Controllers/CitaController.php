<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Cita; 
use App\Models\Usuario; 
use App\Mail\AlertaCitaCorreo;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtener todas las citas y usuarios.
        $citas = Cita::all();
        $usuarios = Usuario::all();

        return view('psicologo.dashboard', compact('citas','usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cita = Cita::create([
            'alumno_id' => $request->alumno_id,
            'psicologo_id' => $request->psicologo_id,
            'fecha' => $request->fecha,
            'motivo' => $request->motivo,
            'estado' => 'Pendiente'
        ]);

        $alumno = Usuario::find($request->alumno_id);
        $nombrePsico = auth()->user()->nombre;

        Mail::to($alumno->mail)->send(new AlertaCitaCorreo($cita, $nombrePsico));

        return back()->with('success', 'Cita guardada');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita)
    {
        return view('citas.editar', compact('cita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        $cita->update([
            'fecha' => $request->fecha,
            'motivo' => $request->motivo,
            'estado' => $request->estado
        ]);

        return redirect()->route('psico-dashboard')
        ->with('success', 'Cita actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route('psico-dashboard')
        ->with('success', 'Cita eliminada correctamente');
    }
}
