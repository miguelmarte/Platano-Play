<?php

require '../conexion.php';
$token=$_POST['token'];
$newtoken=' ';
$nueva_consulta= $mysqli->prepare("SELECT * FROM clientes WHERE token_recu=? AND estado='A'");    
$nueva_consulta->bind_param('s',$token);
$nueva_consulta->execute();
$resultado=$nueva_consulta->get_result();

if($resultado->num_rows==1){
    $datos=$resultado->fetch_assoc();
    require '../conexion.php';
    $nueva_consulta1= $mysqli->prepare("UPDATE clientes SET token_recu=? where id_cliente=?");
    $nueva_consulta1->bind_param('ss',$newtoken,$datos['id_cliente']);
    $nueva_consulta1->execute();
    session_start();
    $_SESSION['id_validacion']=$datos['id_cliente'];
    header("location:nueva_contra.php"); 

}else{
    echo "<script>";
    echo "alert('El codigo insertado no es valido');";  
    echo "window.location = 'validar_recuperacion.php';";
    echo "</script>"; 
}