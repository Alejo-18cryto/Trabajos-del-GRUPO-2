<?php
require_once '../../controladores/ClienteControlador.php';
require_once '../../modelos/Cliente.php';

$controlador = new ClienteControlador();

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$data = $controlador->obtener($id);

if (!$data) {
    echo "Cliente no encontrado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cliente = new Cliente();
    $cliente->setIdCliente($id);
    $cliente->setNDociente($_POST['ndociente']);
    $cliente->setRucCliente($_POST['ruccliente']);
    $cliente->setTIdentite($_POST['tidentite']);
    $cliente->setTCliente($_POST['tcliente']);
    $cliente->setEmailCliente($_POST['emailcliente']);

    $controlador->actualizar($cliente);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="container mt-4">
    <h1>Editar Cliente</h1>
    <form method="post">
        <div class="mb-3"><label>Nombre</label><input type="text" name="ndociente" class="form-control" value="<?= $data['ndociente'] ?>" required></div>
        <div class="mb-3"><label>RUC</label><input type="text" name="ruccliente" class="form-control" value="<?= $data['ruccliente'] ?>"></div>
        <div class="mb-3"><label>Tipo Identificación</label><input type="text" name="tidentite" class="form-control" value="<?= $data['tidentite'] ?>" required></div>
        <div class="mb-3"><label>Tipo Cliente</label><input type="text" name="tcliente" class="form-control" value="<?= $data['tcliente'] ?>" required></div>
        <div class="mb-3"><label>Email</label><input type="email" name="emailcliente" class="form-control" value="<?= $data['emailcliente'] ?>"></div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
