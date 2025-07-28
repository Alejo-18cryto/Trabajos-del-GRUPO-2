<?php
require_once '../../controladores/CategoriaController.php';
require_once '../../modelos/Categoria.php';

$controller = new CategoriaController();
$id = $_GET['id'];
$categoria = $controller->obtenerCategoria($id);

if (!$categoria) {
    echo "categoría no encontrada";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoriaObj = new Categoria($id, $_POST['nomcategoria']);
    $controller->actualizarCategoria($categoriaObj);
    header('location: index.php');
    exit;
}
?>

<!doctype html>
<html>
<head>
    <title>Editar Categoria</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="container mt-4">
    <h2>editar categoría</h2>
    <form method="post">
        <div class="mb-2">
            <label>nombre de categoría:</label>
            <input type="text" name="nomcategoria" class="form-control" value="<?= $categoria['nomcategoria'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">actualizar</button>
        <a href="index.php" class="btn btn-secondary">cancelar</a>
    </form>
</body>
</html>
