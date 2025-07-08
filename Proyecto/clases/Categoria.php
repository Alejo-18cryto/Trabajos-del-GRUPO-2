<?php
require_once __DIR__.'/../conexion/conexion.php';

class Categoria extends Conexion {
    public function __construct() { parent::__construct(); }

    public function registrar($nombre) {
        $sql = "INSERT INTO categorias (nomcategoria) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $nombre);
        return $stmt->execute();
    }

    public function obtenerTodas() {
        $res = $this->conn->query("SELECT * FROM categorias");
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM categorias WHERE idcategoria=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id, $nombre) {
        $stmt = $this->conn->prepare("UPDATE categorias SET nomcategoria=? WHERE idcategoria=?");
        $stmt->bind_param("si",$nombre, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->conn->prepare("DELETE FROM categorias WHERE idcategoria=?");
        $stmt->bind_param("i",$id);
        return $stmt->execute();
    }
}
