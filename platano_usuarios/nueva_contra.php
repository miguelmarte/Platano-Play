<?php
session_start();
if(isset($_SESSION['id'])){
    header("location:platano_play.php");
    die();
}else{
     
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperar Contraseña</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/style_login.css">
    <script src="../js/materialize.min.js"></script>
</head>
<body>
    <div class="header">
        <header>
             <img src="../img/PlatanoPLayVerde.png" class="img_header">    
            <a href="index.php" class="iniciar">Volver al login</a>
        </header>
    </div>
    <br>
    
    <form id="formre" method="POST" action="validar_nueva_contra.php">
        <div class="recuperar">
            <h2>Nueva Contraseña</h2>
        </div>
        <hr>
        <br>
        <div class="input-field col s12">
            <i class="material-icons">lock</i><input  id="contra" name="contra" type="password" class="validate" required>
            <label class="active" for="contra">Inserte la nueva contraseña</label>
        </div>
        <div class="input-field col s12">
            <i class="material-icons">lock</i><input  id="contra2" name="contra2" type="password" class="validate" required>
            <label class="active" for="contra2">Repita la nueva contraseña</label>
        </div>
        <br>       
        <br>
        <input type="submit" value="Validar">
        <br>
        <br>
    
        
        
        
    </form>
</body>
</html>
<style>
h2{
    color: white;
}
</style>