<?php
require_once '../clases/Condicionventa.php';

if (isset($_GET['id'])) {
    $obj = new Condicionventa();
    $obj->eliminar($_GET['id']);
    header("Location: ../vistas/listar_condicion.php");
}
