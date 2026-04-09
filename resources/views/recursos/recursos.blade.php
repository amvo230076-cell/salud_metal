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

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Recursos de Ayuda Psicológica</h1>

        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
            Volver
        </a>
    </div>

    <div class="row">
        @foreach($videos as $video)
            <div class="col-md-4 mb-4">
                <h5>{{ $video['snippet']['title'] }}</h5>

                <iframe width="100%" height="200"
                    src="https://www.youtube.com/embed/{{ $video['id']['videoId'] }}"
                    frameborder="0" allowfullscreen>
                </iframe>
            </div>
        @endforeach
    </div>

    @endsection
</body>
</html>