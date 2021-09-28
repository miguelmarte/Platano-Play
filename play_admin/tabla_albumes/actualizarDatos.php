<?php
require '../../conexion.php';
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$genero=$_POST['genero'];


if($nombre=="" or $nombre==" " or $genero=="" or $genero==" "){
    echo 0;
}else{
    require '../../conexion.php';
    $nueva_consulta1= $mysqli->prepare("UPDATE albums SET nombre=?,id_genero=? where id_album=?");
    $nueva_consulta1->bind_param('sss',$nombre,$genero,$id);
    echo $nueva_consulta1->execute();
}



?>