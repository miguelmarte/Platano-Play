<?php
$nombre=$_POST['nombre']; 
$correo=$_POST['correo'];
$genero=$_POST['genero'];
$contra=$_POST['contra'];
$repcontra=$_POST['repcontra'];

if($contra==$repcontra){
        require '../conexion.php';
        $consulta1= $mysqli->prepare("SELECT * FROM artistas WHERE correo_electronico=?");
        $consulta1->bind_param('s',$correo);
        $consulta1->execute();
        $resultado1=$consulta1->get_result();
        if($resultado1->num_rows==1){
            echo json_encode(array('error' => true));
        }else{
            ini_set('date.timezone','America/Santo_Domingo');
            $time=date('Y-m-d',time());
            require '../conexion.php';
            $sql="INSERT INTO artistas (nombre,id_genero,correo_electronico,password) values('$nombre','$genero','$correo','$contra')";
            $resultado=mysqli_query($mysqli,$sql);
            echo json_encode(array('error' => false));
        }
        $mysqli->close();
        $consulta1->close();

        
}else{
    echo json_encode(array('error' => true));
}
    


    
?>