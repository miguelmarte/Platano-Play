<?php
session_start();
require '../conexion.php';
$contra=$_POST['contra'];
$contra2=$_POST['contra2'];
$id=$_SESSION['id_validacion'];
if($contra==$contra2){
    
        require '../conexion.php';
        $nueva_consulta1= $mysqli->prepare("UPDATE clientes SET pass=? where id_cliente=?");
        $nueva_consulta1->bind_param('ss',$contra,$id);
        $nueva_consulta1->execute();
    
        session_destroy();
        echo "<script>";
        echo "alert('La contraseña ha sido actualizada exitosamente');";  
        echo "window.location = 'index.php';";
        echo "</script>"; 

}else{
        echo "<script>";
        echo "alert('Las contraseñas insertadas no coinciden');";  
        echo "window.location = 'nueva_contra.php';";
        echo "</script>"; 
}
