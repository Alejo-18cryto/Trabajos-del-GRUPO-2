<?php
require_once '../clases/Proveedor.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $p = new Proveedor();
    $p->registrar($_POST['id'], $_POST['nombre'], $_POST['ruc'], $_POST['direccion'], $_POST['telefono'], $_POST['email']);
    header("Location: ../vistas/listar_proveedores.php");
}
