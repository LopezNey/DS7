<?php
class Formulario {

    public function mostrarRegistro($nombre, $usuario, $contrasena, $fechaNacimiento, $genero, $nacionalidad, $direccion) {
        echo "<h2>Datos del Registro</h2>";
        echo "<p><b>Nombre:</b> " . $nombre . "</p>";
        echo "<p><b>Usuario:</b> " . $usuario . "</p>";
        echo "<p><b>Contraseña:</b> " . $contrasena . "</p>";
        echo "<p><b>Fecha de Nacimiento:</b> " . $fechaNacimiento . "</p>";
        echo "<p><b>Género:</b> " . $genero . "</p>";
        echo "<p><b>Nacionalidad:</b> " . $nacionalidad . "</p>";
        echo "<p><b>Dirección:</b> " . $direccion . "</p>";

    }

}
?>
