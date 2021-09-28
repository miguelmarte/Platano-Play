<?php
    $mysqli=new mysqli('us-cdbr-east-04.cleardb.com','bf2a1e2e7ff367','a6bdb32f','heroku_29d6cdd65902293');
    if($mysqli->connect_errno):
        echo "Error al conectarse con MySQL debido al error ".$mysqli->connect_error;
    endif;
?>
