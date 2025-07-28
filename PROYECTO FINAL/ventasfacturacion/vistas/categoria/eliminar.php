<?php
require_once '../../controladores/CategoriaController.php';

$controller = new CategoriaController();
$id = $_GET['id'];
$controller->eliminarCategoria($id);
header('location: index.php');
exit;
?>
