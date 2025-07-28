<?php
require_once '../../controladores/UsuarioController.php';
$controller = new UsuarioController();
$controller->eliminar($_GET['id']);
header('Location: index.php');
