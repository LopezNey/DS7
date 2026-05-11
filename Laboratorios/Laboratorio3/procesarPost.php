<?php
require_once 'Formulario.php';

$formulario = new Formulario();

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$cedula = $_POST['cedula'];
$edad = $_POST['edad'];

$formulario->mostrarRegistro($nombre, $email, $cedula, $edad);

$formulario->mostrarServidor();
?>
