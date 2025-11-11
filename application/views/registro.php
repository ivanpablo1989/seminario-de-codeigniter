<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <form method="post" action="<?php echo site_url('registrar/registrar_usuario'); ?> "  >
        <label for="nombre_usuario">Email:</label>
        <input type="text" name="nombre_usuario" required><br>

        <label for="palabra_clave">Contraseña:</label>
        <input type="password" name="palabra_clave" required><br>

        <input type="submit" value="Registrar">
    </form>
</body>
</html>
