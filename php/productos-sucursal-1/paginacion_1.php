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

  <div class="card">
    <div class="card-image">
      <img src="<?php
                echo $record['imagen'];

                ?>" alt="">


    </div>
    <div class="category">
      <?php
      echo $record['categoria'];
      ?>
    </div>
    <div class="heading">
      <?php
      echo $record['nombre'];
      ?>
      <div class="author">
        <?php
        echo $record['descripcion'];
        ?>
      </div>
    </div>
  </div>


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