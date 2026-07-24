<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>

<body>
    <h1>Clientes</h1>
    <p><a href="<?= site_url('clients/add') ?>">Agregar cliente</a></p>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($clients)) : ?>
                <tr>
                    <td colspan="4">No hay clientes registrados.</td>
                </tr>
            <?php else : ?>
                <?php foreach ($clients as $row) : ?>
                    <tr>
                        <td><?= esc($row['id']) ?></td>
                        <td><?= esc($row['nombre']) ?></td>
                        <td><?= esc($row['apellido']) ?></td>
                        <td>
                            <a href="<?= site_url('clients/edit/' . $row['id']) ?>">Editar</a>
                            |
                            <a href="<?= site_url('clients/delete/' . $row['id']) ?>" onclick="return confirm('¿Eliminar este cliente?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>