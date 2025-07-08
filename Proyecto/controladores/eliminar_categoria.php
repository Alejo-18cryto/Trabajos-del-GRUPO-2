<?php
require '../clases/Categoria.php';
if(isset($_GET['id'])){
  (new Categoria())->eliminar($_GET['id']);
}
header("Location: ../vistas/listar_categorias.php");
