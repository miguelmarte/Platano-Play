<?php
$id=$_POST['id'];
require '../../conexion.php';
$nueva_consulta= $mysqli->prepare("UPDATE genero SET estado='I' where id_genero=?");
$nueva_consulta->bind_param('s',$id);
echo $nueva_consulta->execute();

?>