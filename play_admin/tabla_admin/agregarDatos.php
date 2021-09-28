<?php
require '../../conexion.php';
$nombre=$_POST['nombre'];
$usuario=$_POST['usuario'];
$pass=$_POST['pass'];

require '../../conexion.php';
$nueva_consulta1= $mysqli->prepare("SELECT * FROM administradores WHERE Usuario=? and estado='I'");
$nueva_consulta1->bind_param('s',$usuario);
$nueva_consulta1->execute();
$resultado1=$nueva_consulta1->get_result();

if($nombre=="" or $nombre==" " or $usuario=="" or $usuario==" " or $pass=="" or $pass==" "){
    echo 0;
}else{
    if($resultado1->num_rows>0){
        require '../../conexion.php';
        $nueva_consulta2= $mysqli->prepare("UPDATE administradores SET estado='A' where Usuario=?");
        $nueva_consulta2->bind_param('s',$usuario);
        echo $nueva_consulta2->execute();

    }else{
        require '../../conexion.php';
        $sql="INSERT INTO administradores (Nombre,Usuario,password) values('$nombre','$usuario','$pass')";
        echo $resultado=mysqli_query($mysqli,$sql);
    }
        
    
}



?>