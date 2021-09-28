<?php
$id=$_POST['id'];
require '../../conexion.php';
$nueva_consulta= $mysqli->prepare("UPDATE albums SET estado='I' where id_album=?");
$nueva_consulta->bind_param('s',$id);
$nueva_consulta->execute();

$nueva_consulta2= $mysqli->prepare("UPDATE musica SET autorizacion='I',estado='I' where id_album=?");
$nueva_consulta2->bind_param('s',$id);
echo $nueva_consulta2->execute();

?>