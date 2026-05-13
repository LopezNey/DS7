<?php

require_once 'conexion.php';
 
class Usuario {
 

    public function existeUsuario($usuario) {
        try {
            $conexion = Conexion::Conectar();
            $consulta = $conexion->prepare(
                "SELECT id FROM info_usuario WHERE usuario = :usuario"
            );
            $consulta->bindParam(':usuario', $usuario);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_ASSOC) !== false;
        } catch (PDOException $e) {
            return false;
        }
    }
 

    public function registrar($nombre, $usuario, $contrasena, $fechaNacimiento,
                              $genero, $nacionalidad, $direccion) {
        try {
            $conexion = Conexion::Conectar();
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);
 
            $consulta = $conexion->prepare(
                "INSERT INTO info_usuario
                    (nombre, usuario, contrasena, fechaNacimiento,
                     genero, nacionalidad, direccion)
                 VALUES
                    (:nombre, :usuario, :contrasena, :fechaNacimiento,
                     :genero, :nacionalidad, :direccion)"
            );
            $consulta->bindParam(':nombre',          $nombre);
            $consulta->bindParam(':usuario',         $usuario);
            $consulta->bindParam(':contrasena',      $hash);
            $consulta->bindParam(':fechaNacimiento', $fechaNacimiento);
            $consulta->bindParam(':genero',          $genero);
            $consulta->bindParam(':nacionalidad',    $nacionalidad);
            $consulta->bindParam(':direccion',       $direccion);
            $consulta->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
 

    public function login($usuario, $contrasena) {
        try {
            $conexion = Conexion::Conectar();
            $consulta = $conexion->prepare(
                "SELECT * FROM info_usuario WHERE usuario = :usuario"
            );
            $consulta->bindParam(':usuario', $usuario);
            $consulta->execute();
            $u = $consulta->fetch(PDO::FETCH_ASSOC);
 
            if ($u && password_verify($contrasena, $u['contrasena'])) {
                unset($u['contrasena']); // no devolver el hash
                return $u;
            }
            return null;
        } catch (PDOException $e) {
            return null;
        }
    }
}
 

class Servicio {
 

    public function obtenerTodos() {
        try {
            $conexion = Conexion::Conectar();
            $consulta = $conexion->prepare(
                "SELECT * FROM lista_servicio ORDER BY id"
            );
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
 

    public function obtenerSeleccionados($ids) {
        $todos       = $this->obtenerTodos();
        $resultado   = [];
        foreach ($todos as $servicio) {
            if (in_array($servicio['id'], $ids)) {
                $resultado[] = $servicio;
            }
        }
        return $resultado;
    }
}
?>