<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class recursosController extends Controller
{
    public function recursos()
    {
        $apiKey = config('services.youtube.key');

        $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
            'part' => 'snippet',
            'q' => 'salud mental psicologia',
            'type' => 'video',
            'maxResults' => 6,
            'key' => $apiKey
        ]);

        $videos = $response->json()['items'];

        return view('recursos.recursos', compact('videos'));
    }
}
