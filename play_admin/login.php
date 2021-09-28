<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){    
    
    require '../conexion.php';
    $mysqli->set_charset('utf8');
    $usuario=$_POST['usuario']; 
    $contra=$mysqli->real_escape_string($_POST['contra']);

    $nueva_consulta= $mysqli->prepare("SELECT * FROM administradores WHERE Usuario=? AND password=? AND estado='A'");    
    $nueva_consulta->bind_param('ss',$usuario, $contra);
    $nueva_consulta->execute();
    $resultado=$nueva_consulta->get_result();
    
    if($resultado->num_rows==1){
        $datos=$resultado->fetch_assoc();
    
        require '../conexion.php';
        $nueva_consulta1= $mysqli->prepare("SELECT * FROM artistas where estado='A'");
        $nueva_consulta1->execute();
        $resultado1=$nueva_consulta1->get_result();

        require '../conexion.php';
        $nueva_consulta2= $mysqli->prepare("SELECT * FROM albums where estado='A'");
        $nueva_consulta2->execute();
        $resultado2=$nueva_consulta2->get_result();

        require '../conexion.php';
        $nueva_consulta3= $mysqli->prepare("SELECT * FROM musica where estado='A'");
        $nueva_consulta3->execute();
        $resultado3=$nueva_consulta3->get_result();
       
        
        require '../conexion.php';
        $nueva_consulta4= $mysqli->prepare("SELECT * FROM clientes WHERE estado='A'");
        $nueva_consulta4->execute();
        $resultado4=$nueva_consulta4->get_result();
        
        require '../conexion.php';
        $nueva_consulta5= $mysqli->prepare("SELECT * FROM clientes WHERE estado='A' AND Estado_Premium='A'");
        $nueva_consulta5->execute();
        $resultado5=$nueva_consulta5->get_result();
        

        require '../conexion.php';
        $nueva_consulta6= $mysqli->prepare("SELECT * FROM sesiones_administrador ORDER BY id_sesion DESC LIMIT 1");
        $nueva_consulta6->execute();
        $resultado6=$nueva_consulta6->get_result();
        $datos6=$resultado6->fetch_assoc();
        
        ini_set('date.timezone','America/Santo_Domingo');

        $time1=date('H:i:s',time());

        $time2=date('Y-m-d',time());

        $time3= date("g:i a", strtotime($time1));
        
        session_start();
        $_SESSION['nombre']=$datos['Nombre'];
        $_SESSION['id']=$datos['id_administrador'];

        
        
        $_SESSION['T_artistas']=$resultado1->num_rows;
        $_SESSION['T_albumes']=$resultado2->num_rows;
        $_SESSION['T_canciones']=$resultado3->num_rows;
        $_SESSION['T_usuarios']=$resultado4->num_rows;
        $_SESSION['T_usuarios_premium']=$resultado5->num_rows;
        
        $_SESSION['U_fecha']=$datos6['fecha'];
        $_SESSION['U_hora']=$datos6['hora'];

        $usuario=$datos['Usuario'];

        require '../conexion.php';
        $sql="INSERT INTO sesiones_administrador (usuario,fecha,hora) values('$usuario','$time2','$time3')";
        $resultado7=mysqli_query($mysqli,$sql);

        $mysqli->close();
        $nueva_consulta->close();
                    
        echo json_encode(array('error' => false));
    }else{
        echo json_encode(array('error' => true));
    }
    
 
        
}

    
?>