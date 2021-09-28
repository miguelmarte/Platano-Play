<?php
require '../../conexion.php';
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$genero=$_POST['genero'];
$correo=$_POST['correo'];


if($nombre=="" or $nombre==" " or $genero=="" or $genero==" " or $correo=="" or $correo==" "){
    echo 0;
}else{
    require '../../conexion.php';
    $nueva_consulta1= $mysqli->prepare("UPDATE artistas SET nombre=?,id_genero=?,correo_electronico=? where id_artista=?");
    $nueva_consulta1->bind_param('ssss',$nombre,$genero,$correo,$id);
    echo $nueva_consulta1->execute();
}



?>