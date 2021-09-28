<?php
session_start();
$id=$_SESSION['id_artista'];
$nombre_album=$_POST['nombre'];

    $nombreImg=$_FILES['foto']['name'];
    $ruta=$_FILES['foto']['tmp_name'];
    $destino="../../portadas_albums/".$nombreImg;
    if(copy($ruta,$destino)){
        $destino2=$nombreImg;
      


        require '../../conexion.php';
        $sql="INSERT INTO albums (nombre,id_artista,portada) values('$nombre_album','$id','$destino2')";
        $resultado=mysqli_query($mysqli,$sql);

        echo "<script>";
        echo "alert('Album creado con exito');";  
        echo "window.location = '../index.php';";
        echo "</script>";

    }
?>
