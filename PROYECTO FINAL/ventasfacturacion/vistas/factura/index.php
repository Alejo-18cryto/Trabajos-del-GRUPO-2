<?php
require_once '../../controladores/FacturaController.php';
require_once '../../controladores/ClienteControlador.php';

$controller = new FacturaController();
$clienteController = new ClienteControlador();
$clientes = $clienteController->listar();

$idClienteSeleccionado = $_GET['cliente'] ?? '';
$facturas = $idClienteSeleccionado
    ? $controller->obtenerPorCliente($idClienteSeleccionado)
    : $controller->obtenerTodos();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de Facturas</title>
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
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body class="container mt-4">
    <h2>Lista de Facturas</h2>

    <!-- filtro por cliente -->
    <form method="get" class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <select name="cliente" class="form-select" onchange="this.form.submit()">
                    <option value="">-- Filtrar por cliente --</option>
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?= $cliente['idcliente'] ?>" <?= $idClienteSeleccionado == $cliente['idcliente'] ? 'selected' : '' ?>>
                            <?= $cliente['ndociente'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </form>

    <a href="crear.php" class="btn btn-success mb-3">Registrar Ventas</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>ID Cliente</th>
                <th>Fecha Registro</th>
                <th>ID Usuario</th>
                <th>ID Condición</th>
                <th>Valor Venta</th>
                <th>IGV</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($facturas as $p): ?>
            <tr>
                <td><?= $p['idfactura'] ?></td>
                <td><?= $p['fecha'] ?></td>
                <td><?= $p['idcliente'] ?></td>
                <td><?= $p['fechareg'] ?></td>
                <td><?= $p['idusuario'] ?></td>
                <td><?= $p['idcondicion'] ?></td>
                <td><?= $p['valorventa'] ?></td>
                <td><?= $p['igv'] ?></td>
                <td>
                    <a href="ver.php?id=<?= $p['idfactura'] ?>" class="btn btn-info btn-sm">Ver Detalle</a>
                    <a href="editar.php?id=<?= $p['idfactura'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="eliminar.php?id=<?= $p['idfactura'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>