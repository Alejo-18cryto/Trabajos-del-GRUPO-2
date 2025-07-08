<?php
require_once __DIR__.'/../conexion/conexion.php';

class Producto extends Conexion {
    public function __construct(){ parent::__construct(); }

    public function registrar($nom, $unidad, $stock, $costo, $precio, $idcat, $idprov) {
        $sql = "INSERT INTO productos (nomproducto, unimed, stock, cosuni, preuni, idcategoria, idproveedor)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssiddii", $nom, $unidad, $stock, $costo, $precio, $idcat, $idprov);
        return $stmt->execute();
    }

    public function obtenerTodos() {
        $sql = "SELECT p.*, c.nomcategoria, pr.nomproveedor
                FROM productos p
                LEFT JOIN categorias c ON p.idcategoria = c.idcategoria
                LEFT JOIN proveedores pr ON p.idproveedor = pr.idproveedor";
        $res = $this->conn->query($sql);
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM productos WHERE idproducto = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id, $nom, $unidad, $stock, $costo, $precio, $idcat, $idprov, $estado) {
        $stmt = $this->conn->prepare("
            UPDATE productos SET nomproducto=?, unimed=?, stock=?, cosuni=?, preuni=?, idcategoria=?, idproveedor=?, estado=?
            WHERE idproducto=?
        ");
        $stmt->bind_param("ssiddiisi", $nom, $unidad, $stock, $costo, $precio, $idcat, $idprov, $estado, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->conn->prepare("DELETE FROM productos WHERE idproducto = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
