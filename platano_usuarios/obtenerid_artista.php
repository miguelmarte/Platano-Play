<?php
    session_start();
    $_SESSION['id_artista']=$_POST['id_artista'];
    echo $_POST['id_artista'];
    
?>