<?php
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../modelos/Producto.php';

class ProductoController {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function obtenerTodos() {
        $stmt = $this->conexion->query("SELECT * FROM productos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerProducto($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM productos WHERE idproducto = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crearProducto($data) {
        $stmt = $this->conexion->prepare("INSERT INTO productos (idproveedor, nomproducto, unimed, stock, cosuni, preuni, idcategoria, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['idproveedor'],
            $data['nomproducto'],
            $data['unimed'],
            $data['stock'],
            $data['cosuni'],
            $data['preuni'],
            $data['idcategoria'],
            $data['estado']
        ]);
    }

    public function actualizarProducto($id, $data) {
        $stmt = $this->conexion->prepare("UPDATE productos SET idproveedor=?, nomproducto=?, unimed=?, stock=?, cosuni=?, preuni=?, idcategoria=?, estado=? WHERE idproducto=?");
        return $stmt->execute([
            $data['idproveedor'],
            $data['nomproducto'],
            $data['unimed'],
            $data['stock'],
            $data['cosuni'],
            $data['preuni'],
            $data['idcategoria'],
            $data['estado'],
            $id
        ]);
    }

    public function eliminarProducto($id) {
        $stmt = $this->conexion->prepare("DELETE FROM productos WHERE idproducto = ?");
        return $stmt->execute([$id]);
    }
}
