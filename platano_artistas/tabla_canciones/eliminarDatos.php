<?php
$id=$_POST['id'];
require '../../conexion.php';
$nueva_consulta= $mysqli->prepare("UPDATE musica SET estado='I',autorizacion='I' where id_musica=?");
$nueva_consulta->bind_param('s',$id);
echo $nueva_consulta->execute();

?>