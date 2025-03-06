<?php
class Conexion {
    private static $pdo = null;

    private function __construct() {} 

    public static function obtenerConexion() {
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO("mysql:host=localhost;dbname=ca_cerro", "root", "");
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Error al conectar a la base de datos: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>
