<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Recurso;

class recursosController extends Controller
{
    public function recursos()
    {
        $apiKey = config('services.youtube.key');

        $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
            'part' => 'snippet',
            'q' => 'salud mental psicologia',
            'type' => 'video',
            'maxResults' => 3,
            'key' => $apiKey
        ]);

        $videos = $response->json()['items'];
        $pdfs = Recurso::all();

        return view('recursos.recursos', compact('videos', 'pdfs'));
    }

    // Para guardar
    public function store(Request $request)
    {
        Recurso::create([
            'titulo' => $request->titulo,
            'enlace' => $request->enlace,
            'tipo' => 'PDF' 
        ]);

        return redirect()->route('recursos')
        ->with('success', 'Recurso guardado correctamente.');
    }
    
    public function edit(Recurso $recurso)
    {
        return view('recursos.edit', compact('recurso'));
    }

    public function update(Request $request, Recurso $recurso)
    {
        $recurso->update([
            'titulo' => $request->titulo,
            'enlace' => $request->enlace
        ]);

        return redirect()->route('recursos')
        ->with('success', 'Recurso actualizado con éxito.');
    }

    // Para eliminar xd
    public function destroy(Recurso $recurso) {
        $recurso->delete();
        
        return redirect()->route('recursos')
        ->with('success', 'PDF eliminado del sistema.');
    }
}
