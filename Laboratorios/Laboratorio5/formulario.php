<?php
class Formulario {

    public function mostrarCotizacion($nombre, $serviciosSeleccionados, $total) {
        echo "<h2>Datos de la Cotización</h2>";
        echo "<p><b>Nombre:</b> " . $nombre . "</p>";
        echo "<p><b>Usuario:</b> " . $serviciosSeleccionados . "</p>";
        echo "<p><b>Total:</b> " . $total . "</p>";

    }

}
?>