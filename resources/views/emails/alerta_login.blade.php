<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerta Login</title>
    <style>
        .container {
            font-family:Arial;
            background:#ef4f4f;
            padding:20px;
        }

        .content {
            background: #efff;
            padding:20px;
            border-radius:10px;
        }

        .btn {
            background:blue;
            color:white;
            padding:10px 20px;
            text-decoration:none;
            border-radius:7px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h1>Nuevo inicio de sesión</h1>
            <p>Se ha detectado nueva actividad en la cuenta.</p>

            <a href="{{ route('acceso') }}" class="btn" style="color:white;">
                Verificar inicio de sesión
            </a>

            <p>
                Si no fuiste tú, solicita cambio de contraseña <br>
                al administrador del sistema.
            </p>
        </div>
    </div>
</body>
</html>