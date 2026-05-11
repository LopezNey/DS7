<?php
$nombre = $_COOKIE['nombre'] ?? '';
$tieneCookie = $nombre !== '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bienvenida</title>
</head>
<body>
	<?php if ($tieneCookie): ?>
		<h1>Bienvenido, <?php echo htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8'); ?>.</h1>
		<p>La cookie está activa y tu nombre fue guardado correctamente.</p>
		<p><a href="eliminarCookie.php">Salir</a></p>
	<?php else: ?>
		<h1>No se ha ingresado el nombre.</h1>
		<p><a href="index.html">Volver al formulario</a></p>
	<?php endif; ?>
</body>
</html>
