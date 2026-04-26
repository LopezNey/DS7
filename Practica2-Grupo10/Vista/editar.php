<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Libro</title>
    <link rel="stylesheet" href="../Assets/css/style.css">
</head>
<body>

<nav class="navbar">
    <h1>Biblioteca</h1>
    <a href="LibroController.php?accion=listar">← Volver</a>
</nav>

<div class="container">
    <div class="card">
        <h2>Editar Libro</h2>

        <form method="POST" action="LibroController.php?accion=editar&id=<?= $libro['id'] ?>">

            <div class="form-group">
                <label for="nombre">Nombre del libro</label>
                <input type="text" id="nombre" name="nombre"
                       value="<?= htmlspecialchars($libro['nombre']) ?>" required>
            </div>

            <div class="form-group">
                <label for="autor">Autor</label>
                <input type="text" id="autor" name="autor"
                       value="<?= htmlspecialchars($libro['autor']) ?>" required>
            </div>

            <div class="form-group">
                <label for="categoria">Categoría</label>
                <input type="text" id="categoria" name="categoria"
                       value="<?= htmlspecialchars($libro['categoria']) ?>" required>
            </div>

            <div class="form-group">
                <label for="anio">Año de publicación</label>
                <input type="number" id="anio" name="anio"
                       min="1000" max="2099"
                       value="<?= $libro['anio'] ?>" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="LibroController.php?accion=listar" class="btn btn-secondary">Cancelar</a>
            </div>

        </form>
    </div>
</div>

</body>
</html>