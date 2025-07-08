<?php
require_once '../clases/Categoria.php';
require_once '../clases/Proveedor.php';
$cats = (new Categoria())->obtenerTodas();
$provs = (new Proveedor())->obtenerTodos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h3 class="mb-4">Registrar Producto</h3>
  <form action="../controladores/registrar_producto.php" method="post" class="p-4 bg-white shadow rounded">
    <!-- campos -->
    <div class="mb-3"><label class="form-label">Nombre</label><input class="form-control" name="nomproducto" required></div>
    <div class="mb-3"><label>Unidad</label><input class="form-control" name="unimed"></div>
    <div class="mb-3"><label>Stock</label><input type="number" class="form-control" name="stock" value="0"></div>
    <div class="mb-3"><label>Costo unitario</label><input type="number" class="form-control" name="cosuni" step="0.0001"></div>
    <div class="mb-3"><label>Precio unitario</label><input type="number" class="form-control" name="preuni" step="0.0001"></div>
    <div class="mb-3"><label>Categoría</label>
      <select class="form-select" name="idcategoria">
        <?php foreach($cats as $c): ?>
          <option value="<?= $c['idcategoria'] ?>"><?= $c['nomcategoria'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="mb-3"><label>Proveedor</label>
      <select class="form-select" name="idproveedor">
        <?php foreach($provs as $p): ?>
          <option value="<?= $p['idproveedor'] ?>"><?= $p['nomproveedor'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <button class="btn btn-success">Registrar</button>
    <a href="listar_productos.php" class="btn btn-secondary">Volver</a>
  </form>
</div>
</body>
</html>
