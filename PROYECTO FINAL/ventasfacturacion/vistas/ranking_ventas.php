<?php
require_once '../config/conexion.php';

$conexion = Conexion::conectar();

$sql = "SELECT
            f.idfactura,
            f.fecha,
            c.ndociente AS cliente,
            f.valorventa AS total_venta
        FROM
            facturas f
        JOIN
            clientes c ON f.idcliente = c.idcliente
        ORDER BY
            total_venta DESC";


$stmt = $conexion->prepare($sql);
$stmt->execute();
$ranking = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ranking de Ventas</title>
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
            max-width: 1100px;
            margin-top: 40px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card p-4">
        <h2 class="text-center mb-4">Ranking de Ventas por Importe</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Factura</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Total Venta (S/)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($ranking) > 0): ?>
                        <?php $i = 1; foreach ($ranking as $venta): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $venta['idfactura'] ?></td>
                                <td><?= $venta['fecha'] ?></td>
                                <td><?= htmlspecialchars($venta['cliente']) ?></td>
                                <td><strong>S/ <?= number_format($venta['total_venta'], 2) ?></strong></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-muted text-center">No hay ventas registradas.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
