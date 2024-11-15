<?php
include 'php/conexion.php';

// Verificar si se ha pasado un ID en la URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Asegurarse de que el ID sea un número

    // Consultar el artículo específico
    $sql = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($conexion, $sql);

    // Verificar si se ha encontrado el artículo
    if ($post = mysqli_fetch_assoc($result)):
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($post['title']); ?></title>
    <link rel="stylesheet" href="./css/principal.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="noticias --100ptop">
    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
    <p><em>Publicado el <?php echo $post['created_at']; ?></em></p>
    
        <div class="cont-img-100per">
            <?php echo "<img src='".$post['banner_url']."'>" ?>
        </div>
        
        <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
        <a href="noticias.php">Volver al blog</a>
    </div>
</body>
<script src="./scripts/header.js"></script>
<script src="./scripts/mensajes.js"></script>
</html>

<?php
    else:
        echo "<p>Artículo no encontrado.</p>";
    endif;
} else {
    echo "<p>ID de artículo no especificado.</p>";
}
?>
