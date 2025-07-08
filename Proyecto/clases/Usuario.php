<?php
require_once __DIR__ . '/../conexion/conexion.php';
class Usuario extends Conexion {
    public function __construct() {
        parent::__construct();
    }
    public function registrar($nomusuario, $password, $apellidos, $nombres, $email) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nomusuario, password, apellidos, nombres, email) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssss", $nomusuario, $hash, $apellidos, $nombres, $email);
        return $stmt->execute();
    }
  public function iniciarSesion($nomusuario, $password) {
    $sql = "SELECT * FROM usuarios WHERE nomusuario = ? AND estado = 'A'";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $nomusuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();

    if ($usuario && password_verify($password, $usuario['password'])) {
        return $usuario;
    }

    return false;
}
public function obtenerUsuarios() {
    $sql = "SELECT * FROM usuarios";
    $resultado = $this->conn->query($sql);
    return $resultado->fetch_all(MYSQLI_ASSOC);
}
  // obtener usuario por id
public function obtenerPorId($idusuario) {
    $sql = "SELECT * FROM usuarios WHERE idusuario = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $idusuario);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res->fetch_assoc();
}

// actualizar usuario
public function actualizar($idusuario, $nomusuario, $apellidos, $nombres, $email, $estado) {
    $sql = "UPDATE usuarios SET nomusuario=?, apellidos=?, nombres=?, email=?, estado=? WHERE idusuario=?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sssssi", $nomusuario, $apellidos, $nombres, $email, $estado, $idusuario);
    return $stmt->execute();
}

// eliminar usuario
public function eliminar($idusuario) {
    $sql = "DELETE FROM usuarios WHERE idusuario=?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $idusuario);
    return $stmt->execute();
}
}

?>
