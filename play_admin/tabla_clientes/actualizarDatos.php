<?php
require '../../conexion.php';
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$fecha=$_POST['fecha'];
$correo=$_POST['correo'];
$premium=$_POST['premium'];


if($nombre=="" or $nombre==" " or $fecha=="" or $fecha==" " or $correo=="" or $correo==" " or $premium=="" or $premium==" "){
    echo 0;
}else{
    
    require '../../conexion.php';
    $nueva_consulta1= $mysqli->prepare("UPDATE clientes SET Nombre=?,fecha_nacimiento=?,Correo_Electronico=?,Estado_Premium=? where id_cliente=?");
    $nueva_consulta1->bind_param('sssss',$nombre,$fecha,$correo,$premium,$id);
    echo $nueva_consulta1->execute();
    
}



?>