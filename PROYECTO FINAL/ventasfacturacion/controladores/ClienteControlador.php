<?php
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../modelos/Cliente.php';

class ClienteControlador {
    public function listar() {
        $pdo = Conexion::conectar();
        $stmt = $pdo->query("select * from clientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtener($id) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("select * from clientes where idcliente = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($cliente) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("insert into clientes (ndociente, ruccliente, tidentite, tcliente, emailcliente) values (?, ?, ?, ?, ?)");
        return $stmt->execute([
            $cliente->getNDociente(),
            $cliente->getRucCliente(),
            $cliente->getTIdentite(),
            $cliente->getTCliente(),
            $cliente->getEmailCliente()
        ]);
    }

    public function actualizar($cliente) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("update clientes set ndociente=?, ruccliente=?, tidentite=?, tcliente=?, emailcliente=? where idcliente=?");
        return $stmt->execute([
            $cliente->getNDociente(),
            $cliente->getRucCliente(),
            $cliente->getTIdentite(),
            $cliente->getTCliente(),
            $cliente->getEmailCliente(),
            $cliente->getIdCliente()
        ]);
    }

    public function eliminar($id) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("delete from clientes where idcliente = ?");
        return $stmt->execute([$id]);
    }
}
?>
