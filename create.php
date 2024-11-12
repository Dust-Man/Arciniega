<?php
include 'php/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conexion, $_POST['title']);
    $content = mysqli_real_escape_string($conexion, $_POST['content']);

    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
    if (mysqli_query($conexion, $sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Artículo</title>
</head>
<body>
    <h1>Crear Nuevo Artículo</h1>
    <form action="create.php" method="POST">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required>
        
        <label for="content">Contenido:</label>
        <textarea id="content" name="content" rows="5" required></textarea>
        
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
