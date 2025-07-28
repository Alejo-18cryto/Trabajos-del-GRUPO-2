<?php
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../modelos/Usuario.php';

class UsuarioController {
    public function listar() {
        $pdo = Conexion::conectar();
        $stmt = $pdo->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

   public function crear($usuario) {
    $pdo = Conexion::conectar();

    // hashear la contraseña antes de guardarla
    $passwordHasheada = password_hash($usuario->getPassword(), PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO usuarios (nomusuario, password, apellidos, nombres, email, estado) VALUES (?, ?, ?, ?, ?, ?)");
    return $stmt->execute([
        $usuario->getNomUsuario(),
        $passwordHasheada,
        $usuario->getApellidos(),
        $usuario->getNombres(),
        $usuario->getEmail(),
        $usuario->getEstado()
    ]);
}

    public function obtenerPorId($id) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE idusuario = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($usuario) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("UPDATE usuarios SET nomusuario=?, password=?, apellidos=?, nombres=?, email=?, estado=? WHERE idusuario=?");
        return $stmt->execute([
            $usuario->getNomUsuario(),
            $usuario->getPassword(),
            $usuario->getApellidos(),
            $usuario->getNombres(),
            $usuario->getEmail(),
            $usuario->getEstado(),
            $usuario->getIdUsuario()
        ]);
    }

    public function eliminar($id) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE idusuario = ?");
        return $stmt->execute([$id]);
    }

public function verificarLogin($nomusuario, $password) {
    $pdo = Conexion::conectar();
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nomusuario = ?");
    $stmt->execute([$nomusuario]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($password, $usuario['password'])) {
        return $usuario;
    }
    return false;
}
}