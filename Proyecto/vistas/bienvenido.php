<?php
session_start();
if (!isset($_SESSION['nomusuario'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bienvenido</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

  <div class="container py-5">
    <div class="text-center mb-4">
      <h2 class="text-success">Bienvenido, <?= $_SESSION['nombres']; ?> 👋</h2>
      <p class="text-secondary">Usuario: <strong><?= $_SESSION['nomusuario']; ?></strong></p>
      <a href="../logout.php" class="btn btn-outline-danger btn-sm"><i class="bi bi-box-arrow-left"></i> Cerrar sesión</a>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">

      <!-- Usuarios -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-person-lines-fill fs-1 text-primary"></i>
            <h5 class="card-title mt-2">Usuarios</h5>
            <a href="listar_usuarios.php" class="btn btn-outline-primary btn-sm mt-2">Ver Usuarios</a>
          </div>
        </div>
      </div>

      <!-- Clientes -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-people-fill fs-1 text-success"></i>
            <h5 class="card-title mt-2">Clientes</h5>
            <a href="listar_clientes.php" class="btn btn-outline-success btn-sm mt-2">Ver Clientes</a>
          </div>
        </div>
      </div>

      <!-- Proveedores -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-truck fs-1 text-warning"></i>
            <h5 class="card-title mt-2">Proveedores</h5>
            <a href="listar_proveedores.php" class="btn btn-outline-warning btn-sm mt-2">Ver Proveedores</a>
          </div>
        </div>
      </div>

      <!-- Productos -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-box-seam fs-1 text-danger"></i>
            <h5 class="card-title mt-2">Productos</h5>
            <a href="listar_productos.php" class="btn btn-outline-danger btn-sm mt-2">Ver Productos</a>
          </div>
        </div>
      </div>

      <!-- Categorías -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-tags-fill fs-1 text-info"></i>
            <h5 class="card-title mt-2">Categorías</h5>
            <a href="listar_categorias.php" class="btn btn-outline-info btn-sm mt-2">Ver Categorías</a>
          </div>
        </div>
      </div>

      <!-- Condición de Venta -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-cash-coin fs-1 text-secondary"></i>
            <h5 class="card-title mt-2">Condiciones de Venta</h5>
            <a href="listar_condicion.php" class="btn btn-outline-secondary btn-sm mt-2">Ver Condiciones</a>
          </div>
        </div>
      </div>

      <!-- Facturas -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-receipt-cutoff fs-1 text-dark"></i>
            <h5 class="card-title mt-2">Facturas</h5>
            <a href="listar_facturas.php" class="btn btn-outline-dark btn-sm mt-2">Ver Facturas</a>
          </div>
        </div>
      </div>

    </div>
  </div>

</body>
</html>
