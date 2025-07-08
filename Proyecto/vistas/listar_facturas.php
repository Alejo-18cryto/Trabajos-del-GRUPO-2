<?php
require '../clases/Factura.php';
$fac = (new Factura())->obtenerTodas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Facturas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
<div class="container">
  <div class="d-flex justify-content-between mb-3">
    <h3>Facturas</h3>
    <a href="registro_factura.php" class="btn btn-primary">Nueva Factura</a>
  </div>
  <table class="table table-striped table-bordered">
    <thead class="table-dark"><tr>
      <th>ID</th><th>Fecha</th><th>Cliente</th><th>Usuario</th><th>Condición</th><th>Valor</th><th>IGV</th><th>Acciones</th>
    </tr></thead>
    <tbody>
      <?php foreach ($fac as $f): ?>
      <tr>
        <td><?= $f['idfactura'] ?></td>
        <td><?= $f['fecha'] ?></td>
        <td><?= $f['nomcliente'] ?></td>
        <td><?= $f['nomusuario'] ?></td>
        <td><?= $f['nomcondicion'] ?></td>
        <td><?= $f['valorventa'] ?></td>
        <td><?= $f['igv'] ?></td>
        <td>
          <a href="ver_factura.php?id=<?= $f['idfactura'] ?>" class="btn btn-sm btn-info">Ver</a>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
</body>
</html>
