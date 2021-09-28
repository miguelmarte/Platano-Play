<?php
    session_start();
    if(isset($_SESSION['id'])){
        $id=$_SESSION['id'];
        require '../../conexion.php';
        $nueva_consulta= $mysqli->prepare("SELECT * FROM clientes where id_cliente='$id'");
        $nueva_consulta->execute();
        $resultado=$nueva_consulta->get_result();
        $datos=$resultado->fetch_assoc();
        
    }else{
        header("location:../index.php");
        die();  
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/materialize.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/perfilinicio.css">
    <link rel="stylesheet" href="css/alertify.css">
    <title>Perfil</title>
    <link rel="icon" type="image/png" href="../../img/Platano_PLay_Verde.png">
    <script src="js/funciones.js"></script>
    <script src="js/alertify.js"></script>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(../../img/pexels-photo.jpg);">
    <header>

    <nav class="nav-wrapper teal grey darken-3">
            <div class="container">
               <img class="brand-logo center" src="../../img/PlatanoPLay Verde.png" width="60" height="50" alt="">
            </div>
            <ul id="dropdown1" class="dropdown-content">
                <li><a href="#">one</a></li>
                <li><a href="#">two</a></li>
                <li class="divider"></li>
                <li><a href="#">three</a></li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li><a href="../platano_play.php">Ir al Reproductor</a></li>
            </ul>
            <a href="#" data-target="menu-side" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
            </a>
    </nav>

    <?php
        include('modales.php');
    ?>

    <ul class="sidenav" id="menu-side">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="../../img/pexels-photo.jpg" alt="#" class="responsive-img">
                </div>
                <div>
                   <img src="<?php echo $datos['img_perfil'] ?>" alt="" class="circle"/>
                </div>
                <a href="#">
                    <span class="name white-text"><?php echo $_SESSION['nombre']?></span>
                </a>
                <a href="#">
                    <span class="email white-text"><?php echo $_SESSION['correo']?></span>
                </a>
            </div>
        </li>
        <li><a href="../platano_play.php">Ir a Reproductor</a></li>
        
        <li><a href="index.php"><i class="material-icons">account_circle</i>Cuenta</a></li>
        <li><a data-toggle="modal" data-target="#modalContra"><i class="material-icons">lock</i>Cambiar Contraseña</a></li>
        <!--<li><a href="#"><i><img src="../../img/Platano Play Gold.png" alt="" class="circle" width="40" height="35"></i>Unete a Premium</a></li>-->
        <li><a data-toggle="modal" data-target="#modalColores" onclick="agregarColores('<?php echo $datos1?>')"><i class="material-icons">color_lens</i>Personalizar Color</a></li>
        <a class="waves-effect waves-light btn green" data-toggle="modal" data-target="#modalFoto"><i class="material-icons left">edit</i>Cambiar foto de perfil</a>
        <li><a href="contacto.php"><i class="material-icons">contact_mail</i>Contactar Desarolladores</a></li>
        <li><a onclick="preguntarSiNo(<?php echo $_SESSION['id']?>)"><i class="material-icons">delete</i>Eliminar Cuenta</a></li>
    </ul>
</header>
    <div class="container">
        <div class="row card-panel teal grey lighten-2">
            <div class="offset-s2 col s10 col m8 offset-m2 col l8 offset-l2">
                <img src="../../img/Platano PLayPremium (2).png" alt="" class="responsive-img center-align" height="300" width="600">
            </div>
            
        </div>
        <div class="row teal grey lighten-4">
            <div class="col l4">
                <ul class="collection hide-on-med-and-down">
                    <li>
                        <img src="<?php echo $datos['img_perfil']; ?>" class="circle responsive-img left" alt="">
                        <a class="waves-effect waves-light btn green" data-toggle="modal" data-target="#modalFoto"><i class="material-icons left">edit</i>Cambiar foto de perfil</a>
                    </li>
                    <li><a href="index.php" class="collection-item">Cuenta</a></li>
                    <li><a data-toggle="modal" data-target="#modalContra" class="collection-item">Cambiar Contraseña</a></li>
                    <li><a data-toggle="modal" data-target="#modalColores" class="collection-item" onclick="agregarColores('<?php echo $datos1?>')">Personalizar Color</a></li>
                    <li><a href="contacto.php" class="collection-item">Contactar Desarolladores</a></li>
                    <li><a onclick="preguntarSiNo(<?php echo $_SESSION['id']?>)" class="collection-item">Eliminar Cuenta</a></li>
                </ul>
            </div>
            <div class="col s12 col m12 col l8">
                <div class="card-panel teal grey lighten-4">
                    <h4 class="center-align">Informacion de Usuario</h4>
                    <div class="center-align">
                            <table>
                                    <thead>
                                    </thead>
                            
                                    <tbody>
                                      <tr>
                                        <td>Nombre: </td>
                                        <td id="nombre"><?php echo $datos['Nombre']?></td>
                                      </tr>
                                      <tr>
                                        <td>Correo:</td>
                                        <td id="correo"><?php echo $datos['Correo_Electronico']?></td>
                                      </tr>
                                      <tr>
                                        <td>Fecha de nacimiento</td>
                                        <td id="fecha"><?php echo $datos['fecha_nacimiento']?></td>
                                      </tr>
                                    </tbody>
                                  </table>
                    </div>
                    <div>
                        <a class="waves-effect waves-light btn-small green" data-toggle="modal" data-target="#modalEdicion" onclick="agregarForm('<?php echo $datos1?>')"><i class="material-icons left">edit</i>Editar Perfil</a>
                    </div>
                </div>
                <div class="row card-panel teal grey darken-4">
                    <h4 class="center-align white-text">Informacion Plan Premium <i class="material-icons"></i></h4>
                </div>
                <div class="card-panel teal grey lighten-4">
                    <h4>Metodo de pago</h4>
                    <a class="waves-effect waves-light btn-small green" href="#"><i class="material-icons">update</i>Actualizar Metodo de Pago</a>
                </div>
            </div>

        </div>
        <div>
        </div>

    </div>

    

    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
        });
    </script>

<script type="text/javascript">
    $(document).ready(function(){ 
        $('#actualizardatos').click(function(){
            cliente=$('#clienteU').val();
            id=$('#id_cliente').val();
            actualizarDatos(cliente);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){ 
        $('#actualizarContra').click(function(){
            A_contra=$('#A_contra').val();
            actualizarContra(A_contra);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){ 
        $('#actualizarcolores').click(function(){
            actualizarcolores();
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){ 
       $('.modalEdicion').modal();
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){ 
       $('.modalContra').modal();
    });
</script>
</body>
<footer class="page-footer teal grey darken-3">
    <div class="container">
        <div class="row">
        <div class="col l6 s12">
            <h5 class="white-text">Platano Play</h5>
            <p class="grey-text text-lighten-4">Todos los derechos reservados</p>
        </div>
        <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Desarrolladores</h5>
            <ul>
                <li><a class="grey-text text-lighten-3" href="#!">Miguel J.</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Wilvan P.</a></li>
            </ul>
        </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
        © 2019 Copyright Platano Play &reg;

        </div>
    </div>
    </footer>
</html>

