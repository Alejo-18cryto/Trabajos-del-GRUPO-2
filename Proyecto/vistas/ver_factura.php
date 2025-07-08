<?php
require '../clases/Factura.php';
$fObj = new Factura();
$fact = $fObj->obtenerPorId($_GET['id']);
$det = $fObj->obtenerDetalle($_GET['id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Detalle Factura <?= $_GET['id'] ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
<div class="container">
  <h3>Factura #<?= $fact['idfactura'] ?></h3>
  <p><strong>Fecha:</strong> <?= $fact['fecha'] ?> &nbsp; | &nbsp; <strong>Cliente:</strong> <?= $fact['nomcliente'] ?> &nbsp; | &nbsp; <strong>Condición:</strong> <?= $fact['nomcondicion'] ?></p>

  <table class="table table-bordered">
    <thead class="table-dark"><tr>
      <th>Producto</th><th>Cant</th><th>Costo</th><th>Precio</th><th>Total</th>
    </tr></thead>
    <tbody>
      <?php foreach ($det as $d): ?>
      <tr>
        <td><?= $d['nomproducto'] ?></td>
        <td><?= $d['cant'] ?></td>
        <td><?= $d['cosuni'] ?></td>
        <td><?= $d['preuni'] ?></td>
        <td><?= $d['cant'] * $d['preuni'] ?></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <a href="listar_facturas.php" class="btn btn-secondary">Volver</a>
</div>
</body>
</html>
