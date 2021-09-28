<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){    
    
    require '../conexion.php';
    $mysqli->set_charset('utf8');
    $correo=$_POST['correo']; 
    $contra=$mysqli->real_escape_string($_POST['contra']);

    $nueva_consulta= $mysqli->prepare("SELECT * FROM clientes WHERE Correo_Electronico=? AND pass=? AND estado='A'");    
    $nueva_consulta->bind_param('ss',$correo, $contra);
    $nueva_consulta->execute();
    $resultado=$nueva_consulta->get_result();

    require '../conexion.php';
    $nueva_consulta1= $mysqli->prepare("SELECT * FROM artistas WHERE correo_electronico=? AND password=? AND estado='A'");    
    $nueva_consulta1->bind_param('ss',$correo, $contra);
    $nueva_consulta1->execute();
    $resultado1=$nueva_consulta1->get_result();
    
    if($resultado->num_rows==1){
        $datos=$resultado->fetch_assoc();
        session_start();
        $_SESSION['correo']=$datos['Correo_Electronico'];
        $_SESSION['nombre']=$datos['Nombre'];
        $_SESSION['fecha']=$datos['fecha_nacimiento'];
        $_SESSION['id']=$datos['id_cliente'];
        $mysqli->close();
        $nueva_consulta->close();
                    
        echo 1;
    }else if($resultado1->num_rows==1){
        $datos1=$resultado1->fetch_assoc();
        session_start();
        $_SESSION['correo']=$datos1['correo_electronico'];
        $_SESSION['nombre']=$datos1['nombre'];
        $_SESSION['id_artista']=$datos1['id_artista'];
        $mysqli->close();
        $nueva_consulta->close();
                    
        echo 2;


    }else{
        $nueva_consulta1= $mysqli->prepare("SELECT intentos_login FROM clientes WHERE Correo_Electronico=?");    
        $nueva_consulta1->bind_param('s',$correo);
        $nueva_consulta1->execute();
        $resultado1=$nueva_consulta1->get_result();
        $datos1=$resultado1->fetch_assoc();
        $intentos=$datos1['intentos_login']+1;
        if($intentos==3){
            

           /* require '../conexion.php';
            $nueva_consulta2= $mysqli->prepare("UPDATE clientes SET intentos_login=? where Correo_Electronico=?");
            $nueva_consulta2->bind_param('ss',$intentos,$correo);
            $nueva_consulta2->execute();*/
            /*use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception; 
            require 'PHPMailer/Exception.php';
            require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';
            $mail = new PHPMailer(true);
            
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';             // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'mjml0412@gmail.com';                     // SMTP username
            $mail->Password   = 'mjml_1999-0412';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to
    
            //Recipients
            $mail->setFrom('mjml0412@gmail.com', 'Platano Play');
            $mail->addAddress($correo);     // Add a recipient
    
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Recuperar Password';
            $mail->Body    = 'Codigo de Recuperacion: ';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
            $mail->send();*/
        
        }else{
            require '../conexion.php';
            $nueva_consulta2= $mysqli->prepare("UPDATE clientes SET intentos_login=? where Correo_Electronico=?");
            $nueva_consulta2->bind_param('ss',$intentos,$correo);
            $nueva_consulta2->execute();
        }

        
    echo json_encode(array('error' => true));

    }
    
 
        
}

    
?>