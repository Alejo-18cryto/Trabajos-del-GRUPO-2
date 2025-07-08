<?php
require '../clases/Categoria.php';
$o = new Categoria();
$cat = $o->obtenerPorId($_GET['id']);

if ($_POST) {
  $o->actualizar($_POST['idcategoria'], $_POST['nomcategoria']);
  header("Location: listar_categorias.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Categoría</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h3 class="mb-4">Editar Categoría</h3>
  <form method="post" class="shadow p-4 bg-white rounded">
    <input type="hidden" name="idcategoria" value="<?= $cat['idcategoria'] ?>">
    <div class="mb-3">
      <label class="form-label">Nombre de la Categoría</label>
      <input type="text" class="form-control" name="nomcategoria" value="<?= $cat['nomcategoria'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    <a href="listar_categorias.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>

</body>
</html>
