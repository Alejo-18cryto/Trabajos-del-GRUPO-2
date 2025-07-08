<?php
require_once __DIR__ . '/../conexion/conexion.php';

class Cliente extends Conexion {
    public function __construct() {
        parent::__construct();
    }

    // registrar nuevo cliente
    public function registrar($id, $nombre, $ruc, $direccion, $telefono, $email) {
        $sql = "INSERT INTO clientes (idcliente, nomcliente, ruccliente, dircliente, telcliente, emailcliente)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssss", $id, $nombre, $ruc, $direccion, $telefono, $email);
        return $stmt->execute();
    }

    // obtener todos los clientes
    public function obtenerTodos() {
        $sql = "SELECT * FROM clientes";
        $res = $this->conn->query($sql);
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    // obtener cliente por id
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM clientes WHERE idcliente=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // actualizar cliente
    public function actualizar($id, $nombre, $ruc, $direccion, $telefono, $email) {
        $sql = "UPDATE clientes SET nomcliente=?, ruccliente=?, dircliente=?, telcliente=?, emailcliente=? 
                WHERE idcliente=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssss", $nombre, $ruc, $direccion, $telefono, $email, $id);
        return $stmt->execute();
    }

    // eliminar cliente
    public function eliminar($id) {
        $sql = "DELETE FROM clientes WHERE idcliente=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        return $stmt->execute();
    }
}
