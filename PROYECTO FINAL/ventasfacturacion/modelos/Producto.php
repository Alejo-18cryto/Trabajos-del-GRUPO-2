<?php
class Producto {
    public $idproducto;
    public $idproveedor;
    public $nomproducto;
    public $unimed;
    public $stock;
    public $cosuni;
    public $preuni;
    public $idcategoria;
    public $estado;

    public function __construct($idproducto, $idproveedor, $nomproducto, $unimed, $stock, $cosuni, $preuni, $idcategoria, $estado) {
        $this->idproducto = $idproducto;
        $this->idproveedor = $idproveedor;
        $this->nomproducto = $nomproducto;
        $this->unimed = $unimed;
        $this->stock = $stock;
        $this->cosuni = $cosuni;
        $this->preuni = $preuni;
        $this->idcategoria = $idcategoria;
        $this->estado = $estado;
    }
}
