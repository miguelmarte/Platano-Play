<?php
    session_start();
    if(isset($_SESSION['id_artista'])){
        
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
    <title>Contacto</title>
    <link rel="icon" type="image/png" href="../../img/Platano_PLay_Verde.png">
    <script src="js/funciones.js"></script>
    <script src="js/alertify.js"></script>
</head>
<body style="background-color: rgba(214, 214, 214, 0.527);">
    <header>
    <!--Menu Desplegable-->

    <nav class="nav-wrapper teal grey darken-3">
            <div class="container">
               <img class="brand-logo center" src="../../img/PlatanoPLay Verde.png" width="60" height="50" alt="">
            </div>
            <ul class="right hide-on-med-and-down">
                <li><a href="../platano_play.php">Ir a Reproductor</a></li>
           </ul>
            <a href="#" data-target="menu-side" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
            </a>
    </nav>
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="#!">one</a></li>
        <li><a href="#!">two</a></li>
        <li class="divider"></li>
        <li><a href="#!">three</a></li>
    </ul>

    <ul class="sidenav" id="menu-side">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="../../img/pexels-photo.jpg" alt="#">
                </div>
                <div>
                    <img src="../../img/user_13230.png" alt="" class="circle">
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
        <li><a href="index.php"><i class="material-icons">account_circle</i>Perfil</a></li>
        
      
    </ul>
</header>
    <div class="container">
        <div class="row teal grey lighten-4">
            <div class="col l4">
                <ul class="collection hide-on-med-and-down">
                    <li><img src="" alt=""></li>
                    <li><a href="index.php" class="collection-item">Perfil</a></li>
                  
                </ul>
            </div>
            <div class="col s12 col m12 col l8">
            <form action="php/agregarDatos.php" method="post">
                <div class="card-panel teal grey lighten-4">
                    <h4 class="center-align">Contacto:</h4>
                    <div class="input-field">
                        <input  id="asunto" class="validate" type="text" name="asunto">
                        <label for="asunto">Asunto</label>
                    </div>
                    <div class="input-field">
                        <textarea name="detalle" id="detalle" cols="30" rows="10"></textarea>
                        <label for="detalle">Detalles</label>
                    </div>
                    <div>
                        <button type="submit" class="waves-effect waves-light btn-small"> <i class="material-icons left">send</i>enviar</button>
                    </div>
                </div>
            </form>
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
                <li><a class="grey-text text-lighten-3" href="#!">Miguel C.</a></li>
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
<style>
</style>