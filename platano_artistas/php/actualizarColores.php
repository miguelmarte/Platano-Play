<?php
    session_start();

    $id=$_SESSION['id'];
    $color_fondo=$_POST['color_fondo'];
    $color_nav=$_POST['color_nav'];
    $color_fuente=$_POST['color_fuente'];

    
    require '../../../conexion.php';
    $nueva_consulta1= $mysqli->prepare("UPDATE clientes SET color_fondo=?,color_nav=?,color_fuente=? where id_cliente=?");
    $nueva_consulta1->bind_param('ssss',$color_fondo,$color_nav,$color_fuente,$id);
    echo $nueva_consulta1->execute();

            
    

?>