<?php
require_once __DIR__ . '/../../controladores/UsuarioController.php';
require_once __DIR__ . '/../../modelos/Usuario.php';

$controller = new UsuarioController();
$datos = $controller->obtenerPorId($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = new Usuario($_POST['idusuario'], $_POST['nomusuario'], $_POST['password'], $_POST['apellidos'], $_POST['nombres'], $_POST['email'], $_POST['estado']);
    $controller->actualizar($usuario);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="mb-4">Editar Usuario</h2>
        <form method="post">
            <input type="hidden" name="idusuario" value="<?= $datos['idusuario'] ?>">

            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" name="nomusuario" class="form-control" value="<?= $datos['nomusuario'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" name="password" class="form-control" value="<?= $datos['password'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input type="text" name="apellidos" class="form-control" value="<?= $datos['apellidos'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Nombres</label>
                <input type="text" name="nombres" class="form-control" value="<?= $datos['nombres'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $datos['email'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Estado</label>
                <input type="text" name="estado" class="form-control" value="<?= $datos['estado'] ?>">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
</body>
</html>
