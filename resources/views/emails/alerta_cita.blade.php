<!DOCTYPE html>
<html>
<head>
    <style>
        .container { font-family: Arial; background: #4a90e2; padding: 20px; }
        .content { background: white; padding: 20px; border-radius: 10px; }
        .info { margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h1>¡Hola! Tienes una nueva cita</h1>
            <p>El psicólogo <strong>{{ $psicologo }}</strong> ha agendado una sesión contigo.</p>
            
            <div class="info"><strong>Fecha:</strong> {{ $cita->fecha }}</div>
            <div class="info"><strong>Motivo:</strong> {{ $cita->motivo }}</div>

            <p>Te recomendamos estar puntual en la plataforma.</p>
        </div>
    </div>
</body>
</html>