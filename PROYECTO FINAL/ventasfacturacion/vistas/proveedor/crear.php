<?php
require_once '../../controladores/ProveedorController.php';
require_once '../../modelos/Proveedor.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $proveedor = new Proveedor();
    $proveedor->setIdProveedor($_POST['idproveedor']);
    $proveedor->setNomProveedor($_POST['nomproveedor']);
    $proveedor->setRucProveedor($_POST['rucproveedor']);
    $proveedor->setDirProveedor($_POST['dirproveedor']);
    $proveedor->setTelProveedor($_POST['telproveedor']);
    $proveedor->setEmailProveedor($_POST['emailproveedor']);

    $controlador = new ProveedorController();
    $controlador->agregarProveedor($proveedor);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registrar Proveedor</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="container mt-4">
    <h1>Registrar Proveedor</h1>
    <form method="post">
        <div class="mb-3">
            <label>ID Proveedor</label>
            <input type="text" name="idproveedor" class="form-control" maxlength="3" required>
        </div>
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nomproveedor" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>RUC</label>
            <input type="text" name="rucproveedor" class="form-control" maxlength="11">
        </div>
        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="dirproveedor" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telproveedor" class="form-control" maxlength="9">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="emailproveedor" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>