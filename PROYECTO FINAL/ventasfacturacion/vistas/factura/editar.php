<?php
require_once '../../controladores/FacturaController.php';
require_once '../../controladores/ClienteControlador.php';
require_once '../../controladores/UsuarioController.php';
require_once '../../controladores/CondicionController.php';

$controller = new FacturaController();
$controCliente = new ClienteControlador();
$controUsuario = new UsuarioController();
$controCondicion = new CondicionController();

$cliente = $controCliente->listar();
$usuario = $controUsuario->listar();
$condicion = $controCondicion->obtenerCondiciones();

// Validar si se pasó el ID por GET
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$factura = $controller->obtenerFactura($id);

if (!$factura) {
    echo "Factura no encontrada";
    exit;
}

// Si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->actualizarFactura($id, $_POST);
    header('Location: index.php');
    exit;
}
?>

<!doctype html>
<html>
<head>
    <title>Editar Factura</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="container mt-4">
    <h2>Editar Factura</h2>
    <form method="post">
        <div class="mb-2">
            <label>Fecha:</label>
            <input type="date" name="fecha" class="form-control" value="<?= $factura['fecha'] ?>" required>
        </div>
        <div class="mb-2">
            <label>Fecha de Registro:</label>
            <input type="date" name="fechareg" class="form-control" value="<?= $factura['fechareg'] ?>" required>
        </div>
        <div class="mb-2">
            <label>Valor de la venta:</label>
            <input type="number" name="valorventa" class="form-control" value="<?= $factura['valorventa'] ?>" required>
        </div>
        <div class="mb-2">
            <label>IGV:</label>
            <input type="number" name="igv" class="form-control" value="<?= $factura['igv'] ?>" required>
        </div>
        <div class="mb-2">
            <label>Cliente:</label>
            <select name="idcliente" class="form-control" required>
                <?php foreach ($cliente as $clie): ?>
                    <option value="<?= $clie['idcliente'] ?>" <?= $clie['idcliente'] == $factura['idcliente'] ? 'selected' : '' ?>>
                        <?= $clie['ndociente'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-2">
            <label>Usuario:</label>
            <select name="idusuario" class="form-control" required>
                <?php foreach ($usuario as $usu): ?>
                    <option value="<?= $usu['idusuario'] ?>" <?= $usu['idusuario'] == $factura['idusuario'] ? 'selected' : '' ?>>
                        <?= $usu['nomusuario'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-2">
            <label>Condición:</label>
            <select name="idcondicion" class="form-control" required>
                <?php foreach ($condicion as $con): ?>
                    <option value="<?= $con['idcondicion'] ?>" <?= $con['idcondicion'] == $factura['idcondicion'] ? 'selected' : '' ?>>
                        <?= $con['nomcondicion'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>