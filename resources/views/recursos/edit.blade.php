<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR PDF</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <h1>Editar Recurso</h1>
        <hr>

        <div class="card card-body shadow-sm">
            <form action="{{ route('recursos.update', $recurso->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Título del Recurso:</label>
                    <input type="text" name="titulo" class="form-control" value="{{ $recurso->titulo }}" required>
                </div>

                <div class="mb-3">
                    <label>Enlace (Google Drive / URL):</label>
                    <input type="text" name="enlace" class="form-control" value="{{ $recurso->enlace }}" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-warning">Actualizar Recurso</button>
                    <a href="{{ route('recursos') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    @endsection
</body>
</html>