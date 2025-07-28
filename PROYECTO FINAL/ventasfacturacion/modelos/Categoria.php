<?php
class Categoria {
    private $idcategoria;
    private $nomcategoria;

    public function __construct($idcategoria, $nomcategoria) {
        $this->idcategoria = $idcategoria;
        $this->nomcategoria = $nomcategoria;
    }

    public function getIdCategoria() {
        return $this->idcategoria;
    }

    public function getNomCategoria() {
        return $this->nomcategoria;
    }

    public function setIdCategoria($idcategoria) {
        $this->idcategoria = $idcategoria;
    }

    public function setNomCategoria($nomcategoria) {
        $this->nomcategoria = $nomcategoria;
    }
}
?>
