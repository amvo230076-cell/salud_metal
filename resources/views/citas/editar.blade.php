<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    @include('partials.alerts')

    <div class="container">
        <h1>Modificar Cita</h1>
        <hr>

        <form method="POST" action="{{ route('citas.update', $cita->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Fecha:</label>
                <input type="text" name="fecha" value="{{ $cita->fecha }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Motivo:</label>
                <input type="text" name="motivo" value="{{ $cita->motivo }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Estado de la Cita:</label>
                <select name="estado" class="form-control">
                    <option value="Pendiente" {{ $cita->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="Completada" {{ $cita->estado == 'Completada' ? 'selected' : '' }}>Completada</option>
                    <option value="Cancelada" {{ $cita->estado == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Actualizar Datos</button>
            <a href="{{ route('psico-dashboard') }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
    @endsection
</body>
</html>