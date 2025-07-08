<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Proveedor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
  <div class="container">
    <h2 class="mb-4 text-center">Registrar Proveedor</h2>
    <form action="../controladores/registrar_proveedor.php" method="post">
      
      <div class="mb-3"><label>Nombre</label><input type="text" name="nombre" class="form-control" required></div>
      <div class="mb-3"><label>RUC</label><input type="text" name="ruc" class="form-control"></div>
      <div class="mb-3"><label>Dirección</label><input type="text" name="direccion" class="form-control"></div>
      <div class="mb-3"><label>Teléfono</label><input type="text" name="telefono" class="form-control"></div>
      <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control"></div>
      <button type="submit" class="btn btn-success">Registrar</button>
      <a href="listar_proveedores.php" class="btn btn-secondary">Volver</a>
    </form>
  </div>
</body>
</html>
