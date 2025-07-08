<?php
require_once '../clases/Usuario.php';

if (isset($_GET['id'])) {
  $usuarioObj = new Usuario();
  $usuarioObj->eliminar($_GET['id']);
}

header("Location: ../vistas/listar_usuarios.php");
