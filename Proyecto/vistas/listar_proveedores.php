<?php
require_once '../clases/Proveedor.php';
$p = new Proveedor();
$proveedores = $p->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Proveedores</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
  <div class="container">
    <div class="d-flex justify-content-between mb-3">
      <h2>Proveedores Registrados</h2>
      <a href="registro_proveedor.php" class="btn btn-success">Nuevo Proveedor</a>
    </div>
    <table class="table table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th><th>Nombre</th><th>RUC</th><th>Dirección</th><th>Teléfono</th><th>Email</th><th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($proveedores as $prov): ?>
        <tr>
          <td><?= $prov['idproveedor'] ?></td>
          <td><?= $prov['nomproveedor'] ?></td>
          <td><?= $prov['rucproveedor'] ?></td>
          <td><?= $prov['dirproveedor'] ?></td>
          <td><?= $prov['telproveedor'] ?></td>
          <td><?= $prov['emailproveedor'] ?></td>
          <td>
            <a href="editar_proveedor.php?id=<?= $prov['idproveedor'] ?>" class="btn btn-sm btn-warning">Editar</a>
            <a href="../controladores/eliminar_proveedor.php?id=<?= $prov['idproveedor'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar proveedor?')">Eliminar</a>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</body>
</html>
