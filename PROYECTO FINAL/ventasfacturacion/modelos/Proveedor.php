<?php
class Proveedor {
    private $idproveedor;
    private $nomproveedor;
    private $rucproveedor;
    private $dirproveedor;
    private $telproveedor;
    private $emailproveedor;

    // getters
    public function getIdProveedor() {
        return $this->idproveedor;
    }

    public function getNomProveedor() {
        return $this->nomproveedor;
    }

    public function getRucProveedor() {
        return $this->rucproveedor;
    }

    public function getDirProveedor() {
        return $this->dirproveedor;
    }

    public function getTelProveedor() {
        return $this->telproveedor;
    }

    public function getEmailProveedor() {
        return $this->emailproveedor;
    }

    // setters
    public function setIdProveedor($id) {
        $this->idproveedor = $id;
    }

    public function setNomProveedor($nombre) {
        $this->nomproveedor = $nombre;
    }

    public function setRucProveedor($ruc) {
        $this->rucproveedor = $ruc;
    }

    public function setDirProveedor($direccion) {
        $this->dirproveedor = $direccion;
    }

    public function setTelProveedor($telefono) {
        $this->telproveedor = $telefono;
    }

    public function setEmailProveedor($email) {
        $this->emailproveedor = $email;
    }
}
?>