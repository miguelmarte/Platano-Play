<?php

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$fecha=$_POST['fecha'];




if($nombre=="" or $nombre==" " or $correo=="" or $correo==" " or $fecha=="" or $fecha==" "){
    echo 0;
}else{
    require '../../../conexion.php';
    $nueva_consulta1= $mysqli->prepare("UPDATE clientes SET Nombre=?,Correo_Electronico=?,fecha_nacimiento=? where id_cliente=?");
    $nueva_consulta1->bind_param('ssss',$nombre,$correo,$fecha,$id);
    echo $nueva_consulta1->execute();

    
}

?>