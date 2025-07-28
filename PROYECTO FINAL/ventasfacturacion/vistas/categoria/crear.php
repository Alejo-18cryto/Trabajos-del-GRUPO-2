<?php
require_once '../../controladores/CategoriaController.php';
require_once '../../modelos/Categoria.php';

$controller = new CategoriaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nueva = new Categoria($_POST['idcategoria'], $_POST['nomcategoria']);
    $controller->registrarCategoria($nueva);
    header('location: index.php');
    exit;
}
?>

<!doctype html>
<html>
<head>
    <title>Registrar Categorias</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="container mt-4">
    <h2>nueva categoría</h2>
    <form method="post">
        <div class="mb-2">
            <label>id categoría (2 caracteres):</label>
            <input type="text" name="idcategoria" class="form-control" maxlength="2" required>
        </div>
        <div class="mb-2">
            <label>nombre categoría:</label>
            <input type="text" name="nomcategoria" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">guardar</button>
        <a href="index.php" class="btn btn-secondary">cancelar</a>
    </form>
</body>
</html>
