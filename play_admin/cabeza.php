<?php
    session_start();
    if(isset($_SESSION['id'])){
        
    }else{
        header("location:index.php");
        die();  
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal del Administrador</title>
    <link rel="stylesheet" href="../css/alertify.css">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/style_portal_admin.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    
    <script src="../js/alertify.js"></script>
    <script src="../js/datatables/jquery.dataTables.min.js"></script>
    <script src="../js/datatables/dataTables.bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="../img/Platano_PLay_Verde.png">
</head>
<body>
    <header>
        <img src="../img/Platano_PLay_Verde.png" alt="Logo Platano Play" class="logo_platano">
        <h3>Hola <?php echo $_SESSION['nombre'] ?></h3>
        <div class="menu active"></div>
        <a href="salir.php">Salir</a>
    </header>
