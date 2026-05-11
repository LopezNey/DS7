<?php
$nombre = trim($_POST['nombre'] ?? '');

setcookie('nombre', $nombre, time() + 300, '/');
header('Location: Bienvenida.php');
exit;
?>