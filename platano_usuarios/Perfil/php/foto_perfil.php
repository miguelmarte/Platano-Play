<?php
session_start();
$id=$_SESSION['id'];


    $nombreImg=$_FILES['foto']['name'];
    $ruta=$_FILES['foto']['tmp_name'];
    $destino="../imagenes_perfil/".$nombreImg;
    if(copy($ruta,$destino)){
        $destino2="imagenes_perfil/".$nombreImg;
        require '../../../conexion.php';
        $nueva_consulta1= $mysqli->prepare("UPDATE clientes SET img_perfil=? where id_cliente=?");
        $nueva_consulta1->bind_param('ss',$destino2,$id);
        $nueva_consulta1->execute();

        echo "<script>";
        echo "alert('Imagen insertada con exito');";  
        echo "window.location = '../index.php';";
        echo "</script>";

    }
?>
