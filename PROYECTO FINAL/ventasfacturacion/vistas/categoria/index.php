<?php
require_once '../../controladores/CategoriaController.php';
$controller = new CategoriaController();
$categorias = $controller->listarCategorias();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table thead {
            background-color: #343a40;
            color: white;
        }
        .container {
            max-width: 1000px;
            margin-top: 40px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body class="container mt-4">
    <h2>categorías</h2>
    <a href="crear.php" class="btn btn-success mb-3">nueva categoría</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?= $categoria['idcategoria'] ?></td>
                <td><?= $categoria['nomcategoria'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $categoria['idcategoria'] ?>" class="btn btn-warning btn-sm">editar</a>
                    <a href="eliminar.php?id=<?= $categoria['idcategoria'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿seguro de eliminar?')">eliminar</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
