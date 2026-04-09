<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')
    @include('partials.alerts')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Usuarios</h1>
        
        <div class="d-flex gap-2">
            <a href="{{ route('recursos') }}">
                <button class="btn btn-info">Recursos</button>
            </a>
            <form action="{{ route('cerrar') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesion
                </button>
            </form>
        </div>
    </div>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->usuario }}</td>
                <td>{{ $usuario->rol }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endsection

</body>
</html>