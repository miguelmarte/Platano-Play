<?php
require '../../conexion.php';
$id=$_POST['id'];
$titulo=$_POST['titulo'];
$genero=$_POST['genero'];
$duracion=$_POST['duracion'];
$explisito=$_POST['explisito'];


if($titulo=="" or $titulo==" " or $genero=="" or $genero==" " or $duracion=="" or $explisito==" " or $explisito=="" or $duracion==" "){
    echo 0;
}else{
    require '../../conexion.php';
    $nueva_consulta1= $mysqli->prepare("UPDATE musica SET titulo=?,id_genero=?,duracion=?,explisito=? where id_musica=?");
    $nueva_consulta1->bind_param('sssss',$titulo,$genero,$duracion,$explisito,$id);
    echo $nueva_consulta1->execute();
}



?>