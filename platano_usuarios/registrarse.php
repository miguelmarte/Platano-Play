<?php
$nombre=$_POST['nombre']; 
$correo=$_POST['correo'];
$dia=$_POST['dia'];
$mes=$_POST['mes'];
$year=$_POST['year'];
$contra=$_POST['contra'];
$repcontra=$_POST['repcontra'];

$fecha_naciminiento=$year.'/'.$mes.'/'.$dia;

if($contra==$repcontra){
    if($dia>0 && $mes>0 && $year>0){
        require '../conexion.php';
        $consulta1= $mysqli->prepare("SELECT * FROM clientes WHERE Correo_Electronico=?");
        $consulta1->bind_param('s',$correo);
        $consulta1->execute();
        $resultado1=$consulta1->get_result();
        if($resultado1->num_rows==1){
            echo json_encode(array('error' => true));
        }else{
            ini_set('date.timezone','America/Santo_Domingo');
            $time=date('Y-m-d',time());
            require '../conexion.php';
            $sql="INSERT INTO clientes (Nombre,fecha_nacimiento,Correo_Electronico,pass,fecha_registro) values('$nombre','$fecha_naciminiento','$correo','$contra','$time')";
            $resultado=mysqli_query($mysqli,$sql);
            echo json_encode(array('error' => false));
        }
        $mysqli->close();
        $consulta1->close();

        
    }else{
        echo json_encode(array('error' => true));
    }
}else{
    echo json_encode(array('error' => true));
}
    


    
?>