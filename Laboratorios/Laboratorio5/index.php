<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ola uwu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <h1>Biblioteca</h1>
    <a href="LibroController.php?accion=crear">+ Nuevo Libro</a>
</nav>

<div class="container">
    <div class="card">
        <h2>Lista de Libros</h2>
        <?php if (empty($_GET['busqueda'])): ?>
            <p class="list-hint">Mostrando los últimos 5 libros. Usa el buscador para encontrar cualquier libro.</p>
        <?php endif; ?>


        <form method="POST" action="login.php" class="search-form">
            <input type="hidden" name="accion" value="listar">
            <div class="search-group">
                <input
                    type="text"
                    name="busqueda"
                    placeholder="Buscar por nombre..."
                    value="<?= htmlspecialchars($_POST['busqueda'] ?? '') ?>"
                >
                <button type="submit" class="btn btn-primary">Buscar</button>
                <?php if (!empty($_POST['busqueda'])): ?>
                    <a href="LibroController.php?accion=listar" class="btn btn-secondary">Limpiar</a>
                <?php endif; ?>
            </div>
        </form>


        <?php if (!empty($_POST['busqueda'])): ?>
            <p class="search-info">
                Resultados para: <strong>"<?= htmlspecialchars($_POST['busqueda']) ?>"</strong>
                — <?= count($libros) ?> encontrado(s)
            </p>
        <?php endif; ?>


        <?php if (empty($libros)): ?>
            <p class="empty-msg">No se encontraron libros.</p>
        <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Autor</th>
                    <th>Categoría</th>
                    <th>Año</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($libros as $libro): ?>
                <tr>
                    <td><?= htmlspecialchars($libro['nombre']) ?></td>
                    <td><?= htmlspecialchars($libro['autor']) ?></td>
                    <td><span class="badge"><?= htmlspecialchars($libro['categoria']) ?></span></td>
                    <td><?= $libro['anio'] ?></td>
                    <td>
                        <a class="btn btn-warning"
                           href="LibroController.php?accion=editar&id=<?= $libro['id'] ?>">
                           Editar
                        </a>
                        <a class="btn btn-danger"
                           href="LibroController.php?accion=eliminar&id=<?= $libro['id'] ?>"
                           onclick="return confirm('¿Eliminar este libro?')">
                           Eliminar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

    </div>
</div>

</body>
</html>