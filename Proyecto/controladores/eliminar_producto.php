<?php
require_once '../clases/Producto.php';
if(isset($_GET['id'])){
  (new Producto())->eliminar($_GET['id']);
}
header("Location: ../vistas/listar_productos.php");
