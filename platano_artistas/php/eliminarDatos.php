<?php
session_start();
$id=$_SESSION['id_artista'];
require '../../conexion.php';
$nueva_consulta= $mysqli->prepare("UPDATE artistas SET estado='I' where id_artista=?");
$nueva_consulta->bind_param('s',$id);

session_destroy();
echo $nueva_consulta->execute();

?>