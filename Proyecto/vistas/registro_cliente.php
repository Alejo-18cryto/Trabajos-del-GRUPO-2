<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Cliente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
  <div class="container">
    <h2 class="text-center mb-4">Registrar Cliente</h2>
    <form action="../controladores/registrar_cliente.php" method="post">
     
      <div class="mb-3"><label class="form-label">Nombre</label><input type="text" name="nomcliente" class="form-control" required></div>
      <div class="mb-3"><label class="form-label">RUC</label><input type="text" name="ruccliente" class="form-control"></div>
      <div class="mb-3"><label class="form-label">Dirección</label><input type="text" name="dircliente" class="form-control"></div>
      <div class="mb-3"><label class="form-label">Teléfono</label><input type="text" name="telcliente" class="form-control"></div>
      <div class="mb-3"><label class="form-label">Email</label><input type="email" name="emailcliente" class="form-control"></div>
      <button type="submit" class="btn btn-success">Registrar</button>
      <a href="listar_clientes.php" class="btn btn-secondary">Volver</a>
    </form>
  </div>
</body>
</html>
