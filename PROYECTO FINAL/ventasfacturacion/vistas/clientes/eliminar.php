<?php
require_once '../../controladores/ClienteControlador.php';

if (isset($_GET['id'])) {
    $controlador = new ClienteControlador();
    $controlador->eliminar($_GET['id']);
}

header('Location: index.php');
exit;
