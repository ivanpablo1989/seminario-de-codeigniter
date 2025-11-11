
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="activos/css/vista_usuario.css">
</head>
<body>

    <!-- Contenido Principal -->
    <main class="usuario-main container-fluid">
        <div class="row justify-content-center align-items-center usuario-contenido">
            <div class="col-12 col-md-6 text-center animate-in">
                
                <img src="<?= base_url('activos/imagenes/usuario.png'); ?>" alt="Bienvenido" class="welcome-img img-fluid" onerror="this.style.display='none'">

                <h1 class="titulo fade-in">Bienvenido Usuario</h1>

                <p class="subtitulo fade-in delay-1">Explorá tus opciones y disfrutá de la experiencia</p>

                <div class="d-flex flex-wrap justify-content-center gap-3 fade-in delay-2">
                    <a href="<?php echo site_url('espectaculos'); ?>" class="btn btn-primary btn-sm btn-efecto">Ver espectáculos</a>
                    <a href="<?= base_url('reservar/listar'); ?>" class="btn btn-success btn-sm btn-efecto">Mis Reservas</a>
                    <a href="<?= base_url('login/logout'); ?>" class="btn btn-danger btn-sm btn-efecto">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
