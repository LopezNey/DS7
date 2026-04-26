<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Libro</title>
    <link rel="stylesheet" href="../Assets/css/style.css">
</head>
<body>

<nav class="navbar">
    <h1>Biblioteca</h1>
    <a href="LibroController.php?accion=listar">← Volver</a>
</nav>

<div class="container">
    <div class="card">
        <h2>Agregar Nuevo Libro</h2>

        <form method="POST" action="LibroController.php?accion=crear">

            <div class="form-group">
                <label for="nombre">Nombre del libro</label>
                <input type="text" id="nombre" name="nombre"
                       placeholder="Ej: Cien años de soledad" required>
            </div>

            <div class="form-group">
                <label for="autor">Autor</label>
                <input type="text" id="autor" name="autor"
                       placeholder="Ej: Gabriel García Márquez" required>
            </div>

            <div class="form-group">
                <label for="categoria">Categoría</label>
                <input type="text" id="categoria" name="categoria"
                       placeholder="Ej: Novela, Ciencia, Historia..." required>
            </div>

            <div class="form-group">
                <label for="anio">Año de publicación</label>
                <input type="number" id="anio" name="anio"
                       min="1000" max="2099"
                       placeholder="Ej: 1967" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="LibroController.php?accion=listar" class="btn btn-secondary">Cancelar</a>
            </div>

        </form>
    </div>
</div>

</body>
</html>