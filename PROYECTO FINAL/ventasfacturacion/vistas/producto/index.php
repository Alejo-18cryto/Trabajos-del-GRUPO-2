<?php
require_once '../../controladores/ProductoController.php';
require_once '../../controladores/CategoriaController.php';
$controller = new ProductoController();
$control = new CategoriaController();
// obtener todas las categorías
$categorias = $control->obtenerCategorias();

// obtener productos
$productos = $controller->obtenerTodos();

// si hay una categoría seleccionada, filtrar los productos
$categoriaSeleccionada = $_GET['categoria'] ?? '';
if ($categoriaSeleccionada !== '') {
    $productos = array_filter($productos, function ($p) use ($categoriaSeleccionada) {
        return $p['idcategoria'] == $categoriaSeleccionada;
    });
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de Productos</title>
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
            max-width: 1100px;
            margin-top: 40px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            text-transform: uppercase;
        }
    </style>
</head>
<body class="container mt-4">

    <h2>lista de productos</h2>

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <a href="crear.php" class="btn btn-success">nuevo producto</a>
        
        <!-- filtro por categoría -->
        <form method="get" class="d-flex align-items-center">
            <label for="categoria" class="me-2">filtrar por categoría:</label>
            <select name="categoria" id="categoria" class="form-select w-auto me-2" onchange="this.form.submit()">
                <option value="">-- todas --</option>
                <?php foreach ($categorias as $c): ?>
                    <option value="<?= $c['idcategoria'] ?>" <?= ($categoriaSeleccionada == $c['idcategoria']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($c['nomcategoria']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if ($categoriaSeleccionada): ?>
                <a href="index.php" class="btn btn-secondary ms-2">limpiar filtro</a>
            <?php endif; ?>
        </form>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>unidad</th>
                <th>stock</th>
                <th>costo</th>
                <th>precio</th>
                <th>proveedor</th>
                <th>categoría</th>
                <th>estado</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($productos) > 0): ?>
                <?php foreach ($productos as $p): ?>
                    <tr>
                        <td><?= $p['idproducto'] ?></td>
                        <td><?= $p['nomproducto'] ?></td>
                        <td><?= $p['unimed'] ?></td>
                        <td><?= $p['stock'] ?></td>
                        <td>S/ <?= number_format($p['cosuni'], 2) ?></td>
                        <td>S/ <?= number_format($p['preuni'], 2) ?></td>
                        <td><?= $p['idproveedor'] ?></td>
                        <td><?= $p['idcategoria'] ?></td>
                        <td><?= $p['estado'] ?></td>
                        <td>
                            <a href="editar.php?id=<?= $p['idproducto'] ?>" class="btn btn-sm btn-warning">editar</a>
                            <a href="eliminar.php?id=<?= $p['idproducto'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿seguro?')">eliminar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="10" class="text-center">no hay productos en esta categoría.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>