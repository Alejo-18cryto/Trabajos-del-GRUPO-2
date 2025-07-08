<?php
require_once '../clases/Cliente.php';
$cliente = new Cliente();
$data = $cliente->obtenerPorId($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente->actualizar(
        $_POST['idcliente'],
        $_POST['nomcliente'],
        $_POST['ruccliente'],
        $_POST['dircliente'],
        $_POST['telcliente'],
        $_POST['emailcliente']
    );
    header("Location: listar_clientes.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Cliente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
  <div class="container">
    <h2 class="text-center mb-4">Editar Cliente</h2>
    <form method="post">
      <input type="hidden" name="idcliente" value="<?= $data['idcliente'] ?>">
      <div class="mb-3"><label>Nombre</label><input type="text" name="nomcliente" class="form-control" value="<?= $data['nomcliente'] ?>"></div>
      <div class="mb-3"><label>RUC</label><input type="text" name="ruccliente" class="form-control" value="<?= $data['ruccliente'] ?>"></div>
      <div class="mb-3"><label>Dirección</label><input type="text" name="dircliente" class="form-control" value="<?= $data['dircliente'] ?>"></div>
      <div class="mb-3"><label>Teléfono</label><input type="text" name="telcliente" class="form-control" value="<?= $data['telcliente'] ?>"></div>
      <div class="mb-3"><label>Email</label><input type="email" name="emailcliente" class="form-control" value="<?= $data['emailcliente'] ?>"></div>
      <button type="submit" class="btn btn-primary">Actualizar</button>
      <a href="listar_clientes.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html>
