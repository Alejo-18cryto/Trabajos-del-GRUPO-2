<?php
session_start();
require_once '../clases/Usuario.php';

$nomusuario = $_POST['nomusuario'];
$password = $_POST['password'];

$usuarioObj = new Usuario();
$datos = $usuarioObj->iniciarSesion($nomusuario, $password);

if ($datos) {
    $_SESSION['idusuario'] = $datos['idusuario'];
    $_SESSION['nomusuario'] = $datos['nomusuario'];
    $_SESSION['nombres'] = $datos['nombres'];
    header("Location: ../vistas/bienvenido.php");
} else {
    echo "Credenciales inválidas o usuario inactivo. <a href='../vistas/login.html'>Volver</a>";
}
?>
