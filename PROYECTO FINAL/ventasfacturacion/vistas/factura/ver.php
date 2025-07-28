<?php
require_once '../../controladores/FacturaController.php';
require_once '../../config/conexion.php';

if (!isset($_GET['id'])) {
    header('location: index.php');
    exit;
}

$idfactura = $_GET['id'];
$conexion = Conexion::conectar();

// Obtener datos generales de la factura
$stmt = $conexion->prepare("
    select f.*, 
           c.ndociente as cliente, 
           u.nomusuario as usuario, 
           co.nomcondicion as condicion
    from facturas f
    inner join clientes c on f.idcliente = c.idcliente
    inner join usuarios u on f.idusuario = u.idusuario
    inner join condicion_venta co on f.idcondicion = co.idcondicion
    where f.idfactura = ?
");
$stmt->execute([$idfactura]);
$factura = $stmt->fetch(PDO::FETCH_ASSOC);

// Obtener detalle de productos vendidos
$stmtDetalle = $conexion->prepare("
    select df.*, p.nomproducto 
    from detalle_factura df
    inner join productos p on df.idproducto = p.idproducto
    where df.idfactura = ?
");
$stmtDetalle->execute([$idfactura]);
$detalles = $stmtDetalle->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Factura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .factura-card {
            max-width: 800px;
            margin: auto;
            margin-top: 40px;
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .titulo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #343a40;
        }
        .factura-info p {
            margin: 2px 0;
        }
        .tabla-productos th, .tabla-productos td {
            text-align: center;
        }
        .btn-volver {
            display: block;
            margin: auto;
            margin-top: 25px;
        }
    </style>
</head>
<body>

<div class="factura-card">
    <div class="titulo">🧾 Detalle de la Factura #<?= $factura['idfactura'] ?></div>

    <div class="row factura-info mb-4">
        <div class="col-md-6">
            <p><strong>📅 Fecha de Emisión:</strong> <?= $factura['fecha'] ?></p>
            <p><strong>📂 Fecha de Registro:</strong> <?= $factura['fechareg'] ?></p>
            <p><strong>💳 Condición de Venta:</strong> <?= $factura['condicion'] ?></p>
        </div>
        <div class="col-md-6">
            <p><strong>👤 Cliente:</strong> <?= $factura['cliente'] ?></p>
            <p><strong>🧑 Usuario Responsable:</strong> <?= $factura['usuario'] ?></p>
            <p><strong>🧾 IGV:</strong> S/ <?= number_format($factura['igv'], 2) ?></p>
            <p><strong>💰 Valor de Venta:</strong> S/ <?= number_format($factura['valorventa'], 2) ?></p>
        </div>
    </div>

    <h5 class="mb-3">🛒 Productos Vendidos:</h5>
    <table class="table table-bordered table-hover tabla-productos">
        <thead class="table-dark">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalles as $detalle): ?>
                <tr>
                    <td><?= $detalle['nomproducto'] ?></td>
                    <td><?= $detalle['cant'] ?></td>
                    <td>S/ <?= number_format($detalle['preuni'], 2) ?></td>
                    <td>S/ <?= number_format($detalle['cant'] * $detalle['preuni'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="index.php" class="btn btn-secondary btn-volver">🔙 Volver</a>
</div>

</body>
</html>