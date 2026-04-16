<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICACIÓN DE DATOS</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Editar Usuario: {{ $usuario->nombre }}</h1>
            <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Volver
            </a>
        </div>

        @include('partials.alerts')

        <div class="card shadow border-warning">
            <div class="card-body">
                <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nombre Completo:</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $usuario->nombre }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre de Usuario:</label>
                        <input type="text" name="usuario" class="form-control" value="{{ $usuario->usuario }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contraseña (Dejar en blanco para no cambiar):</label>
                        <input type="password" name="password" class="form-control" placeholder="Nueva contraseña opcional">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rol:</label>
                        <select name="rol" class="form-control" required>
                            <option value="alumno" {{ $usuario->rol == 'alumno' ? 'selected' : '' }}>Alumno</option>
                            <option value="psicologo" {{ $usuario->rol == 'psicologo' ? 'selected' : '' }}>Psicólogo</option>
                            <option value="administrador" {{ $usuario->rol == 'administrador' ? 'selected' : '' }}>Administrador</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning">
                            <i class="fa-solid fa-rotate"></i> Actualizar Información
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>