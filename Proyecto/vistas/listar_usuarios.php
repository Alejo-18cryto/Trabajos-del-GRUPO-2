<?php
require_once '../clases/Usuario.php';
$usuarioObj = new Usuario();
$usuarios = $usuarioObj->obtenerUsuarios();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Usuarios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="mb-0">Usuarios Registrados</h2>
      <a href="registro.html" class="btn btn-success">Registrar nuevo usuario</a>
    </div>

    <table class="table table-bordered table-hover table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Usuario</th>
          <th>Apellidos</th>
          <th>Nombres</th>
          <th>Email</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($usuarios as $u): ?>
        <tr>
          <td><?= $u['idusuario'] ?></td>
          <td><?= $u['nomusuario'] ?></td>
          <td><?= $u['apellidos'] ?></td>
          <td><?= $u['nombres'] ?></td>
          <td><?= $u['email'] ?></td>
          <td><?= $u['estado'] ?></td>
          <td>
            <a href="editar_usuario.php?id=<?= $u['idusuario'] ?>" class="btn btn-sm btn-warning">Editar</a>
            <a href="../controladores/eliminar_usuario.php?id=<?= $u['idusuario'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</a>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</body>
</html>
