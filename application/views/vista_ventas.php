
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link rel="stylesheet" href="<?php echo base_url('activos/css/vista_ventas.css'); ?>">
</head>
<body>
    <main class="contenido">
        <h1 class="titulo">Ventas</h1>

        <section class="tarjetas-container">
            <?php foreach ($ventas as $venta): ?>
                <div class="tarjeta">
                    <h2>#<?= $venta['id_venta'] ?></h2>
                    <p><span> Espectáculo:</span> <?= $venta['espectaculo_id'] ?></p>
                    <p><span> Total:</span> $<?= $venta['monto_total'] ?></p>
                    <p><span> Fecha:</span> <?= $venta['fecha_venta'] ?></p>
                </div>
            <?php endforeach; ?>
        </section>

        <div class="acciones">
             <a href="<?= base_url('administrador'); ?>" class="boton">Ir a la vista Administrador</a>
            <a href="<?= base_url('login/logout'); ?>" class="boton">Cerrar sesión</a>
        </div>
    </main>
</body>
</html>
