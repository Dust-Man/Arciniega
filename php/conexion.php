<?php 
$servidor="sqlc75a.carrierzone.com";
$usuario="acerosyper405759";
$password="Newton3chandoColado";
$nombre_bd="materiales_acerosyper405759";

$conexion=mysqli_connect($servidor ,$usuario , $password , $nombre_bd);
 if(!$conexion){
echo "Error en la conexion :" . mysqli_connect_error() ;
 }
?> 