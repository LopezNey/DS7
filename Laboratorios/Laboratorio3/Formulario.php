<?php
class Formulario {

    public function mostrarRegistro($nombre, $email, $cedula, $edad) {
        echo "<h2>Datos del Registro</h2>";
        echo "<p><b>Nombre:</b> " . $nombre . "</p>";
        echo "<p><b>Email:</b> " . $email . "</p>";
        echo "<p><b>Cédula:</b> " . $cedula . "</p>";
        echo "<p><b>Edad:</b> " . $edad . " años</p>";
    }

    public function calcularIMC($nombre, $peso, $altura) {
        $imc = $peso / ($altura * $altura);

        echo "<h2>Resultado del IMC</h2>";
        echo "<p><b>Nombre:</b> " . $nombre . "</p>";
        echo "<p><b>Peso:</b> " . $peso . " kg</p>";
        echo "<p><b>Altura:</b> " . $altura . " m</p>";
        echo "<p><b>IMC:</b> " . number_format($imc, 2) . "</p>";

        if ($imc < 18.5) {
            echo "<p><b>Clasificación:</b> Bajo peso</p>";
        } else if ($imc < 25) {
            echo "<p><b>Clasificación:</b> Peso normal</p>";
        } else if ($imc < 30) {
            echo "<p><b>Clasificación:</b> Sobrepeso</p>";
        } else {
            echo "<p><b>Clasificación:</b> Obesidad</p>";
        }
    }

    // Mostrar variables del servidor
    public function mostrarServidor() {
        echo "<h2>Variables del Servidor</h2>";
        echo "<p><b>PHP_SELF:</b> " . $_SERVER['PHP_SELF'] . "</p>";
        echo "<p><b>SERVER_NAME:</b> " . $_SERVER['SERVER_NAME'] . "</p>";
        echo "<p><b>HTTP_USER_AGENT:</b> " . $_SERVER['HTTP_USER_AGENT'] . "</p>";
        echo "<p><b>REQUEST_METHOD:</b> " . $_SERVER['REQUEST_METHOD'] . "</p>";
        echo "<p><b>REMOTE_ADDR:</b> " . $_SERVER['REMOTE_ADDR'] . "</p>";
        echo "<p><b>QUERY_STRING:</b> " . $_SERVER['QUERY_STRING'] . "</p>";
    }
}
?>
