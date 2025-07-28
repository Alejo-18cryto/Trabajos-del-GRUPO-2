<?php
class Usuario {
    private $idusuario;
    private $nomusuario;
    private $password;
    private $apellidos;
    private $nombres;
    private $email;
    private $estado;

    // Constructor
    public function __construct($idusuario = null, $nomusuario = null, $password = null, $apellidos = null, $nombres = null, $email = null, $estado = null) {
        $this->idusuario = $idusuario;
        $this->nomusuario = $nomusuario;
        $this->password = $password;
        $this->apellidos = $apellidos;
        $this->nombres = $nombres;
        $this->email = $email;
        $this->estado = $estado;
    }

    // Getters y Setters
    public function getIdUsuario() { return $this->idusuario; }
    public function setIdUsuario($idusuario) { $this->idusuario = $idusuario; }

    public function getNomUsuario() { return $this->nomusuario; }
    public function setNomUsuario($nomusuario) { $this->nomusuario = $nomusuario; }

    public function getPassword() { return $this->password; }
    public function setPassword($password) { $this->password = $password; }

    public function getApellidos() { return $this->apellidos; }
    public function setApellidos($apellidos) { $this->apellidos = $apellidos; }

    public function getNombres() { return $this->nombres; }
    public function setNombres($nombres) { $this->nombres = $nombres; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getEstado() { return $this->estado; }
    public function setEstado($estado) { $this->estado = $estado; }
}
?>
