<?php
require_once '../../controladores/ClienteControlador.php';
$controlador = new ClienteControlador();
$clientes = $controlador->listar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Listado de Clientes</title>
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
<body>
    <div class="container">
        <h1>Clientes Registrados</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="crear.php" class="btn btn-success">+ Nuevo Cliente</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Documento</th>
                    <th>RUC</th>
                    <th>Tipo ID</th>
                    <th>Tipo Cliente</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cli): ?>
                    <tr>
                        <td><?= $cli['idcliente'] ?></td>
                        <td><?= htmlspecialchars($cli['ndociente']) ?></td>
                        <td><?= htmlspecialchars($cli['ruccliente']) ?></td>
                        <td><?= htmlspecialchars($cli['tidentite']) ?></td>
                        <td><?= htmlspecialchars($cli['tcliente']) ?></td>
                        <td><?= htmlspecialchars($cli['emailcliente']) ?></td>
                        <td>
                            <a href="editar.php?id=<?= $cli['idcliente'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar.php?id=<?= $cli['idcliente'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar este cliente?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>