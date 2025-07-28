<?php
require_once __DIR__ . '/../modelos/Categoria.php';
require_once __DIR__ . '/../config/Conexion.php';

class CategoriaController {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function obtenerCategoria($id) {
        $sql = "SELECT * FROM categorias WHERE idcategoria = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerCategorias() {
    $sql = "SELECT * FROM categorias";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    public function actualizarCategoria(Categoria $categoria) {
        $sql = "UPDATE categorias SET nomcategoria = ? WHERE idcategoria = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $categoria->getNomCategoria(),
            $categoria->getIdCategoria()
        ]);
    }
    public function listarCategorias() {
    $sql = "SELECT * FROM categorias ORDER BY idcategoria";
    $stmt = $this->conexion->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function registrarCategoria(Categoria $categoria) {
    $sql = "INSERT INTO categorias (idcategoria, nomcategoria) VALUES (?, ?)";
    $stmt = $this->conexion->prepare($sql);
    return $stmt->execute([
        $categoria->getIdCategoria(),
        $categoria->getNomCategoria()
    ]);
}

public function eliminarCategoria($id) {
    $sql = "DELETE FROM categorias WHERE idcategoria = ?";
    $stmt = $this->conexion->prepare($sql);
    return $stmt->execute([$id]);
}
}
?>
