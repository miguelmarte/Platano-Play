<?php
$id=$_POST['id'];
require '../../conexion.php';
$nueva_consulta= $mysqli->prepare("UPDATE administradores SET estado='I' where id_administrador=?");
$nueva_consulta->bind_param('s',$id);
echo $nueva_consulta->execute();

?>