<?php
// Base de datos
include 'php/conexion.php';
// Configuración de la paginación
$elementosPorPagina = 10;
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($paginaActual - 1) * $elementosPorPagina;

// Consulta para obtener los productos con límite y paginación
$sql = "SELECT * FROM productos ORDER BY producto_id ASC LIMIT $inicio, $elementosPorPagina";
$resultset = mysqli_query($conexion, $sql) or die("Database error: " . mysqli_error($conexion));
?>

<!-- Sección para mostrar los resultados -->
<?php while ($record = mysqli_fetch_assoc($resultset)) { ?>
<article class="card">
  <section class="card__hero">
    <p class="card__job-title">
    <?php
    echo $record['nombre'];//Se muestra informacion de la base de datos
          ?>        
</p>
  </section>

  <footer class="card__footer">
    <div class="card__job-summary">
      <div class="card__job-icon">
      <span class="material-symbols-outlined">
construction
</span>
      </div>
      <div class="card__job">
        <p class="card__job-title">
          <?php
    echo $record['descripcion']; //Se muestra infomacion de la base de datos
          ?>

        </p>
      </div>
    </div>
  </footer>
</article>


<?php } ?>

<div class="pagination">
    <!-- Sección de paginación -->
    <?php
    // Consulta para contar el total de elementos en la tabla de productos
    $sqlTotal = "SELECT COUNT(*) as total FROM productos";
    $resultTotal = mysqli_query($conexion, $sqlTotal);
    $filaTotal = mysqli_fetch_assoc($resultTotal);
    $totalElementos = $filaTotal['total'];
    $totalPaginas = ceil($totalElementos / $elementosPorPagina);

    // Enlace a la página anterior
    if ($paginaActual > 1) {
        echo "<a href='?pagina=" . ($paginaActual - 1) . "'>&laquo; Anterior</a> ";
    }

    // Enlaces para todas las páginas
    for ($i = 1; $i <= $totalPaginas; $i++) {
        $claseActiva = ($i == $paginaActual) ? 'active' : '';
        echo "<a class='$claseActiva' href='?pagina=$i'>$i</a> ";
    }

    // Enlace a la página siguiente
    if ($paginaActual < $totalPaginas) {
        echo "<a href='?pagina=" . ($paginaActual + 1) . "'>Siguiente &raquo;</a> ";
    }
    ?>
</div>

<?php
// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
