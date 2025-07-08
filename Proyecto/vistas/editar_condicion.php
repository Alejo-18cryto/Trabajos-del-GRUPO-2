<?php
require_once '../clases/Condicionventa.php';
$condicionObj = new Condicionventa();
$condicion = $condicionObj->obtenerPorId($_GET['id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Condición</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
<div class="container">
  <h3 class="mb-4">Editar Condición de Venta</h3>
  <form action="../controladores/editar_condicion.php" method="post" class="bg-white p-4 rounded shadow">
    <input type="hidden" name="idcondicion" value="<?= $condicion['idcondicion'] ?>">
    <div class="mb-3">
      <label for="nomcondicion" class="form-label">Nombre</label>
      <input type="text" name="nomcondicion" class="form-control" value="<?= $condicion['nomcondicion'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="listar_condicion.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
</body>
</html>
