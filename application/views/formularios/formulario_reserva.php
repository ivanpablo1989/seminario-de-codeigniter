<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Espectáculo</title>
     <link rel="stylesheet" href="<?php echo base_url('activos/css/formulario_reserva.css'); ?>">
</head>
<body>
    <h1>Detalle del Espectáculo</h1>
    
    <p><strong>Nombre:</strong> <?php echo $espectaculo->nombre; ?></p>
    
    <p><strong>Entradas Disponibles:</strong> <?php echo $espectaculo->disponibles; ?></p>

    <h2>Reservar Entradas</h2>
  
    <form method="post" action="<?= site_url('reservar/procesar/' . $espectaculo['id_espectaculo']); ?>" class="formulario-reserva">
        
        <label for="id_espectaculo">ID del Espectáculo:</label>
        <input type="number" id="id_espectaculo" name="id_espectaculo" required><br>

        <label for="cantidad_entradas">Cantidad de Entradas:</label>
        <input type="number" id="cantidad" name="cantidad" required><br>

        <button type="submit">Realizar Reserva</button>
    </form>

</body>
</html>
