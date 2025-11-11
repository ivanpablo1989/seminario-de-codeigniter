
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('activos/css/vista_administrador.css'); ?>">
</head>
<body>
    <header class="header">
     <h1>Bienvenido, Administrador</h1>   
    <img src="<?= base_url('activos/imagenes/usuario.png'); ?>" alt="Logo" class="logo">
</header>

<main class="main-content">
    <section class="botones-container">
        <a href="<?= base_url('espectaculos/index_administrador'); ?>" class="boton"> Espectaculos</a>
        <a href="<?= base_url('ventas/listar_ventas'); ?>" class="boton"> Ventas</a>
        <a href="<?= base_url('clientes/mostrar_clientes'); ?>" class="boton"> Clientes</a>
        <a href="<?= base_url('espectaculos/crear'); ?>" class="boton"> Agregar Espectaculo</a>
        <a href="<?= site_url('login/logout'); ?>" class="boton cerrar"> Cerrar Sesión</a>
    </section>
</main>

</body>
</html>
