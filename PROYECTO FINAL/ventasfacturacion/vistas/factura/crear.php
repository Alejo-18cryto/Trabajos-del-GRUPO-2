<?php
require_once '../../controladores/FacturaController.php';
require_once '../../controladores/ClienteControlador.php';
require_once '../../controladores/UsuarioController.php';
require_once '../../controladores/CondicionController.php';
require_once '../../controladores/ProductoController.php';

$controller = new FacturaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->crearFactura($_POST);
    header('location: index.php');
    exit;
}

$contro = new ClienteControlador();
$cliente = $contro->listar();

$con = new UsuarioController();
$usuario = $con->listar();

$control = new CondicionController();
$condicion = $control->obtenerCondiciones();

$productoController = new ProductoController();
$productos = $productoController->obtenerTodos();
?>

<!doctype html>
<html>
<head>
    <title>Registrar Ventas</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="container mt-4">
    <h2>Registrar Ventas</h2>
    <form method="post">
        <div class="mb-2">
            <label>fecha:</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Fecha de registro:</label>
            <input type="date" name="fechareg" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Valor de la venta:</label>
            <input type="number" name="valorventa" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>igv:</label>
            <input type="number" name="igv" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Cliente:</label>
            <select name="idcliente" class="form-control" required>
                <?php foreach ($cliente as $clie): ?>
                    <option value="<?= $clie['idcliente'] ?>"><?= $clie['ndociente'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-2">
            <label>Usuario:</label>
            <select name="idusuario" class="form-control" required>
                <?php foreach ($usuario as $usu): ?>
                    <option value="<?= $usu['idusuario'] ?>"><?= $usu['nomusuario'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-2">
            <label>Condición:</label>
            <select name="idcondicion" class="form-control" required>
                <?php foreach ($condicion as $con): ?>
                    <option value="<?= $con['idcondicion'] ?>"><?= $con['nomcondicion'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <hr>
        <h4>Detalle de productos</h4>
        <div id="productos">
            <div class="producto mb-3 border rounded p-3">
                <label>Producto:</label>
                <select name="idproducto[]" class="form-control" required>
                    <?php foreach ($productos as $prod): ?>
                        <option value="<?= $prod['idproducto'] ?>"><?= $prod['nomproducto'] ?></option>
                    <?php endforeach ?>
                </select>

                <label class="mt-2">Cantidad:</label>
                <input type="number" name="cant[]" class="form-control" placeholder="Cantidad" required>

                <label class="mt-2">Costo unitario:</label>
                <input type="number" step="0.01" name="cosuni[]" class="form-control" placeholder="Costo unitario" required>

                <label class="mt-2">Precio unitario:</label>
                <input type="number" step="0.01" name="preuni[]" class="form-control" placeholder="Precio unitario" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>