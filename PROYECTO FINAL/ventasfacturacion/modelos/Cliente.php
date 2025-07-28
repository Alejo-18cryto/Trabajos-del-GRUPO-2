<?php
class Cliente {
    private $idcliente, $ndociente, $ruccliente, $tidentite, $tcliente, $emailcliente;

    public function getIdCliente() { return $this->idcliente; }
    public function setIdCliente($id) { $this->idcliente = $id; }

    public function getNDociente() { return $this->ndociente; }
    public function setNDociente($n) { $this->ndociente = $n; }

    public function getRucCliente() { return $this->ruccliente; }
    public function setRucCliente($r) { $this->ruccliente = $r; }

    public function getTIdentite() { return $this->tidentite; }
    public function setTIdentite($t) { $this->tidentite = $t; }

    public function getTCliente() { return $this->tcliente; }
    public function setTCliente($t) { $this->tcliente = $t; }

    public function getEmailCliente() { return $this->emailcliente; }
    public function setEmailCliente($e) { $this->emailcliente = $e; }
}
?>
