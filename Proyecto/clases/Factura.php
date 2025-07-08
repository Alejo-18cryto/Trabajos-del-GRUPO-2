<?php
require_once __DIR__ . '/../conexion/conexion.php';

class Factura extends Conexion {
    public function __construct() {
        parent::__construct();
    }

    public function registrar($fecha, $idcliente, $idusuario, $idcondicion, $valorventa, $igv, $detalles) {
        $this->conn->begin_transaction();

        $stmt = $this->conn->prepare("
            INSERT INTO facturas (fecha, idcliente, idusuario, idcondicion, valorventa, igv)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("siiidd", $fecha, $idcliente, $idusuario, $idcondicion, $valorventa, $igv);
        $stmt->execute();

        $idfactura = $this->conn->insert_id;
        $stmtDet = $this->conn->prepare("
            INSERT INTO detallefactura (idfactura, idproducto, cant, cosuni, preuni)
            VALUES (?, ?, ?, ?, ?)
        ");

        foreach ($detalles as $d) {
            $stmtDet->bind_param("iiidd", $idfactura, $d['idproducto'], $d['cant'], $d['cosuni'], $d['preuni']);
            $stmtDet->execute();
        }

        return $this->conn->commit();
    }

    public function obtenerTodas() {
        $sql = "
            SELECT f.*, c.nomcliente, u.nomusuario, cv.nomcondicion
            FROM facturas f
            JOIN clientes c ON f.idcliente = c.idcliente
            JOIN usuarios u ON f.idusuario = u.idusuario
            JOIN condicionventa cv ON f.idcondicion = cv.idcondicion
            ORDER BY f.idfactura DESC
        ";
        $res = $this->conn->query($sql);
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerPorId($idfactura) {
        $stmt = $this->conn->prepare("
            SELECT f.*, c.nomcliente, u.nomusuario, cv.nomcondicion
            FROM facturas f
            JOIN clientes c ON f.idcliente = c.idcliente
            JOIN usuarios u ON f.idusuario = u.idusuario
            JOIN condicionventa cv ON f.idcondicion = cv.idcondicion
            WHERE f.idfactura = ?
        ");
        $stmt->bind_param("i", $idfactura);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function obtenerDetalle($idfactura) {
        $stmt = $this->conn->prepare("
            SELECT d.*, p.nomproducto
            FROM detallefactura d
            JOIN productos p ON d.idproducto = p.idproducto
            WHERE d.idfactura = ?
        ");
        $stmt->bind_param("i", $idfactura);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
