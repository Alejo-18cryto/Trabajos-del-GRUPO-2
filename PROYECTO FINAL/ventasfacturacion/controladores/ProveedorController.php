<?php
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../modelos/Proveedor.php';

class ProveedorController {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar(); // usa el método estático conectar()
    }

    public function listarProveedores() {
        $sql = "SELECT * FROM proveedores";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerProveedor($id) {
        $sql = "SELECT * FROM proveedores WHERE idproveedor = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerProveedores() {
    $sql = "SELECT * FROM proveedores";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    public function agregarProveedor(Proveedor $proveedor) {
        $sql = "INSERT INTO proveedores (idproveedor, nomproveedor, rucproveedor, dirproveedor, telproveedor, emailproveedor)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $proveedor->getIdProveedor(),
            $proveedor->getNomProveedor(),
            $proveedor->getRucProveedor(),
            $proveedor->getDirProveedor(),
            $proveedor->getTelProveedor(),
            $proveedor->getEmailProveedor()
        ]);
    }

    public function actualizarProveedor(Proveedor $proveedor) {
        $sql = "UPDATE proveedores SET nomproveedor=?, rucproveedor=?, dirproveedor=?, telproveedor=?, emailproveedor=?
                WHERE idproveedor=?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $proveedor->getNomProveedor(),
            $proveedor->getRucProveedor(),
            $proveedor->getDirProveedor(),
            $proveedor->getTelProveedor(),
            $proveedor->getEmailProveedor(),
            $proveedor->getIdProveedor()
        ]);
    }

    public function eliminarProveedor($id) {
        $sql = "DELETE FROM proveedores WHERE idproveedor = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
