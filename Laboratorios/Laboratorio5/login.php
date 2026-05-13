
<?php

session_start();
require_once 'consultasBD.php';
 

if (isset($_SESSION['usuario_id'])) {
    header('Location: formulario.php');
    exit;
}
 
$error = '';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario    = trim($_POST['usuario']    ?? '');
    $contrasena = $_POST['contrasena']      ?? '';
 
    if ($usuario === '' || $contrasena === '') {
        $error = 'Debe completar todos los campos.';
    } else {
        $modelo = new Usuario();
        $u = $modelo->login($usuario, $contrasena);
 
        if ($u !== null) {

            session_regenerate_id(true);
 

            $_SESSION['usuario_id']      = $u['id'];
            $_SESSION['usuario']         = $u['usuario'];
            $_SESSION['nombre']          = $u['nombre'];
            $_SESSION['fechaNacimiento'] = $u['fechaNacimiento'];
            $_SESSION['genero']          = $u['genero'];
            $_SESSION['nacionalidad']    = $u['nacionalidad'];
            $_SESSION['direccion']       = $u['direccion'];
 
            header('Location: formulario.php');
            exit;
        } else {
            $error = 'Usuario o contraseña incorrectos.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="contenedor">
    <h1>Iniciar sesión</h1>
 
    <?php if ($error !== ''): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
 
    <form method="POST" action="login.php">
        <label>Usuario
            <input type="text" name="usuario" required maxlength="30"
                   value="<?= htmlspecialchars($_POST['usuario'] ?? '') ?>">
        </label>
 
        <label>Contraseña
            <input type="password" name="contrasena" required>
        </label>
 
        <button type="submit">Ingresar</button>
    </form>
 
    <p class="enlace">¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
</div>
</body>
</html>
