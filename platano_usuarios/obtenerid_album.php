<?php
    session_start();
    $_SESSION['id_album']=$_POST['id_album'];
    echo $_POST['id_album'];
    
?>