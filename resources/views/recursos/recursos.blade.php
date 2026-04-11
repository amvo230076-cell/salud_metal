<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recursos</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    @include('partials.alerts')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h1>Centro de Recursos</h1>
            <a href="{{ Auth::user()->rol == 'psicologo' ? route('psico-dashboard') : route('usuarios') }}" class="btn btn-secondary">Volver</a>
        </div>

        @if(Auth::user()->rol == 'psicologo')
        <div class="card border-primary mb-5">
            <div class="card-header bg-primary text-white">Subir Guía PDF (Nuevo Recurso)</div>
            <div class="card-body">
                <form action="{{ route('recursos.store') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-5">
                        <input type="text" name="titulo" placeholder="Nombre del PDF" class="form-control" required>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="enlace" placeholder="Link al archivo (Google Drive/Dropbox)" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success w-100">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        @endif

        <h3><i class="fa-solid fa-file-pdf text-danger"></i> Guías y Lecturas</h3>
        <div class="row mb-5">
            @foreach($pdfs as $pdf)
                <div class="col-md-4">
                    <div class="card shadow-sm mb-3">
                        <div class="card-body text-center">
                            <h6>{{ $pdf->titulo }}</h6>
                            <a href="{{ $pdf->enlace }}" target="_blank" class="btn btn-sm btn-outline-danger">Descargar PDF</a>
                            
                            @if(Auth::user()->rol == 'psicologo')
                                <div class="mt-2 d-flex justify-content-center gap-2">
                                    <a href="{{ route('recursos.edit', $pdf->id) }}" class="btn btn-sm btn-outline-warning">Editar</a>
                                    
                                    <form action="{{ route('recursos.destroy', $pdf->id) }}" method="POST">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-secondary" onclick="return confirm('¿Borrar guía?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <hr>

        <h3 class="mt-4"><i class="fa-brands fa-youtube text-danger"></i> Videos Sugeridos</h3>
        <div class="row">
            @foreach($videos as $video)
            <div class="col-md-4 mb-4">
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ $video['id']['videoId'] }}" frameborder="0" allowfullscreen></iframe>
                <p class="small text-muted">{{ $video['snippet']['title'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
</body>
</html>