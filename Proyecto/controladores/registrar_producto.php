<?php
require_once '../clases/Producto.php';
if($_POST){
  (new Producto())->registrar(
    $_POST['nomproducto'],$_POST['unimed'],$_POST['stock'],
    $_POST['cosuni'],$_POST['preuni'],$_POST['idcategoria'],$_POST['idproveedor']
  );
}
header("Location: ../vistas/listar_productos.php");
