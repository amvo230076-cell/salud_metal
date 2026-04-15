<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
</head>
<body>

   @extends('layouts.app')

    @section('content')
    @include('partials.alerts')

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Panel del Alumno: {{ Auth::user()->nombre }}</h1>
            
            <div class="d-flex gap-2">
                <a href="{{ route('recursos') }}" class="btn btn-info text-white">Recursos</a>
                <form action="{{ route('cerrar') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
                </form>
            </div>
        </div>

        <hr>

        <h3>Mis Citas Agendadas</h3>
        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Motivo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($misCitas as $cita)
                    @if($cita->alumno_id == Auth::user()->id)
                    <tr>
                        <td>{{ $cita->fecha }}</td>
                        <td>{{ $cita->motivo }}</td>
                        <td>
                            @if($cita->estado == 'Pendiente')
                                <span class="badge bg-warning text-dark">{{ $cita->estado }}</span>
                            @else
                                <span class="badge bg-success">{{ $cita->estado }}</span>
                            @endif
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
</body>
</html>