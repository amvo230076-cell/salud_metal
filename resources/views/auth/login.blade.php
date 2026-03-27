<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    @include('partials.alerts')

    <h1>INICIO DE SESIÓN</h1>
    
    <form action="{{ route('acceso.store') }}" method="POST">
        @csrf
        <input type="text" name="usuario" placeholder="Usuario" class="form-control" required>
        <br>
        <input type="password" name="password" placeholder="Contraseña" class="form-control" required>
        <br>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
        
        <div class="text-center mt-3">
            <b>O</b>
            <br>
            <a href="{{ route('registro') }}"> ¿No tienes cuenta? Regístrate aquí</a>
        </div>
    </form>
    @endsection
</body>
</html>