<?php
session_start();
$id_album=$_SESSION['id_album'];
$id_artista=$_SESSION['id_artista'];

require '../../conexion.php';
$titulo=$_POST['newTitulo'];
$Duracion=$_POST['newDuracion'];

$nombremusica=$_FILES['newMusica']['name'];
$ruta=$_FILES['newMusica']['tmp_name'];
$destino="../../Musica/".$nombremusica;

if(copy($ruta,$destino)){
    $destino2=$nombremusica;
    
    ini_set('date.timezone','America/Santo_Domingo');
    $time2=date('Y-m-d',time());
  
    require '../../conexion.php';
    $sql="INSERT INTO musica (id_artista,id_album,fecha,titulo,musica,duracion) values('$id_artista','$id_album','$time2','$titulo','$destino2','$Duracion')";
    $resultado=mysqli_query($mysqli,$sql);

    echo "<script>";
    echo "alert('La Musica fue agregada con exito');";  
    echo "window.location = '../index.php';";
    echo "</script>";

}else{
    echo "<script>";
    echo "alert('Error al subir la musica');";  
    echo "window.location = '../index.php';";
    echo "</script>";
        
    
}

?>