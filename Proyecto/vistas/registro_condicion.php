<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Condición de Venta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
<div class="container">
  <h3 class="mb-4">Registrar Condición de Venta</h3>
  <form action="../controladores/registrar_condicion.php" method="post" class="bg-white p-4 rounded shadow">
    <div class="mb-3">
      <label for="nomcondicion" class="form-label">Nombre de la Condición</label>
      <input type="text" class="form-control" id="nomcondicion" name="nomcondicion" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="listar_condicion.php" class="btn btn-secondary">Volver</a>
  </form>
</div>
</body>
</html>
