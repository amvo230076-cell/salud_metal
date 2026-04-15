<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de citas</title>
</head>
<body>

    @extends('layouts.app')

@section('content')
@include('partials.alerts')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Bienvenido Psicologo: {{ Auth::user()->nombre }}</h1>
    <div class="d-flex gap-2">
        <a href="{{ route('recursos') }}" class="btn btn-info text-white">Recursos</a>
        <form action="{{ route('cerrar') }}" method="POST">
                @csrf
            <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
        </form>
    </div>
</div>

<h3>Agendar Nueva Cita</h3>
<form action="{{ route('citas.store') }}" method="POST">
    @csrf
    <input type="hidden" name="psicologo_id" value="{{ Auth::user()->id }}">

    Alumno:
    <select name="alumno_id">
        @foreach($usuarios as $u)
            @if($u->rol == 'alumno')
                <option value="{{ $u->id }}">{{ $u->nombre }}</option>
            @endif
        @endforeach
    </select>

    Fecha: <input type="text" name="fecha" placeholder="2024-10-10">
    Motivo: <input type="text" name="motivo">

    <button type="submit" class="btn btn-primary">Guardar Cita</button>
</form>

<hr>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Alumno ID</th>
            <th>Fecha</th>
            <th>Motivo</th>
            <th>Estado</th>
            <th>Acciones</th> </tr>
    </thead>
    <tbody>
        @foreach($citas as $c)
            @if($c->psicologo_id == Auth::user()->id)
            <tr>
                <td>{{ $c->alumno_id }}</td>
                <td>{{ $c->fecha }}</td>
                <td>{{ $c->motivo }}</td>
                <td>{{ $c->estado }}</td>
                <td>
                    <a href="{{ route('citas.edit', $c->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('citas.destroy', $c->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que quieres eliminar esta cita?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>
@endsection

</body>
</html>