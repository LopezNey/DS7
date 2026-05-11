<?php
class Conexion {
    public static function Conectar() {
        $host        = 'localhost';
        $baseDeDatos = 'biblioteca';
        $usuario     = 'root';
        $contrasena  = '';

        $conexion = new PDO(
            "mysql:host=$host;dbname=$baseDeDatos;charset=utf8",
            $usuario,
            $contrasena
        );

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    }
}