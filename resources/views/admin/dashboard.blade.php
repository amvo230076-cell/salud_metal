<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de administrador</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    @include('partials.alerts')

    <h1>PANEL DE ADMINISTRADOR</h1>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Usuarios</h1>
        
        <div class="d-flex gap-2">
            <a href="{{ route('usuarios.create') }}" class="btn btn-info">
                <i class="fa-solid fa-plus"></i> Crear Usuario
            </a>
            
            <a href="{{ route('recursos') }}" class="btn btn-secondary">
                <i class="fa-solid fa-book"></i> Recursos
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
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->usuario }}</td>
                <td>{{ $usuario->rol }}</td>
                <td class="d-flex gap-2">
                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    
                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</body>
</html>