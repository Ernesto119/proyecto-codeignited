<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cliente</title>
</head>

<body>
    <h1>Agregar Cliente</h1>
    <form action="<?= site_url('clients/store') ?>" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" required>

        <button type="submit">Guardar</button>
        <a href="<?= site_url('clients') ?>">Cancelar</a>
    </form>
</body>

</html>