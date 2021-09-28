<?php
    session_start();
    if(isset($_SESSION['id_artista'])){
       
        $id=$_SESSION['id_artista'];
        require '../conexion.php';
        $nueva_consulta= $mysqli->prepare("SELECT * FROM artistas where id_artista='$id'");
        $nueva_consulta->execute();
        $resultado=$nueva_consulta->get_result();
        $datos=$resultado->fetch_assoc();
        $datos1=$datos['id_artista'].'||'.$datos['nombre'].'||'.$datos['correo_electronico'];
                    
        

    }else{
        header("location:../platano_usuarios/index.php");
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
    <link rel="icon" type="image/png" href="../img/Platano_PLay_Verde.png"/>
    <script src="js/funciones.js"></script>
    <script src="js/alertify.js"></script>
    <link rel="stylesheet" href="css/alertify.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Platano Artistas</title>
</head>
<body style="background-image: url(../img/pexels-photo.jpg);">
    <header>
    <!--Menu Desplegable-->

    <nav class="nav-wrapper teal grey darken-3">
            <div class="container">
               <img class="brand-logo center" src="../img/PlatanoPLay Verde.png" width="60" height="50" alt="">
            </div>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php"><?php echo $datos['nombre']?></a></li>
                <li><img src="<?php echo $datos['img_perfil']?>" id="img_perfil" class="circle"></li>
                <li><a href="salir.php">Cerrar Sesion</a></li>
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
                    <img src="../img/pexels-photo.jpg" alt="#" class="responsive-img">
                </div>
                <div>
                    <img src="<?php echo $datos['img_perfil']?>" alt="" class="circle">
                </div>
                <a href="#">
                    <span class="name white-text"><?php echo $datos['nombre']?></span>
                </a>
                <a href="#">
                    <span class="email white-text"><?php echo $datos['correo_electronico']?></span>
                </a>
            </div>
        </li>
        
        <li><a href="badges.html"><i class="material-icons">lock</i>Principal</a></li>
        <li><a href="#modal1" class="modal-trigger collection-item">Agregar Album</a></li>

        <?php
            require '../conexion.php';
            $nueva_consulta1= $mysqli->prepare("SELECT * FROM albums WHERE id_artista='$id' AND estado='A'");    
            $nueva_consulta1->execute();
            $resultado1=$nueva_consulta1->get_result();
            
        ?>
        <li><a href="albumes.php"><i class="material-icons">folder_open</i>Albumes<span class="badge"><?php echo $resultado1->num_rows ?></span></a></li>
        <li><a onclick="preguntarSiNo(<?php echo $_SESSION['id_artista']?>)"><i class="material-icons">delete</i>Eliminar Cuenta</a></li>
        <li><a href="salir.php">Cerrar Sesion</a></li>
    </ul>
</header>
    <div class="container">
        <div class="row card-panel teal grey darken-4">
            <h1 class="center-align white-text">Bienvenido a Platano Play Artistas, Nombre de Artista.</h1>
            <h6 class="center-align white-text">Recuerda que una vez registrado aceptaste nuestros <a href="">términos y condiciones.</a></h6>
        </div>
        <div class="row teal grey lighten-4">
            <div class="col l4">
                <ul class="collection hide-on-med-and-down">
                
                    <li>
                        <img src="<?php echo $datos['img_perfil']; ?>" class="circle responsive-img left" alt="">
                        <a class="waves-effect waves-light btn green" data-toggle="modal" data-target="#modalFoto"><i class="material-icons left">edit</i>Cambiar foto de perfil</a>
                    </li>
                    
                    <li><a href="index.php" class="collection-item">Principal</a></li>
                    <li><a href="#modal1" class="modal-trigger collection-item">Agregar Album</a></li>
                    <li><a href="albumes.php" class="collection-item">Albumes<span class="badge"><?php echo $resultado1->num_rows ?></span></a></li> <!--Ese Span funciona como notificacion, el numero es el parametro-->
                    <li><a href="contacto.php" class="collection-item">Contactar Desarolladores</a></li>
                    <li><a onclick="preguntarSiNo(<?php echo $_SESSION['id_artista']?>)"><i class="material-icons">delete</i>Eliminar Cuenta</a></li>
                    
                </ul>
            </div>
            <div class="col s12 col m12 col l8">
                <div class="row card-panel teal grey darken-4">
                    <h4 class="center-align white-text">Informacion de Artista<i class="material-icons"></i></h4>
                </div>
                <div class="card-panel teal grey lighten-4">
                    <div class="center-align">
                            <table>
                                    <thead>
                                    </thead>
                            
                                    <tbody>
                                      <tr>
                                        <td>Nombre: </td>
                                        <td><?php echo $datos['nombre']?></td>
                                      </tr>
                                      <tr>
                                        <td>Correo:</td>
                                        <td><?php echo $datos['correo_electronico']?></td>
                                      </tr>
                                    </tbody>
                                  </table>
                    </div>
                    <div>
                        <a href="#modalEdicion" class="modal-trigger collection-item" onclick="agregarForm('<?php echo $datos1?>')"><i class="material-icons left">edit</i>Editar Perfil</a>
                      
                    </div>
                </div>
                <div class="row card-panel teal grey darken-4">
                    <h4 class="center-align white-text">Ultimos Albumes <i class="material-icons"></i></h4>
                </div>
                <div class="card-panel teal grey lighten-4">
                    
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
        });
    </script>
    <script>
        $(document).ready(function() {
        $('input#input_text, textarea#textarea2').characterCounter();
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
                <li><a class="grey-text text-lighten-3" href="#!">Miguel C.</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Wilvan P.</a></li>
            </ul>
        </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
        © 2019 Copyright Platano Play &reg;

        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
    </footer>


</html>
<style>
</style>