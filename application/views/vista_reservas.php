
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Reservas</title>
    <link rel="stylesheet" href="<?php echo base_url('activos/css/reservas.css'); ?>">
</head>
<body>
    <h1>Mis Reservas</h1>

    <div class="reservas-container">
        <?php if (!empty($reservas)): ?>
            <?php foreach ($reservas as $reserva): ?>
                <div class="reserva-card">
                    <h2>Reserva #<?= $reserva['id_reserva']; ?></h2>
                    <p><strong>Espectáculo:</strong> <?= $reserva['espectaculo_id']; ?></p>
                    <p><strong>Cantidad:</strong> <?= $reserva['cantidad']; ?></p>
                    <p><strong>Fecha:</strong> <?= $reserva['fecha_reserva']; ?></p>
                    <p><strong>Usuario:</strong> <?= $reserva['usuario_id']; ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-reservas">No tienes reservas actualmente.</p>
        <?php endif; ?>
    </div>

     <div class="boton-container">
        <a href="<?= base_url('usuario'); ?>" class="boton">Volver a la vista del usuario</a>
    </div>

    <footer class="footer">
        <p>&copy; <?= date('Y'); ?> Eventos Buenos Aires. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
