<?php
require_once __DIR__ . '/../modelos/Condicion.php';
require_once __DIR__ . '/../config/Conexion.php';

class CondicionController {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function obtenerCondicion($id) {
        $sql = "SELECT * FROM condicion_venta WHERE idcondicion = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerCondiciones() {
        $sql = "SELECT * FROM condicion_venta";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarCondicion(Condicion $condicion) {
        $sql = "UPDATE condicion_venta SET nomcondicion = ? WHERE idcondicion = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $condicion->getNomCondicion(),
            $condicion->getIdCondicion()
        ]);
    }

    public function listarCondiciones() {
        $sql = "SELECT * FROM condicion_venta ORDER BY idcondicion";
        $stmt = $this->conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrarCondicion(Condicion $condicion) {
        $sql = "INSERT INTO condicion_venta (idcondicion, nomcondicion) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $condicion->getIdCondicion(),
            $condicion->getNomCondicion()
        ]);
    }

    public function eliminarCondicion($id) {
        $sql = "DELETE FROM condicion_venta WHERE idcondicion = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>