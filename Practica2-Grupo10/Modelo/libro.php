<?php
require_once "../Config/Conexion.php";

class Libro extends Conexion {
    
    public function obtenerTodos() {
        try {
            $conexion = Conexion::Conectar();
            $consulta = $conexion->prepare(
                "SELECT * FROM libros ORDER BY id DESC LIMIT 5"
            );
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    public function obtenerPorId($id) {
        try {
            $conexion = Conexion::Conectar();
            $consulta = $conexion->prepare(
                "SELECT * FROM libros WHERE id = :id"
            );
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }

    public function buscarPorNombre($nombre) {
        try {
            $conexion = Conexion::Conectar();
            $busqueda = '%' . $nombre . '%';
            $consulta = $conexion->prepare(
                "SELECT * FROM libros WHERE nombre LIKE :nombre"
            );
            $consulta->bindParam(':nombre', $busqueda);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    public function insertar($nombre, $autor, $categoria, $anio) {
        try {
            $conexion = Conexion::Conectar();
            $consulta = $conexion->prepare(
                "INSERT INTO libros (nombre, autor, categoria, anio)
                 VALUES (:nombre, :autor, :categoria, :anio)"
            );
            $consulta->bindParam(':nombre',    $nombre);
            $consulta->bindParam(':autor',     $autor);
            $consulta->bindParam(':categoria', $categoria);
            $consulta->bindParam(':anio',      $anio);
            $consulta->execute();
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function actualizar($id, $nombre, $autor, $categoria, $anio) {
        try {
            $conexion = Conexion::Conectar();
            $consulta = $conexion->prepare(
                "UPDATE libros
                 SET nombre = :nombre, autor = :autor,
                     categoria = :categoria, anio = :anio
                 WHERE id = :id"
            );
            $consulta->bindParam(':nombre',    $nombre);
            $consulta->bindParam(':autor',     $autor);
            $consulta->bindParam(':categoria', $categoria);
            $consulta->bindParam(':anio',      $anio);
            $consulta->bindParam(':id',        $id);
            $consulta->execute();
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function eliminar($id) {
        try {
            $conexion = Conexion::Conectar();
            $consulta = $conexion->prepare(
                "DELETE FROM libros WHERE id = :id"
            );
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}
?>