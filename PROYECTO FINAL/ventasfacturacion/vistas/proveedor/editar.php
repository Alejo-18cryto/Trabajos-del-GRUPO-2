<?php
require_once '../../controladores/ProveedorController.php';
require_once '../../modelos/Proveedor.php';

$controller = new ProveedorController();
$id = $_GET['id'];
$proveedorData = $controller->obtenerProveedor($id);

if (!$proveedorData) {
    echo "proveedor no encontrado";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // crear objeto proveedor desde los datos del formulario
    $proveedor = new Proveedor(
        $id,
        $_POST['nomproveedor'],
        $_POST['rucproveedor'],
        $_POST['dirproveedor'],
        $_POST['telproveedor'],
        $_POST['emailproveedor']
    );

    $controller->actualizarProveedor($proveedor);
    header('location: index.php');
    exit;
}
?>

<!doctype html>
<html>

<head>
    <title>Editar proveedor</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="container mt-4">
    <h2>editar proveedor</h2>
    <form method="post">
        <div class="mb-2">
            <label>nombre:</label>
            <input type="text" name="nomproveedor" class="form-control" value="<?= $proveedorData['nomproveedor'] ?>" required>
        </div>
        <div class="mb-2">
            <label>ruc:</label>
            <input type="text" name="rucproveedor" class="form-control" value="<?= $proveedorData['rucproveedor'] ?>" required>
        </div>
        <div class="mb-2">
            <label>dirección:</label>
            <input type="text" name="dirproveedor" class="form-control" value="<?= $proveedorData['dirproveedor'] ?>" required>
        </div>
        <div class="mb-2">
            <label>teléfono:</label>
            <input type="text" name="telproveedor" class="form-control" value="<?= $proveedorData['telproveedor'] ?>" required>
        </div>
        <div class="mb-2">
            <label>email:</label>
            <input type="email" name="emailproveedor" class="form-control" value="<?= $proveedorData['emailproveedor'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">actualizar</button>
        <a href="index.php" class="btn btn-secondary">cancelar</a>
    </form>
</body>
</html>