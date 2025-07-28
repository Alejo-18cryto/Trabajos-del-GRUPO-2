<?php
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../modelos/Factura.php';

class FacturaController {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function obtenerTodos() {
        $stmt = $this->conexion->query("SELECT * FROM facturas");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerFactura($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM facturas WHERE idfactura = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

   public function crearFactura($data) {
    try {
        $this->conexion->beginTransaction();

        // Insertar la factura
        $stmt = $this->conexion->prepare("INSERT INTO facturas (fecha, idcliente, fechareg, idusuario, idcondicion, valorventa, igv) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $data['fecha'],
            $data['idcliente'],
            $data['fechareg'],
            $data['idusuario'],
            $data['idcondicion'],
            $data['valorventa'],
            $data['igv']
        ]);

        $idfactura = $this->conexion->lastInsertId();

        $productos = $data['idproducto'];
        $cantidades = $data['cant'];
        $costos = $data['cosuni'];
        $precios = $data['preuni'];

        for ($i = 0; $i < count($productos); $i++) {
            // Insertar en detalle_factura
            $stmtDetalle = $this->conexion->prepare("INSERT INTO detalle_factura (idfactura, idproducto, cant, cosuni, preuni) VALUES (?, ?, ?, ?, ?)");
            $stmtDetalle->execute([
                $idfactura,
                $productos[$i],
                $cantidades[$i],
                $costos[$i],
                $precios[$i]
            ]);
                // Verificar stock disponible (opcional)
                $stmtCheck = $this->conexion->prepare("SELECT stock FROM productos WHERE idproducto = ?");
                $stmtCheck->execute([$productos[$i]]);
                $stockActual = $stmtCheck->fetchColumn();

                if ($stockActual < $cantidades[$i]) {
                    throw new Exception("Stock insuficiente para el producto con ID: " . $productos[$i]);
                }
            // Actualizar el stock del producto (restar la cantidad vendida)
            $stmtStock = $this->conexion->prepare("UPDATE productos SET stock = stock - ? WHERE idproducto = ?");
            $stmtStock->execute([
                $cantidades[$i],
                $productos[$i]
            ]);
        }

        $this->conexion->commit();
        return true;

    } catch (Exception $e) {
        $this->conexion->rollBack();
        die("Error al crear la factura: " . $e->getMessage());
    }
}

    public function actualizarFactura($id, $data) {
        $stmt = $this->conexion->prepare("UPDATE facturas SET fecha=?, idcliente=?, fechareg=?, idusuario=?, idcondicion=?, valorventa=?, igv=? WHERE idfactura=?");
        return $stmt->execute([
            $data['fecha'],
            $data['idcliente'],
            $data['fechareg'],
            $data['idusuario'],
            $data['idcondicion'],
            $data['valorventa'],
            $data['igv'], 
            $id
        ]);
    }
public function obtenerPorCliente($idcliente) {
    $sql = "SELECT * FROM facturas WHERE idcliente = ?";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute([$idcliente]);
    return $stmt->fetchAll();
}

    public function eliminarFactura($id) {
        $stmt = $this->conexion->prepare("DELETE FROM facturas WHERE idfactura = ?");
        return $stmt->execute([$id]);
    }
}
