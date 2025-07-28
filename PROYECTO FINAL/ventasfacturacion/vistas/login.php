<?php
session_start();
require_once __DIR__ . '/../controladores/UsuarioController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuarioController = new UsuarioController();
    $usuario = $usuarioController->verificarLogin($_POST['nomusuario'], $_POST['password']);

    if ($usuario) {
        $_SESSION['usuario'] = $usuario['nomusuario'];
        $_SESSION['idusuario'] = $usuario['idusuario'];
        $_SESSION['nombres'] = $usuario['nombres'];
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
        }

        .login-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 30px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        .login-title {
            text-align: center;
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-login {
            width: 100%;
        }

        .btn-register {
            width: 100%;
            margin-top: 10px;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2 class="login-title">Iniciar Sesión</h2>

    <?php if (isset($error)): ?>
        <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="">
        <div class="mb-3">
            <label for="nomusuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="nomusuario" name="nomusuario" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary btn-login">Ingresar</button>
    </form>

    <a href="registro.php" class="btn btn-secondary btn-register">Registrarme</a>

</div>

</body>
</html>
