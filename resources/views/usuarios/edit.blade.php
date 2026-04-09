<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICACION DE DATOS DEL USUARIO</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')
    @include('partials.alerts')
    <h1>Editar Usuario</h1>

    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
        @csrf
        @method('PUT')

        Nombre:
        <input type="text" name="nombre" value="{{ $usuario->nombre }}"><br>

        Usuario:
        <input type="text" name="usuario" value="{{ $usuario->usuario }}"><br>

        Password:
        <input type="password" name="password"><br>

        Rol:
        <select name="rol">
            <option value="alumno">Alumno</option>
            <option value="psicologo">Psicologo</option>
            <option value="administrador">Administrador</option>
        </select><br>

        <button class="btn btn-warning">Actualizar</button>
    </form>
    @endsection
</body>
</html>