<?php
require '../clases/Categoria.php';
if ($_POST) {
  $cat = new Categoria();
  $cat->registrar($_POST['nomcategoria']);
  header("Location: ../vistas/listar_categorias.php");
}
