<?php
require_once '../clases/Producto.php';
require_once '../clases/Categoria.php';
require_once '../clases/Proveedor.php';
$pObj=new Producto(); $catObj=new Categoria(); $provObj=new Proveedor();
$prod = $pObj->obtenerPorId($_GET['id']);
$cats = $catObj->obtenerTodas(); $provs = $provObj->obtenerTodos();

if($_POST){
  $pObj->actualizar($_POST['idproducto'], $_POST['nomproducto'], $_POST['unimed'], $_POST['stock'], $_POST['cosuni'], $_POST['preuni'], $_POST['idcategoria'], $_POST['idproveedor'], $_POST['estado']);
  header("Location:listar_productos.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h3 class="mb-4">Editar Producto</h3>
  <form method="post" class="p-4 bg-white shadow rounded">
    <input type="hidden" name="idproducto" value="<?= $prod['idproducto'] ?>">
    <div class="mb-3"><label>Nombre</label><input class="form-control" name="nomproducto" value="<?= $prod['nomproducto'] ?>" required></div>
    <div class="mb-3"><label>Unidad</label><input class="form-control" name="unimed" value="<?= $prod['unimed'] ?>"></div>
    <div class="mb-3"><label>Stock</label><input type="number" class="form-control" name="stock" value="<?= $prod['stock'] ?>"></div>
    <div class="mb-3"><label>Costo unitario</label><input type="number" step="0.0001" class="form-control" name="cosuni" value="<?= $prod['cosuni'] ?>"></div>
    <div class="mb-3"><label>Precio unitario</label><input type="number" step="0.0001" class="form-control" name="preuni" value="<?= $prod['preuni'] ?>"></div>
    <div class="mb-3"><label>Categoría</label>
      <select name="idcategoria" class="form-select">
        <?php foreach($cats as $c): ?>
        <option value="<?= $c['idcategoria'] ?>" <?= $prod['idcategoria']==$c['idcategoria']?'selected':'' ?>><?= $c['nomcategoria'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="mb-3"><label>Proveedor</label>
      <select name="idproveedor" class="form-select">
        <?php foreach($provs as $p): ?>
        <option value="<?= $p['idproveedor'] ?>" <?= $prod['idproveedor']==$p['idproveedor']?'selected':'' ?>><?= $p['nomproveedor'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="mb-3"><label>Estado</label>
      <select name="estado" class="form-select">
        <option value="A" <?= $prod['estado']=='A'?'selected':'' ?>>Activo</option>
        <option value="I" <?= $prod['estado']=='I'?'selected':'' ?>>Inactivo</option>
      </select>
    </div>
    <button class="btn btn-primary">Guardar</button>
    <a href="listar_productos.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
</body>
</html>
