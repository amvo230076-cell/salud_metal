@if(session('success'))
    <div id="alert" class="alert alert-success alert-dismissible d-flex align-items-center fade show">
        <i class="fa-solid fa-circle-check"></i>
        <strong class="mx-2"> ¡Éxito!</strong>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

    <script>
        setTimeout(function() {
            // Declarar variable para obtener el elemento de alerta
            let alerta = document.getElementById('alert');

            // validar si la alerta existe
            if(alerta) {
                // Quitar la clase show del listado de clases del elemento
                alerta.classList.remove('show');
                // Agregar animacion
                alerta.classList.add('fade');
                // Eliminar el elemento del documento (DOM)
                setTimeout(() => alerta.remove(), 500);
            }
        }, 3000);
    </script>
@endif
@if(session('error'))
    <div id="alert-error" class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
        <i class="fa-solid fa-circle-xmark"></i>
        <strong class="mx-2">¡Error!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

    <script>
        setTimeout(function() {
            // Declarar variable para obtener el elemento de alerta
            let alerta = document.getElementById('alert-error');

            // validar si la alerta existe
            if(alerta) {
                // Quitar la clase show del listado de clases del elemento
                alerta.classList.remove('show');
                // Agregar animacion
                alerta.classList.add('fade');
                // Eliminar el elemento del documento (DOM)
                setTimeout(() => alerta.remove(), 500);
            }
        }, 3000);
    </script>
@endif

@if(session('warning'))
    <div id="alert-warning" class="alert alert-warning alert-dismissible d-flex align-items-center fade show">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <strong class="mx-2">¡Aviso!</strong> {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

    <script>
        setTimeout(function() {
            // Declarar variable para obtener el elemento de alerta
            let alerta = document.getElementById('alert-warning');

            // validar si la alerta existe
            if(alerta) {
                // Quitar la clase show del listado de clases del elemento
                alerta.classList.remove('show');
                // Agregar animacion
                alerta.classList.add('fade');
                // Eliminar el elemento del documento (DOM)
                setTimeout(() => alerta.remove(), 500);
            }
        }, 3000);
    </script>
@endif