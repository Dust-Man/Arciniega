<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/principal.css">
    <link rel="icon" href="./img/logos/logo.png" type="png/jpg">
</head>
<body>
<?php
        include 'header.php';
        include 'php/conexion.php';


        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        $result = mysqli_query($conexion, $sql);
?>
<main>
    <div class="layout1 --color-dark --l1-nocentrar noticias">
        <?php while ($post = mysqli_fetch_assoc($result)): ?>
            <h2><?php echo htmlspecialchars($post['title']); ?></h2>
            <p>
                <?php
                // Mostrar solo los primeros 100 caracteres del contenido
                echo nl2br(htmlspecialchars(substr($post['content'], 0, 100))) . '...';
                ?>
            </p>
            <p><em>Publicado el <?php echo $post['created_at']; ?></em></p>
            <a href="post.php?id=<?php echo $post['id']; ?>">Leer más</a>
            <hr>
        <?php endwhile; ?>
    </div>
</main>
</body>
</html>