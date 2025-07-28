<?php
require_once '../../controladores/ProductoController.php';
require_once '../../controladores/CategoriaController.php';
require_once '../../controladores/ProveedorController.php';
$controller = new ProductoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->crearProducto($_POST);
    header('location: index.php');
    exit;
}
$contro = new ProveedorController();
$proveedores = $contro->listarProveedores();
$con = new CategoriaController();
$categorias = $con->listarCategorias();
?>

<!doctype html>
<html>
<head>
    <title>Registrar Productos</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="container mt-4">
    <h2>agregar producto</h2>
    <form method="post">
        <div class="mb-2">
            <label>nombre:</label>
            <input type="text" name="nomproducto" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>unidad de medida:</label>
            <input type="text" name="unimed" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>stock:</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>costo unitario:</label>
            <input type="number" step="0.0001" name="cosuni" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>precio unitario:</label>
            <input type="number" step="0.0001" name="preuni" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>proveedor:</label>
            <select name="idproveedor" class="form-control" required>
                <?php foreach ($proveedores as $prov): ?>
                    <option value="<?= $prov['idproveedor'] ?>"><?= $prov['nomproveedor'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-2">
            <label>categoría:</label>
            <select name="idcategoria" class="form-control" required>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= $cat['idcategoria'] ?>"><?= $cat['nomcategoria'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-2">
            <label>estado:</label>
            <select name="estado" class="form-control" required>
                <option value="A">activo</option>
                <option value="I">inactivo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">guardar</button>
        <a href="index.php" class="btn btn-secondary">cancelar</a>
    </form>
</body>
</html>
