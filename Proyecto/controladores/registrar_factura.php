<?php
require '../clases/Factura.php';

if ($_POST) {
    $det = array_values($_POST['detalles']);
    (new Factura())->registrar(
        $_POST['fecha'],
        $_POST['idcliente'],
        $_SESSION['idusuario'], // o bien un select si admin genera
        $_POST['idcondicion'],
        $_POST['valorventa'] ?? 0,
        $_POST['igv'] ?? 0,
        $det
    );
    header("Location: ../vistas/listar_facturas.php");
}
