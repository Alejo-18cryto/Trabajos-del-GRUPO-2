<?php
require_once '../clases/Usuario.php';

$nomusuario = $_POST['nomusuario'];
$password = $_POST['password'];
$apellidos = $_POST['apellidos'];
$nombres = $_POST['nombres'];
$email = $_POST['email'];

$usuarioObj = new Usuario();
if ($usuarioObj->registrar($nomusuario, $password, $apellidos, $nombres, $email)) {
    echo "Usuario registrado correctamente. <a href='../vistas/login.html'>Iniciar sesión</a>";
} else {
    echo "Error al registrar.";
}
?>
