<?php
require_once '../clases/Usuario.php';
$usuarioObj = new Usuario();

if (isset($_GET['id'])) {
  $datos = $usuarioObj->obtenerPorId($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $usuarioObj->actualizar($_POST['idusuario'], $_POST['nomusuario'], $_POST['apellidos'], $_POST['nombres'], $_POST['email'], $_POST['estado']);
  header("Location: listar_usuarios.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Usuario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
  <div class="container">
    <h2 class="text-center mb-4">Editar Usuario</h2>
    <form method="post">
      <input type="hidden" name="idusuario" value="<?= $datos['idusuario'] ?>">
      <div class="mb-3">
        <label class="form-label">Usuario</label>
        <input type="text" name="nomusuario" class="form-control" value="<?= $datos['nomusuario'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Apellidos</label>
        <input type="text" name="apellidos" class="form-control" value="<?= $datos['apellidos'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Nombres</label>
        <input type="text" name="nombres" class="form-control" value="<?= $datos['nombres'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?= $datos['email'] ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Estado</label>
        <select name="estado" class="form-select">
          <option value="activo" <?= $datos['estado'] === 'activo' ? 'selected' : '' ?>>Activo</option>
          <option value="inactivo" <?= $datos['estado'] === 'inactivo' ? 'selected' : '' ?>>Inactivo</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success">Guardar Cambios</button>
      <a href="listar_usuarios.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html>
