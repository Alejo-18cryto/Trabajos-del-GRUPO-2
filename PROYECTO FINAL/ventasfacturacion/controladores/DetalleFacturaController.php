<?php
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../modelos/DetalleFactura.php';

class DetalleFacturaController {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

public function obtenerTodos($idProducto = null) {
    if ($idProducto) {
        $stmt = $this->conexion->prepare("
            SELECT df.*, p.nomproducto AS nomproducto, f.fecha AS fecha_factura
            FROM detalle_factura df
            JOIN productos p ON df.idproducto = p.idproducto
            JOIN facturas f ON df.idfactura = f.idfactura
            WHERE df.idproducto = ?
        ");
        $stmt->execute([$idProducto]);
    } else {
        $stmt = $this->conexion->query("
            SELECT df.*, p.nomproducto AS nomproducto, f.fecha AS fecha_factura
            FROM detalle_factura df
            JOIN productos p ON df.idproducto = p.idproducto
            JOIN facturas f ON df.idfactura = f.idfactura
        ");
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function obtenerFactura($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM detalle_factura WHERE iddetalle = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    
}
