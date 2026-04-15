<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
   @extends('layouts.app')
   @section('content')

    <h1>REGISTRO</h1>

    <form action="{{ route('registro.store') }}" method="POST">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre" class="form-control" required>
        <br>
        <input type="text" name="usuario" placeholder="Usuario" class="form-control" required>
        <br>
        <input type="text" name="mail" placeholder="example@gmail.com" class="form-control" required>
        <br>
        <select name="rol" class="form-control" required>
            <option value="alumno">Alumno</option>
            <option value="psicologo">Psicologo</option>
        </select>
        <br>
        <input type="password" name="password" placeholder="Contraseña" class="form-control" required>
        <br>
        <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" class="form-control" required>
        <br>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('acceso') }}" class="btn btn-secondary">Volver</a>

    </form>
    <hr>
    @endsection
</body>
</html>