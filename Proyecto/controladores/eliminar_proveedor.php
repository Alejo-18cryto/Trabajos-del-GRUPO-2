<?php
require_once '../clases/Proveedor.php';

if (isset($_GET['id'])) {
    $p = new Proveedor();
    $p->eliminar($_GET['id']);
}

header("Location: ../vistas/listar_proveedores.php");
