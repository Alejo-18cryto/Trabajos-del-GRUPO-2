<?php
require_once '../../controladores/ProveedorController.php';
$controller = new ProveedorController();
$proveedores = $controller->listarProveedores();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de Proveedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table thead {
            background-color: #343a40;
            color: white;
        }
        .container {
            max-width: 1000px;
            margin-top: 40px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body class="container mt-4">
    <h2>lista de proveedores</h2>
    <a href="crear.php" class="btn btn-success mb-2">nuevo proveedor</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>ruc</th>
                <th>dirección</th>
                <th>teléfono</th>
                <th>email</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proveedores as $p): ?>
            <tr>
                <td><?= $p['idproveedor'] ?></td>
                <td><?= $p['nomproveedor'] ?></td>
                <td><?= $p['rucproveedor'] ?></td>
                <td><?= $p['dirproveedor'] ?></td>
                <td><?= $p['telproveedor'] ?></td>
                <td><?= $p['emailproveedor'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $p['idproveedor'] ?>" class="btn btn-warning btn-sm">editar</a>
                    <a href="eliminar.php?id=<?= $p['idproveedor'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿deseas eliminar este proveedor?')">eliminar</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
