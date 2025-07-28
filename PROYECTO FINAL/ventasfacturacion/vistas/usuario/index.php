<?php
require_once __DIR__ . '/../../controladores/UsuarioController.php';

$controller = new UsuarioController();
$usuarios = $controller->listar();

if (isset($_GET['eliminar'])) {
    $controller->eliminar($_GET['eliminar']);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Listado de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">Listado de Usuarios</h2>
            <a href="crear.php" class="btn btn-success">+ Nuevo Usuario</a>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle bg-white">
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
                        <td>
                            <span class="badge bg-<?= $u['estado'] === 'activo' ? 'success' : 'secondary' ?>">
                                <?= ucfirst($u['estado']) ?>
                            </span>
                        </td>
                        <td>
                            <a href="editar.php?id=<?= $u['idusuario'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="index.php?eliminar=<?= $u['idusuario'] ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('¿Eliminar usuario?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>