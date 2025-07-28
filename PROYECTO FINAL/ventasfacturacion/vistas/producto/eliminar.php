<?php
require_once '../../controladores/ProductoController.php';
$controller = new ProductoController();

$id = $_GET['id'];
$controller->eliminarProducto($id);
header('location: index.php');
exit;
