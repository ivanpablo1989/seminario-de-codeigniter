
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="<?php echo base_url('activos/css/formularios/formulario_registro.css'); ?>">
</head>
<body>
    <div class="registration-container">
        <h1>Registro de Usuario</h1>
        <form method="post" action="<?php echo site_url('registrar/registrar_usuario'); ?>">
            <?php if (isset($error)): ?>
                <div class="alert"><?php echo $error; ?></div>
            <?php endif; ?>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" required>
            </div>

            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" name="dni" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" required>
            </div>

            <div class="form-group">
                <label for="nombre_usuario">Email:</label>
                <input type="email" name="nombre_usuario" required>
            </div>

            <div class="form-group">
                <label for="palabra_clave">Contraseña:</label>
                <input type="password" name="palabra_clave" required>
            </div>

            <input type="submit" class="button" value="Registrar">
        </form>

        <a href="<?php echo site_url('principio/index'); ?>" class="button back">Volver al inicio</a>
    </div>
</body>
</html>
