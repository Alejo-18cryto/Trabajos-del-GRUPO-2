<?php
require_once '../clases/Cliente.php';

if (isset($_GET['id'])) {
    $cliente = new Cliente();
    $cliente->eliminar($_GET['id']);
}

header("Location: ../vistas/listar_clientes.php");
