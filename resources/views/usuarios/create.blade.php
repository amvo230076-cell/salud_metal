<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO DE USUARIO - ADMIN</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Registrar Nuevo Usuario</h1>
            <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Volver
            </a>
        </div>

        @include('partials.alerts')

        <div class="card shadow">
            <div class="card-body">
                <form method="POST" action="{{ route('usuarios.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nombre Completo:</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ej. Juan Pérez" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre de Usuario:</label>
                        <input type="text" name="usuario" class="form-control" placeholder="Usuario123" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Correo Electrónico:</label>
                        <input type="email" name="mail" class="form-control" placeholder="example@gmail.com" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contraseña:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rol del Sistema:</label>
                        <select name="rol" class="form-control" required>
                            <option value="alumno">Alumno</option>
                            <option value="psicologo">Psicólogo</option>
                            <option value="administrador">Administrador</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-floppy-disk"></i> Guardar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>