<?php

class Conexion {
    public static function Conectar() {
        $host        = 'localhost';
        $baseDeDatos = 'servicios_lab5';
        $usuario     = 'root';
        $contrasena  = '';
 
        try {
            $conexion = new PDO(
                "mysql:host=$host;dbname=$baseDeDatos;charset=utf8",
                $usuario,
                $contrasena
            );
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            die("Error de conexión a la base de datos.");
        }
    }
}
?>
 