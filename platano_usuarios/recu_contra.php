<?php

require '../conexion.php';
$correo=$_POST['correo'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; 

$nueva_consulta= $mysqli->prepare("SELECT * FROM clientes WHERE Correo_Electronico=? AND estado='A'");    
$nueva_consulta->bind_param('s',$correo);
$nueva_consulta->execute();
$resultado=$nueva_consulta->get_result();

if($resultado->num_rows==1){
    $datos=$resultado->fetch_assoc();
    $token = bin2hex(random_bytes(4));
    require '../conexion.php';
    $nueva_consulta1= $mysqli->prepare("UPDATE clientes SET token_recu=? where id_cliente=?");
    $nueva_consulta1->bind_param('ss',$token,$datos['id_cliente']);
    $nueva_consulta1->execute();

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);

    try {
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
        $mail->Body    = 'Codigo de Recuperacion: '.$token;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo "<script>";
        echo "alert('Mensaje enviado correctamente');";  
        echo "window.location = 'validar_recuperacion.php';";
        echo "</script>"; 

    } catch (Exception $e) {
        echo "Error al enviar el mensaje {$mail->ErrorInfo}";
    }

    $mysqli->close();
    $nueva_consulta->close();


}else{

    echo "<script>";
    echo "alert('El correo electronico insertado no es valido');";  
    echo "window.location = 'recuperar_contra.php';";
    echo "</script>"; 
    
}


?>