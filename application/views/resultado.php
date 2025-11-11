<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Reservas</title>
</head>
<body>
    <h1>Reservas</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID Reserva</th>
                <th>ID Espectáculo</th>
                <th>Fecha de Reserva</th>
                <th>Cantidad de Entradas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservas as $reserva): ?>
                <tr>
                    <td><?php echo $reserva->id_reserva; ?></td>
                    <td><?php echo $reserva->id_espectaculo; ?></td>
                    <td><?php echo $reserva->fecha_reserva; ?></td>
                    <td><?php echo $reserva->cantidad; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
