<?php
require '../clases/Categoria.php';
$cats = (new Categoria())->obtenerTodas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Categorías</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Categorías Registradas</h3>
    <a href="registro_categoria.php" class="btn btn-primary">Nueva Categoría</a>
  </div>
  <table class="table table-striped table-bordered">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nombre de Categoría</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($cats as $c): ?>
      <tr>
        <td><?= $c['idcategoria'] ?></td>
        <td><?= $c['nomcategoria'] ?></td>
        <td>
          <a href="editar_categoria.php?id=<?= $c['idcategoria'] ?>" class="btn btn-sm btn-warning">Editar</a>
          <a href="../controladores/eliminar_categoria.php?id=<?= $c['idcategoria'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta categoría?')">Eliminar</a>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

</body>
</html>
