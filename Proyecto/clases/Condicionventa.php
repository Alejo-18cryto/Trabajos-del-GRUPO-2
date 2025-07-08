<?php
require_once __DIR__ . '/../conexion/conexion.php';

class Condicionventa extends Conexion {
    public function __construct() {
        parent::__construct();
    }

    // Obtener todas las condiciones de venta
    public function obtenerTodas() {
        $sql = "SELECT * FROM condicionventa ORDER BY idcondicion";
        $res = $this->conn->query($sql);
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    // Registrar nueva condición
    public function registrar($nomcondicion) {
        $stmt = $this->conn->prepare("INSERT INTO condicionventa (nomcondicion) VALUES (?)");
        $stmt->bind_param("s", $nomcondicion);
        return $stmt->execute();
    }

    // Obtener una condición por ID
    public function obtenerPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM condicionventa WHERE idcondicion = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Editar condición
    public function actualizar($id, $nomcondicion) {
        $stmt = $this->conn->prepare("UPDATE condicionventa SET nomcondicion = ? WHERE idcondicion = ?");
        $stmt->bind_param("si", $nomcondicion, $id);
        return $stmt->execute();
    }

    // Eliminar condición
    public function eliminar($id) {
    $stmt = $this->conn->prepare("DELETE FROM condicionventa WHERE idcondicion = ?");
    $stmt->bind_param("i", $id);
    try {
        return $stmt->execute();
    } catch (mysqli_sql_exception $e) {
        return false;
    }
}
}
