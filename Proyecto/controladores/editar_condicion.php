<?php
require_once '../clases/Condicionventa.php';

if ($_POST) {
    $obj = new Condicionventa();
    $obj->actualizar($_POST['idcondicion'], $_POST['nomcondicion']);
    header("Location: ../vistas/listar_condicion.php");
}
