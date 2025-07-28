<?php
class conexion {
    public static function conectar() {
        try {
            $pdo = new pdo("mysql:host=localhost;dbname=ventasfacturacion;charset=utf8", "root", "");
            $pdo->setattribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (pdoexception $e) {
            die("error de conexión: " . $e->getmessage());
        }
    }
}