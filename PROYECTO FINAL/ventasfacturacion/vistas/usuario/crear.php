<?php
require_once __DIR__ . '/../../controladores/UsuarioController.php';
require_once __DIR__ . '/../../modelos/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = new Usuario(null, $_POST['nomusuario'], $_POST['password'], $_POST['apellidos'], $_POST['nombres'], $_POST['email'], $_POST['estado']);
    $controller = new UsuarioController();
    $controller->crear($usuario);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Crear Usuario</h2>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label for="nomusuario" class="form-label">Usuario</label>
                    <input type="text" name="nomusuario" id="nomusuario" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input type="text" name="nombres" id="nombres" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <input type="text" name="estado" id="estado" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>