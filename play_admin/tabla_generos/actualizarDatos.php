<?php
require '../../conexion.php';

$id=$_POST['id'];
$genero=$_POST['genero'];



if($genero=="" or $genero==" "){
    echo 0;
}else{
    require '../../conexion.php';
    $nueva_consulta1= $mysqli->prepare("UPDATE genero SET genero=? where id_genero=?");
    $nueva_consulta1->bind_param('ss',$genero,$id);
    echo $nueva_consulta1->execute();
}

?>