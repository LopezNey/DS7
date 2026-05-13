<?php
session_start();
require_once 'consultasBD.php';
 

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}
 

if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
    header('Location: login.php');
    exit;
}
 

$modeloServicio = new Servicio();
$servicios      = $modeloServicio->obtenerTodos();
 
$resultado = null;
$advertencia = '';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seleccionados = $_POST['servicios'] ?? [];
 
    if (empty($seleccionados)) {
        $advertencia = '⚠ Debe seleccionar al menos un servicio.';
    } else {

        $ids = array_map('intval', $seleccionados);
 

        $detalle = $modeloServicio->obtenerSeleccionados($ids);
 
        if (empty($detalle)) {
            $advertencia = '⚠ Los servicios seleccionados no son válidos.';
        } else {
            $total = 0;
            foreach ($detalle as $s) {
                $total += (int)$s['costo'];
            }
            $resultado = ['detalle' => $detalle, 'total' => $total];
        }
    }
} 

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de servicios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="contenedor">
 
    <div class="barra-usuario">
        <span>Hola, <strong><?= htmlspecialchars($_SESSION['nombre']) ?></strong></span>
        <a class="boton-salir" href="?logout=1">Cerrar sesión</a>
    </div>
 
    <?php if ($resultado !== null): ?>
 

        <h1>Resumen de la solicitud</h1>
 
        <div class="resumen">
            <p><strong>Cliente:</strong> <?= htmlspecialchars($_SESSION['nombre']) ?></p>
            <p><strong>Fecha de nacimiento:</strong> <?= htmlspecialchars($_SESSION['fechaNacimiento']) ?></p>
            <p><strong>Género:</strong> <?= htmlspecialchars($_SESSION['genero']) ?></p>
            <p><strong>Nacionalidad:</strong> <?= htmlspecialchars($_SESSION['nacionalidad']) ?></p>
            <p><strong>Dirección:</strong> <?= htmlspecialchars($_SESSION['direccion']) ?></p>
 
            <h2>Servicios seleccionados</h2>
            <ul>
                <?php foreach ($resultado['detalle'] as $s): ?>
                    <li>
                        <?= htmlspecialchars($s['nombre_servicio']) ?>
                        <span>$<?= number_format((int)$s['costo'], 2) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
 
            <p class="total">
                Total a pagar: <strong>$<?= number_format($resultado['total'], 2) ?></strong>
            </p>
 
            <a href="formulario.php" class="boton">Nueva solicitud</a>
        </div>
 
    <?php else: ?>
 

        <h1>Solicitud de servicios</h1>
 
        <?php if ($advertencia !== ''): ?>
            <p class="error"><?= htmlspecialchars($advertencia) ?></p>
        <?php endif; ?>
 
        <fieldset class="datos-cliente">
            <legend>Datos del cliente</legend>
            <p><strong>Nombre:</strong> <?= htmlspecialchars($_SESSION['nombre']) ?></p>
            <p><strong>Fecha de nacimiento:</strong> <?= htmlspecialchars($_SESSION['fechaNacimiento']) ?></p>
            <p><strong>Género:</strong> <?= htmlspecialchars($_SESSION['genero']) ?></p>
            <p><strong>Nacionalidad:</strong> <?= htmlspecialchars($_SESSION['nacionalidad']) ?></p>
            <p><strong>Dirección:</strong> <?= htmlspecialchars($_SESSION['direccion']) ?></p>
        </fieldset>
 
        <form method="POST" action="formulario.php">
            <fieldset>
                <legend>Seleccione los servicios</legend>
 
                <?php if (empty($servicios)): ?>
                    <p class="error">No hay servicios cargados en la base de datos.</p>
                <?php else: ?>
                    <?php foreach ($servicios as $s): ?>
                        <label class="checkbox">
                            <input type="checkbox" name="servicios[]"
                                   value="<?= (int)$s['id'] ?>">
                            <span>
                                <?= htmlspecialchars($s['nombre_servicio']) ?>
                                <em>$<?= number_format((int)$s['costo'], 2) ?></em>
                            </span>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </fieldset>
 
            <button type="submit">Enviar solicitud</button>
        </form>
 
    <?php endif; ?>
</div>
</body>
</html>