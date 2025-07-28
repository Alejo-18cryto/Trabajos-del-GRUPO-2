<?php
require_once '../../controladores/ProductoController.php';
require_once '../../controladores/ProveedorController.php';
require_once '../../controladores/CategoriaController.php';

$controller = new ProductoController();
$proveedorController = new ProveedorController();
$categoriaController = new CategoriaController();

$id = $_GET['id'];
$producto = $controller->obtenerProducto($id);

if (!$producto) {
    echo "producto no encontrado";
    exit;
}

$proveedores = $proveedorController->obtenerProveedores();

$categorias = $categoriaController->obtenerCategorias();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->actualizarProducto($id, $_POST);
    header('location: index.php');
    exit;
}
?>

<!doctype html>
<html>
<head>
    <title>Editar Productos</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="container mt-4">
    <h2>editar producto</h2>
    <form method="post">
        <div class="mb-2">
            <label>proveedor:</label>
            <select name="idproveedor" class="form-control" required>
                <?php foreach ($proveedores as $proveedor): ?>
                    <option value="<?= $proveedor['idproveedor'] ?>" <?= $producto['idproveedor'] == $proveedor['idproveedor'] ? 'selected' : '' ?>>
                        <?= $proveedor['nomproveedor'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-2">
            <label>nombre del producto:</label>
            <input type="text" name="nomproducto" class="form-control" value="<?= $producto['nomproducto'] ?>" required>
        </div>

        <div class="mb-2">
            <label>unidad de medida:</label>
            <input type="text" name="unimed" class="form-control" value="<?= $producto['unimed'] ?>" required>
        </div>

        <div class="mb-2">
            <label>stock:</label>
            <input type="number" name="stock" class="form-control" value="<?= $producto['stock'] ?>" required>
        </div>

        <div class="mb-2">
            <label>costo unitario:</label>
            <input type="number" step="0.0001" name="cosuni" class="form-control" value="<?= $producto['cosuni'] ?>" required>
        </div>

        <div class="mb-2">
            <label>precio unitario:</label>
            <input type="number" step="0.0001" name="preuni" class="form-control" value="<?= $producto['preuni'] ?>" required>
        </div>

        <div class="mb-2">
            <label>categoría:</label>
            <select name="idcategoria" class="form-control" required>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['idcategoria'] ?>" <?= $producto['idcategoria'] == $categoria['idcategoria'] ? 'selected' : '' ?>>
                        <?= $categoria['nomcategoria'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-2">
            <label>estado:</label>
            <select name="estado" class="form-control" required>
                <option value="A" <?= $producto['estado'] == 'A' ? 'selected' : '' ?>>activo</option>
                <option value="I" <?= $producto['estado'] == 'I' ? 'selected' : '' ?>>inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">actualizar</button>
        <a href="index.php" class="btn btn-secondary">cancelar</a>
    </form>
</body>
</html>
