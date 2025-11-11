
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="<?php echo base_url('activos/css/formularios/formulario_login.css'); ?>">
</head>

<body>
    <!-- Capa de fondo dinámica -->
    <div class="background-layer"></div>

    <main class="login-container">
        <form method="post" action="<?php echo site_url('login/autenticar'); ?>" class="login-form">
            <h2 class="text-center mb-4">Iniciar Sesión</h2>

            <div class="mb-3">
                <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
                <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="palabra_clave" class="form-label">Contraseña</label>
                <input type="password" name="palabra_clave" id="palabra_clave" class="form-control" required>
            </div>

            <div class="d-grid">
                <input type="submit" value="Login" class="btn btn-primary">
            </div>
        </form>

        <div class="text-center mt-3">
            <a href="<?php echo site_url('principio/index'); ?>" class="btn btn-secondary">Volver al inicio</a>
        </div>
    </main>

</body>
</html>
