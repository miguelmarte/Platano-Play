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
    <link rel="stylesheet" href="../css/style_login.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión</title>
    <link rel="icon" type="image/png" href="../img/Platano_PLay_Verde.png">
    <script src="../js/materialize.min.js"></script>
</head>
<body>
    <div class="header">
        <header>
             <img src="../img/PlatanoPLayVerde.png" class="img_header">
             <a href="registrarse_clientes.php" class="registarse">Registrarse</a>
        </header>
        
    </div>
    <div class="error">
        <span>Usuario y/o contraseña no validos</span>
    </div>

    <form id="formlg">
  
       
        <div class="input-field col s12">
        <i class="material-icons">email</i><input  id="correo" name="correo" type="text" class="validate" required>
            <label class="active" for="correo">Correo Electronico</label>
        </div>
        <br>
        <div class="input-field col s12">
        <i class="material-icons">lock</i><input  id="contra" name="contra" type="password" class="validate" pattern="[A-Za-z0-9_-]{1,15}" required>
          <label class="active" for="contra" a>Contraseña</label>
        </div>
        <br>
        <br>
        <a class="recu-contra" href="recuperar_contra.php">Se me olvido la contraseña</a>
        <br>
        <br>
        <input type="submit"  class="botonlg" value="Acceder">
        <br>
        <br>
        
        
    </form>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>
    
