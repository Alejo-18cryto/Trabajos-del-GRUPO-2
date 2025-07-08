<?php
require_once '../clases/Condicionventa.php';
$condicionObj = new Condicionventa();
$condiciones = $condicionObj->obtenerTodas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Condiciones de Venta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
<div class="container">
  <h3 class="mb-4">Lista de Condiciones de Venta</h3>
  <a href="registro_condicion.php" class="btn btn-success mb-3">Registrar Nueva Condición</a>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nombre de Condición</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($condiciones as $c): ?>
      <tr>
        <td><?= $c['idcondicion'] ?></td>
        <td><?= $c['nomcondicion'] ?></td>
        <td>
          <a href="editar_condicion.php?id=<?= $c['idcondicion'] ?>" class="btn btn-sm btn-warning">Editar</a>
          <a href="../controladores/eliminar_condicion.php?id=<?= $c['idcondicion'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Deseas eliminar esta condición?')">Eliminar</a>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
</body>
</html>
