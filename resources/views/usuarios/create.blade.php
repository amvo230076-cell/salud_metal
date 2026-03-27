<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO DE USUARIO</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')
    @include('partials.alerts')
    <h1>Registrar Usuario</h1>

    <form method="POST" action="{{ route('usuarios.store') }}">
        @csrf

        Nombre:
        <input type="text" name="nombre"><br>

        Usuario:
        <input type="text" name="usuario"><br>

        Password:
        <input type="password" name="password"><br>

        Rol:
        <select name="rol">
            <option value="alumno">Alumno</option>
            <option value="psicologo">Psicologo</option>
            <option value="administrador">Administrador</option>
        </select><br>

        <button type="submit">Guardar</button>
    </form>
    @endsection
</body>
</html>