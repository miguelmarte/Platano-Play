<?php
session_start();

$id=$_SESSION['id'];
$asunto=$_POST['asunto'];
$detalle=$_POST['detalle'];


require '../../../conexion.php';
$sql="INSERT INTO contacto (id_cliente,asunto,detalle) values('$id','$asunto','$detalle')";
$resultado=mysqli_query($mysqli,$sql);

echo "<script>";
echo "alert('Mensaje enviado con exito');";  
echo "window.location = '../index.php';";
echo "</script>"; 



?>