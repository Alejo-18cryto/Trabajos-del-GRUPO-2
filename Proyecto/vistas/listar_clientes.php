<?php
require_once '../clases/Cliente.php';
$cliente = new Cliente();
$clientes = $cliente->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Clientes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2>Listado de Clientes</h2>
      <a href="registro_cliente.php" class="btn btn-success">Nuevo Cliente</a>
    </div>
    <table class="table table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th><th>Nombre</th><th>RUC</th><th>Dirección</th><th>Teléfono</th><th>Email</th><th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clientes as $c): ?>
        <tr>
          <td><?= $c['idcliente'] ?></td>
          <td><?= $c['nomcliente'] ?></td>
          <td><?= $c['ruccliente'] ?></td>
          <td><?= $c['dircliente'] ?></td>
          <td><?= $c['telcliente'] ?></td>
          <td><?= $c['emailcliente'] ?></td>
          <td>
            <a href="editar_cliente.php?id=<?= $c['idcliente'] ?>" class="btn btn-warning btn-sm">Editar</a>
            <a href="../controladores/eliminar_cliente.php?id=<?= $c['idcliente'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar cliente?')">Eliminar</a>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</body>
</html>
