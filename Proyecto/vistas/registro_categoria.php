<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Categoría</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h3 class="mb-4">Registrar Nueva Categoría</h3>
  <form action="../controladores/registrar_categoria.php" method="post" class="shadow p-4 bg-white rounded">
    <div class="mb-3">
      <label for="nomcategoria" class="form-label">Nombre de la Categoría</label>
      <input type="text" class="form-control" name="nomcategoria" required>
    </div>
    <button type="submit" class="btn btn-success">Registrar</button>
    <a href="listar_categorias.php" class="btn btn-secondary">Volver</a>
  </form>
</div>

</body>
</html>
