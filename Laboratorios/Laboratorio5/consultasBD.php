<?php
require_once "../Conexion.php";

class Libro extends Conexion {
    
    public function obtenerTodos() {
        try {
            $conexion = Conexion::Conectar();
            $consulta = $conexion->prepare(
                "SELECT * FROM lista_servios ORDER BY id"
            );
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }
    //busqueda por registro para el login
    public function obtenerRegistro($usuario, $contrasena) {
        try {
            $conexion = Conexion::Conectar();
            $consulta = $conexion->prepare(
                "SELECT * FROM lista_servios WHERE usuario = :usuario AND contrasena = :contrasena"
            );
            $consulta->bindParam(':usuario', $usuario);
            $consulta->bindParam(':contrasena', $contrasena);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }
    //busqueda por servicio
    public function buscarPorNombre($servicio) {
        try {
            $conexion = Conexion::Conectar();
            $busqueda = '%' . $servicio . '%';
            $consulta = $conexion->prepare(
                "SELECT * FROM lista_servios WHERE nombre LIKE :nombre"
            );
            $consulta->bindParam(':nombre', $busqueda);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    public function insertar($nombre, $usuario, $contrasena, $fechaNacimiento, $genero, $nacionalidad, $direccion) {
        try {
            $conexion = Conexion::Conectar();
            $consulta = $conexion->prepare(
                "INSERT INTO lista_servios (nombre, usuario, contrasena, fechaNacimiento, genero, nacionalidad, direccion)
                 VALUES (:nombre, :usuario, :contrasena, :fechaNacimiento, :genero, :nacionalidad, :direccion)"
            );
            $consulta->bindParam(':nombre',    $nombre);
            $consulta->bindParam(':usuario',   $usuario);
            $consulta->bindParam(':contrasena', $contrasena);
            $consulta->bindParam(':fechaNacimiento', $fechaNacimiento);
            $consulta->bindParam(':genero',    $genero);
            $consulta->bindParam(':nacionalidad', $nacionalidad);
            $consulta->bindParam(':direccion', $direccion);
            $consulta->execute();
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}
?>