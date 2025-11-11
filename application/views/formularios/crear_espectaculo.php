
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Espectáculo</title>
    <link rel="stylesheet" href="<?= base_url('activos/css/formularios/crear_espectaculo.css'); ?>">
</head>
<body>
    <main>
        <div class="form-container">
            <h2>Nuevo Espectáculo</h2>

            <?php if ($this->session->flashdata('mensaje')): ?>
                <p class="mensaje"><?= $this->session->flashdata('mensaje'); ?></p>
            <?php endif; ?>

            <?= form_open_multipart('espectaculos/guardar'); ?>

                <label for="nombre">Título:</label>
                <input type="text" name="nombre" id="nombre" required>

                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" required></textarea>

                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" min="<?= date('Y-m-d'); ?>" required>

                <label for="hora">Hora:</label>
                <input type="time" name="hora" id="hora" required>

                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" step="0.01" required>

                <label for="disponibles">Entradas disponibles:</label>
                <input type="number" name="disponibles" id="disponibles" required>

                <label for="imagen">Imagen del espectáculo:</label>
                <input type="file" name="imagen" id="imagen" accept="image/*">

                <div class="botones-finales">
                    <button type="submit" class="boton-agregar">Agregar</button>
                    <a href="<?= site_url('administrador'); ?>" class="boton-volver">Volver al listado</a>
                </div>

            </form>
        </div>
    </main>
</body>
</html>
