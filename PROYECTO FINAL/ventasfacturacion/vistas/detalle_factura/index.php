<?php
require_once '../../controladores/DetalleFacturaController.php';
require_once '../../config/conexion.php';

$conexion = Conexion::conectar();
$controller = new DetalleFacturaController();

// obtener productos para el filtro
$productosStmt = $conexion->query("SELECT idproducto, nomproducto FROM productos");
$productos = $productosStmt->fetchAll(PDO::FETCH_ASSOC);

// capturar filtro
$idProducto = isset($_GET['idproducto']) ? $_GET['idproducto'] : null;

// obtener detalles
$detalles = $controller->obtenerTodos($idProducto);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Facturas</title>
    <link rel="stylesheet" href="../../assets/bootstrap.min.css">
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
<body>
<div class="container my-5">
    <div class="card p-4">
        <h2 class="mb-4 text-center">Detalle de Facturas</h2>

        <form method="get" class="row g-3 mb-4 align-items-end">
            <div class="col-md-6">
                <label for="idproducto" class="form-label">Filtrar por producto:</label>
                <select name="idproducto" id="idproducto" class="form-select">
                    <option value="">-- Todos --</option>
                    <?php foreach ($productos as $producto): ?>
                        <option value="<?= $producto['idproducto'] ?>" <?= ($idProducto == $producto['idproducto']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($producto['nomproducto']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>ID Detalle</th>
                    <th>Factura</th>
                    <th>Fecha</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Costo Unitario</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php if (count($detalles) > 0): ?>
                    <?php foreach ($detalles as $detalle): ?>
                        <tr>
                            <td><?= $detalle['iddetalle'] ?></td>
                            <td><?= $detalle['idfactura'] ?></td>
                            <td><?= $detalle['fecha_factura'] ?></td>
                            <td><?= htmlspecialchars($detalle['nomproducto']) ?></td>
                            <td><?= $detalle['cant'] ?></td>
                            <td>S/ <?= number_format($detalle['cosuni'], 2) ?></td>
                            <td>S/ <?= number_format($detalle['preuni'], 2) ?></td>
                            <td><strong>S/ <?= number_format($detalle['preuni'] * $detalle['cant'], 2) ?></strong></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted">No se encontraron resultados para el producto seleccionado.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>