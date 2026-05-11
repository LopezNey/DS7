<?php
require_once 'Formulario.php';

$formulario = new Formulario();

$nombre = $_GET['nombre'];
$peso = $_GET['peso'];
$altura = $_GET['altura'];

$formulario->calcularIMC($nombre, $peso, $altura);

$formulario->mostrarServidor();
?>
