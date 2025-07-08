<?php
require '../clases/Producto.php';
$prods = (new Producto())->obtenerTodos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Productos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Productos</h3>
    <a href="registro_producto.php" class="btn btn-primary">Nuevo Producto</a>
  </div>
  <table class="table table-striped table-bordered">
    <thead class="table-dark"><tr>
      <th>ID</th><th>Nombre</th><th>Unidad</th><th>Stock</th><th>Costo</th><th>Precio</th>
      <th>Categoría</th><th>Proveedor</th><th>Estado</th><th>Acciones</th>
    </tr></thead>
    <tbody>
      <?php foreach($prods as $p): ?>
      <tr>
        <td><?= $p['idproducto'] ?></td>
        <td><?= $p['nomproducto'] ?></td>
        <td><?= $p['unimed'] ?></td>
        <td><?= $p['stock'] ?></td>
        <td><?= $p['cosuni'] ?></td>
        <td><?= $p['preuni'] ?></td>
        <td><?= $p['nomcategoria'] ?></td>
        <td><?= $p['nomproveedor'] ?></td>
        <td><?= $p['estado'] ?></td>
        <td>
          <a href="editar_productos.php?id=<?= $p['idproducto'] ?>" class="btn btn-sm btn-warning">Editar</a>
          <a href="../controladores/eliminar_producto.php?id=<?= $p['idproducto'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</a>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
</body>
</html>
