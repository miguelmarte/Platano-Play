<?php
    session_start();

    $id=$_SESSION['id'];
    $A_contra=$_POST['A_contra'];
    $new_contra=$_POST['new_contra'];
    $confir_contra=$_POST['confir_contra'];

    require '../../../conexion.php';
    $nueva_consulta= $mysqli->prepare("SELECT * FROM clientes WHERE id_cliente=? AND pass=?");    
    $nueva_consulta->bind_param('ss',$id,$A_contra);
    $nueva_consulta->execute();
    $resultado=$nueva_consulta->get_result();
    
    if($resultado->num_rows==1){
        if($A_contra=="" or $A_contra==" " or $new_contra=="" or $new_contra==" " or $confir_contra=="" or $confir_contra==" "){
            echo 0;
        }else{
            if($new_contra==$confir_contra){
                require '../../../conexion.php';
                $nueva_consulta1= $mysqli->prepare("UPDATE clientes SET pass=? where id_cliente=?");
                $nueva_consulta1->bind_param('ss',$new_contra,$id);
                echo $nueva_consulta1->execute();

            
            }else{
                echo 0;
            }
            
        
            
        }

    }else{
        echo 2;
    }





?>