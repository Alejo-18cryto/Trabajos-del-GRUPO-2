<?php
require '../clases/Cliente.php';
require '../clases/Usuario.php';
require '../clases/Categoria.php';
require '../clases/Producto.php';
require '../clases/Condicionventa.php';

$clientes = (new Cliente())->obtenerTodos();
$usuarios = (new Usuario())->obtenerUsuarios();
$conditions = (new Condicionventa())->obtenerTodas();
$productos = (new Producto())->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Factura</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
<div class="container">
  <h3>Registrar Nueva Factura</h3>
  <form action="../controladores/registrar_factura.php" method="post" class="bg-white p-4 shadow rounded">
    <!-- campos principales -->
    <div class="row">
      <div class="col-md-4 mb-3">
        <label class="form-label">Fecha</label><input type="date" name="fecha" class="form-control" required>
      </div>
      <div class="col-md-4 mb-3">
        <label>Cliente</label>
        <select name="idcliente" class="form-select" required>
          <?php foreach ($clientes as $c): ?>
            <option value="<?= $c['idcliente'] ?>"><?= $c['nomcliente'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="col-md-4 mb-3">
        <label>Condición</label>
        <select name="idcondicion" class="form-select" required>
          <?php foreach ($conditions as $co): ?>
            <option value="<?= $co['idcondicion'] ?>"><?= $co['nomcondicion'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>

    <!-- Detalles de productos -->
    <h5>Productos</h5>
    <div id="detalles">
      <div class="row mb-2">
        <input type="hidden" name="detalles[0][idproducto]">
        <div class="col-md-4">
          <select name="detalles[0][idproducto]" class="form-select">
            <?php foreach($productos as $p): ?>
            <option value="<?= $p['idproducto'] ?>"><?= $p['nomproducto'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="col-md-2"><input type="number" name="detalles[0][cant]" class="form-control" placeholder="Cantidad"></div>
        <div class="col-md-3"><input type="number" step="0.0001" name="detalles[0][cosuni]" class="form-control" placeholder="Costo unit."></div>
        <div class="col-md-3"><input type="number" step="0.0001" name="detalles[0][preuni]" class="form-control" placeholder="Precio unit."></div>
      </div>
    </div>

    <button type="button" id="addRow" class="btn btn-link">+ Agregar otro producto</button>

    <div class="mt-3">
      <button type="submit" class="btn btn-success">Guardar Factura</button>
      <a href="listar_facturas.php" class="btn btn-secondary">Volver</a>
    </div>
  </form>
</div>

<script>
let index = 1;
document.getElementById('addRow').onclick = () => {
  const div = document.createElement('div');
  div.classList.add('row', 'mb-2');
  div.innerHTML = `
    <div class="col-md-4">
      <select name="detalles[${index}][idproducto]" class="form-select">
        <?php foreach($productos as $p): ?>
        <option value="<?= $p['idproducto'] ?>"><?= $p['nomproducto'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="col-md-2"><input type="number" name="detalles[${index}][cant]" class="form-control"></div>
    <div class="col-md-3"><input type="number" step="0.0001" name="detalles[${index}][cosuni]" class="form-control"></div>
    <div class="col-md-3"><input type="number" step="0.0001" name="detalles[${index}][preuni]" class="form-control"></div>
  `;
  document.getElementById('detalles').appendChild(div);
  index++;
};
</script>
</body>
</html>
