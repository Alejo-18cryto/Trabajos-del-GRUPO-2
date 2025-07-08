<?php
require_once '../clases/Cliente.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente = new Cliente();
    $cliente->registrar(
        $_POST['idcliente'],
        $_POST['nomcliente'],
        $_POST['ruccliente'],
        $_POST['dircliente'],
        $_POST['telcliente'],
        $_POST['emailcliente']
    );
    header("Location: ../vistas/listar_clientes.php");
}
