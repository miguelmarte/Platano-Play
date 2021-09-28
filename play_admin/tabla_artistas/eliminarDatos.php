<?php
$id=$_POST['id'];
require '../../conexion.php';
$nueva_consulta= $mysqli->prepare("UPDATE artistas SET estado='I' where id_artista=?");
$nueva_consulta->bind_param('s',$id);
$nueva_consulta->execute();

require '../../conexion.php';
$nueva_consulta1= $mysqli->prepare("UPDATE albums SET estado='I' where id_artista=?");
$nueva_consulta1->bind_param('s',$id);
$nueva_consulta1->execute();

require '../../conexion.php';
$nueva_consulta2= $mysqli->prepare("UPDATE musica SET estado='I',autorizacion='I' where id_artista=?");
$nueva_consulta2->bind_param('s',$id);
echo $nueva_consulta2->execute();

?>