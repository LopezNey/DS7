<?php

session_start();
require_once 'consultasBD.php';
 
$error = '';
$exito = '';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre          = trim($_POST['nombre']          ?? '');
    $usuario         = trim($_POST['usuario']         ?? '');
    $contrasena      = $_POST['contrasena']           ?? '';
    $confirmar       = $_POST['confirmar']            ?? '';
    $fechaNacimiento = trim($_POST['fechaNacimiento'] ?? '');
    $genero          = trim($_POST['genero']          ?? '');
    $nacionalidad    = trim($_POST['nacionalidad']    ?? '');
    $direccion       = trim($_POST['direccion']       ?? '');
 

    if ($nombre === '' || $usuario === '' || $contrasena === '' || $confirmar === ''
        || $fechaNacimiento === '' || $genero === '' || $nacionalidad === ''
        || $direccion === '') {
        $error = 'Debe completar todos los campos.';
    } elseif (strlen($contrasena) < 6) {
        $error = 'La contraseña debe tener al menos 6 caracteres.';
    } elseif ($contrasena !== $confirmar) {
        $error = 'Las contraseñas no coinciden.';
    } elseif (!in_array($genero, ['Masculino', 'Femenino', 'Otro'])) {
        $error = 'Seleccione un género válido.';
    } else {
        $modelo = new Usuario();
 
        if ($modelo->existeUsuario($usuario)) {
            $error = 'El nombre de usuario ya está en uso.';
        } else {
            $ok = $modelo->registrar(
                $nombre, $usuario, $contrasena, $fechaNacimiento,
                $genero, $nacionalidad, $direccion
            );
 
            if ($ok) {
                $exito  = 'Usuario registrado exitosamente. Ya puede iniciar sesión.';
                $_POST  = []; // limpiar el formulario tras éxito
            } else {
                $error = 'Ocurrió un error al registrar el usuario.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="contenedor">
    <h1>Registro de cliente</h1>
 
    <?php if ($error !== ''): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
 
    <?php if ($exito !== ''): ?>
        <p class="exito"><?= htmlspecialchars($exito) ?></p>
    <?php endif; ?>
 
    <form method="POST" action="registro.php">
 
        <fieldset>
            <legend>Datos personales</legend>
 
            <label>Nombre completo
                <input type="text" name="nombre" required maxlength="100"
                       value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>">
            </label>
 
            <label>Fecha de nacimiento
                <input type="date" name="fechaNacimiento" required
                       max="<?= date('Y-m-d') ?>"
                       value="<?= htmlspecialchars($_POST['fechaNacimiento'] ?? '') ?>">
            </label>
 
            <label>Género
                <?php $g = $_POST['genero'] ?? ''; ?>
                <select name="genero" required>
                    <option value="">-- Seleccione --</option>
                    <option value="Masculino" <?= $g === 'Masculino' ? 'selected' : '' ?>>Masculino</option>
                    <option value="Femenino"  <?= $g === 'Femenino'  ? 'selected' : '' ?>>Femenino</option>
                    <option value="Otro"      <?= $g === 'Otro'      ? 'selected' : '' ?>>Otro</option>
                </select>
            </label>
 
            <label>Nacionalidad
                <input type="text" name="nacionalidad" required maxlength="30"
                       value="<?= htmlspecialchars($_POST['nacionalidad'] ?? 'Panameña') ?>">
            </label>
 
            <label>Dirección de residencia
                <textarea name="direccion" required maxlength="100" rows="2"
                ><?= htmlspecialchars($_POST['direccion'] ?? '') ?></textarea>
            </label>
        </fieldset>
 
        <fieldset>
            <legend>Acceso</legend>
 
            <label>Usuario
                <input type="text" name="usuario" required maxlength="30"
                       value="<?= htmlspecialchars($_POST['usuario'] ?? '') ?>">
            </label>
 
            <label>Contraseña (mínimo 6 caracteres)
                <input type="password" name="contrasena" required minlength="6">
            </label>
 
            <label>Confirmar contraseña
                <input type="password" name="confirmar" required minlength="6">
            </label>
        </fieldset>
 
        <button type="submit">Crear cuenta</button>
    </form>
 
    <p class="enlace">¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
</div>
</body>
</html>
