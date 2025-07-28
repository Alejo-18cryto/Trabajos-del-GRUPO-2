<?php
class Factura {
    public $idfactura;
    public $fecha;
    public $idcliente;
    public $fechareg;
    public $idusuario;
    public $idcondicion;
    public $valorventa;
    public $igv;

    public function __construct($idfactura, $fecha, $idcliente, $fechareg, $idusuario, $idcondicion, $valorventa, $igv) {
        $this->idfactura = $idfactura;
        $this->fecha = $fecha;
        $this->idcliente = $idcliente;
        $this->fechareg = $fechareg;
        $this->idusuario = $idusuario;
        $this->idcondicion = $idcondicion;
        $this->valorventa = $valorventa;
        $this->igv = $igv;
    }
}
