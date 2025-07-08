<?php
require_once '../clases/Proveedor.php';
$p = new Proveedor();
$prov = $p->obtenerPorId($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $p->actualizar($_POST['id'], $_POST['nombre'], $_POST['ruc'], $_POST['direccion'], $_POST['telefono'], $_POST['email']);
    header("Location: listar_proveedores.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Proveedor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
  <div class="container">
    <h2 class="text-center mb-4">Editar Proveedor</h2>
    <form method="post">
      <input type="hidden" name="id" value="<?= $prov['idproveedor'] ?>">
      <div class="mb-3"><label>Nombre</label><input type="text" name="nombre" class="form-control" value="<?= $prov['nomproveedor'] ?>"></div>
      <div class="mb-3"><label>RUC</label><input type="text" name="ruc" class="form-control" value="<?= $prov['rucproveedor'] ?>"></div>
      <div class="mb-3"><label>Dirección</label><input type="text" name="direccion" class="form-control" value="<?= $prov['dirproveedor'] ?>"></div>
      <div class="mb-3"><label>Teléfono</label><input type="text" name="telefono" class="form-control" value="<?= $prov['telproveedor'] ?>"></div>
      <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="<?= $prov['emailproveedor'] ?>"></div>
      <button type="submit" class="btn btn-primary">Actualizar</button>
      <a href="listar_proveedores.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html>
