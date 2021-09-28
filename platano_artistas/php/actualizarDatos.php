<?php
 session_start();
$id=$_SESSION['id_artista'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];





if($nombre=="" or $nombre==" " or $correo=="" or $correo==" "){
    echo 0;
}else{
    require '../../conexion.php';
    $nueva_consulta1= $mysqli->prepare("UPDATE artistas SET nombre=?,correo_electronico=? where id_artista=?");
    $nueva_consulta1->bind_param('sss',$nombre,$correo,$id);
    echo $nueva_consulta1->execute();

    
}

?>