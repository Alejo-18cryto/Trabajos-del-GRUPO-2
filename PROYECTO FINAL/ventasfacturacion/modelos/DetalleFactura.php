<?php
class DetalleFactura {
    public $iddetalle;
    public $idfactura;
    public $idproducto;
    public $cant;       // cantidad
    public $cosuni;     // costo unitario
    public $preuni;     // precio unitario (al cliente)

    public function __construct($iddetalle, $idfactura, $idproducto, $cant, $cosuni, $preuni) {
        $this->iddetalle = $iddetalle;
        $this->idfactura = $idfactura;
        $this->idproducto = $idproducto;
        $this->cant = $cant;
        $this->cosuni = $cosuni;
        $this->preuni = $preuni;
    }
}
