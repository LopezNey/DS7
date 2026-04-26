<?php
require_once "../Modelo/Libro.php";

$libroModel = new Libro();
$accion = $_GET['accion'] ?? 'listar';

switch ($accion) {

    case 'listar':
        $busqueda = trim($_GET['busqueda'] ?? '');
        if ($busqueda !== '') {
            $libros = $libroModel->buscarPorNombre($busqueda);
        } else {
            $libros = $libroModel->obtenerTodos();
        }
        include "../Vista/Listar.php";
        break;

    case 'crear':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libroModel->insertar(
                trim($_POST['nombre']),
                trim($_POST['autor']),
                trim($_POST['categoria']),
                trim($_POST['anio'])
            );
            header("Location: LibroController.php?accion=listar");
            exit;
        }
        include "../Vista/Crear.php";
        break;

    case 'editar':
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libroModel->actualizar(
                $id,
                trim($_POST['nombre']),
                trim($_POST['autor']),
                trim($_POST['categoria']),
                trim($_POST['anio'])
            );
            header("Location: LibroController.php?accion=listar");
            exit;
        }
        $libro = $libroModel->obtenerPorId($id);
        include "../Vista/Editar.php";
        break;

    case 'eliminar':
        $libroModel->eliminar($_GET['id']);
        header("Location: LibroController.php?accion=listar");
        exit;
}
?>