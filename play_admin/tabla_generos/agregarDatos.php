<?php

$genero=$_POST['genero'];

require '../../conexion.php';
$nueva_consulta1= $mysqli->prepare("SELECT * FROM genero WHERE genero=? and estado='I'");
$nueva_consulta1->bind_param('s',$genero);
$nueva_consulta1->execute();
$resultado1=$nueva_consulta1->get_result();

if($genero=="" or $genero==" "){
    echo 0;
}else{
    if($resultado1->num_rows>0){
        require '../../conexion.php';
        $nueva_consulta2= $mysqli->prepare("UPDATE genero SET estado='A' where genero=?");
        $nueva_consulta2->bind_param('s',$genero);
        echo $nueva_consulta2->execute();

    }else{
        require '../../conexion.php';
        $sql="INSERT INTO genero (genero) values('$genero')";
        echo $resultado=mysqli_query($mysqli,$sql);
    }
        
    
}



?>