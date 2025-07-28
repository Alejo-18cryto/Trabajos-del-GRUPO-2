<?php
require_once '../../controladores/FacturaController.php';
$controller = new FacturaController();
if (isset($_GET['id'])) {
    $controller->eliminarFactura($_GET['id']);
}
header("Location: index.php");