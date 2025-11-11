
<h2>Listado de Clientes</h2>

<?php if (!empty($clientes)): ?>
    <table border="1">
        <tr>
            <th>ID Cliente</th>
            <th>Usuario ID</th>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Teléfono</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= $cliente['id_cliente'] ?></td>
                <td><?= $cliente['usuario_id'] ?></td>
                <td><?= $cliente['nombre'] ?></td>
                <td><?= $cliente['dni'] ?></td>
                <td><?= $cliente['telefono'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p><?= isset($mensaje) ? $mensaje : 'No hay datos disponibles.' ?></p>
<?php endif; ?>
