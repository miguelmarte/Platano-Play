<?php
require '../../conexion.php';

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$usuario=$_POST['usuario'];



if($nombre=="" or $nombre==" " or $usuario=="" or $usuario==" "){
    echo 0;
}else{
    require '../../conexion.php';
    $nueva_consulta1= $mysqli->prepare("UPDATE administradores SET Nombre=?,Usuario=? where id_administrador=?");
    $nueva_consulta1->bind_param('sss',$nombre,$usuario,$id);
    echo $nueva_consulta1->execute();
}

?>