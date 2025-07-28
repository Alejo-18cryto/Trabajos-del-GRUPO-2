<?php
class Condicion {
    private $idcondicion;
    private $nomcondicion;

    public function __construct($idcondicion, $nomcondicion) {
        $this->idcondicion = $idcondicion;
        $this->nomcondicion = $nomcondicion;
    }

    public function getIdCondicion() {
        return $this->idcondicion;
    }

    public function getNomCondicion() {
        return $this->nomcondicion;
    }

    public function setIdCondicion($idcondicion) {
        $this->idcondicion = $idcondicion;
    }

    public function setNomCondicion($nomcondicion) {
        $this->nomcondicion = $nomcondicion;
    }
}
?>
