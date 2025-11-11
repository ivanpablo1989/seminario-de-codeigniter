
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $espectaculo['nombre']; ?></title>
    <link rel="stylesheet" href="<?= base_url('activos/css/espectaculos/espectaculo_sin_loguear.css'); ?>">
</head>
<body>
    <div class="page-wrapper">
        <header class="header">
            <h1 class="titulo"><?= $espectaculo['nombre']; ?></h1>
        </header>

        <main class="contenido">
            <section class="descripcion">
                <h2>Descripción</h2>
                <p><?= $espectaculo['descripcion']; ?></p>
            </section>

            <section class="imagen">
                <img src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']) ?>" alt="<?= $espectaculo['nombre'] ?>" class="imagen-espectaculo">
            </section>

            <section class="detalles">
                <h2>Detalles del Evento</h2>
                <ul>
                    <li><strong>Fecha:</strong> <?= $espectaculo['fecha']; ?></li>
                    <li><strong>Hora:</strong> <?= $espectaculo['hora']; ?></li>
                    <li><strong>Dirección:</strong> <?= $espectaculo['direccion']; ?></li>
                </ul>
            </section>

            <section class="informacion">
                <h2>Información de Entradas</h2>
                <p class="entradas">Entradas disponibles: <strong><?= $espectaculo['disponibles']; ?></strong></p>

                <?php if (!empty($mensaje)): ?>
                    <p class="mensaje"><?= $mensaje; ?></p>
                <?php endif; ?>

                <?php if ($espectaculo['disponibles'] > 0): ?>
                    <p class="estado disponible"> ¡Todavía hay lugares disponibles!</p>
                <?php else: ?>
                    <p class="estado agotado"> Entradas agotadas.</p>
                <?php endif; ?>
            </section>

            <section class="reserva-login">
                <p class="aviso-login"> Para reservar entradas, primero debes iniciar sesión.</p>
                <a href="<?= site_url('login') ?>" class="boton-login">Iniciar sesión</a>
            </section>

            <div class="boton-inicio-container">
                <a href="<?= site_url('principio') ?>" class="boton-inicio"> Volver al inicio</a>
            </div>
        </main>
    </div>
</body>
</html>
