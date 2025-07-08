<?php
require_once __DIR__ . '/../conexion/conexion.php';

class Proveedor extends Conexion {
    public function __construct() {
        parent::__construct();
    }

    public function registrar($id, $nombre, $ruc, $direccion, $telefono, $email) {
        $sql = "INSERT INTO proveedores (idproveedor, nomproveedor, rucproveedor, dirproveedor, telproveedor, emailproveedor)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssss", $id, $nombre, $ruc, $direccion, $telefono, $email);
        return $stmt->execute();
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM proveedores";
        $res = $this->conn->query($sql);
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM proveedores WHERE idproveedor=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id, $nombre, $ruc, $direccion, $telefono, $email) {
        $sql = "UPDATE proveedores SET nomproveedor=?, rucproveedor=?, dirproveedor=?, telproveedor=?, emailproveedor=?
                WHERE idproveedor=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssss", $nombre, $ruc, $direccion, $telefono, $email, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $sql = "DELETE FROM proveedores WHERE idproveedor=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        return $stmt->execute();
    }
}
