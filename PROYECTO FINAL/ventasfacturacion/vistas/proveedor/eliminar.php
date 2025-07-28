<?php
require_once '../controladores/ProveedorController.php';
$controller = new ProveedorController();

if (isset($_GET['id'])) {
    $controller->eliminar($_GET['id']);
}

header('location: index.php');
exit;
?>
