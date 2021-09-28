<?php
    session_start();
    if(isset($_SESSION['id'])){
        $id=$_SESSION['id'];
        require '../conexion.php';
        $nueva_consulta= $mysqli->prepare("SELECT * FROM clientes where id_cliente='$id'");
        $nueva_consulta->execute();
        $resultado=$nueva_consulta->get_result();
        $datos=$resultado->fetch_assoc();
        

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
    <title>Platano Play</title>
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="icon" type="image/png" href="../img/Platano_PLay_Verde.png"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="js/funciones.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>

    <script>
    $(document).ready(function(){
        $('#artistas').click(function(){
           $('#conte').load("artistas.php"); 
        });
        $('#inicio').click(function(){
           $('#conte').load("inicio.php"); 
        });
        $('#buscar').click(function(){
           $('#conte').load("buscar.php"); 
        });
        
    });
    function album(id){
        
        cadena="id_album=" + id;
         $.ajax({
            type:"POST",
            url:"obtenerid_album.php",
            data:cadena,
            success: function(r){
                $('#conte').load("tabla_album.php");  
                
            }
         });
         
        }

        function artista(id){
        
        cadena="id_artista=" + id;
         $.ajax({
            type:"POST",
            url:"obtenerid_artista.php",
            data:cadena,
            success: function(r){
                $('#conte').load("tabla_album_artistas.php");  
                
            }
         });
         
        }
</script>

</head>
<body>
    
    <div class="center" id="center">
        
        <img src="../img/play.png" class="play">
        <img src="../img/platano.png" class="platano">
        
    </div>
    <div class="hide" id="contenido">
        
        
        
        
        <nav class="inicio">
            <a id="inicio"><i class="fas fa-home">Inicio</i></a>
            <a> <i class="fas fa-star">Favoritos</i></a>
            <a href="#"><i class="fas fa-list"> PlayList</i></a>
            <a id="artistas"><i class="fas fa-user">Artistas</i></a>
            <a id="buscar"><i class="fas fa-search">Buscar</i></a>
            <a href="salir.php"><i class="fas fa-sign-out">Salir</i></a>
        </nav>

        <header>        
            <div class="menu active"></div>
            
            <img class="icono_header" src="../img/Platano_PLay_Verde.png" alt="">
            <a href="Perfil/index.php"><img  class="circle" src="Perfil/<?php echo $datos['img_perfil'] ?>" ></a>

            

        </header>
        <div id="conte">
                <?php
                    require('inicio.php');
                ?>
            </div>

            

        



        <footer>
        <br>
        
            <button class="like"><i class="far fa-heart"></i></button>
            <button><i class="fas fa-arrow-circle-left"></i></button>
            <button id="btn-reproducir" onclick="repro()"><i class="fas fa-play-circle"></i></button>
            <button><i class="fas fa-arrow-circle-right"></i></button>

            <audio id="reproductor_audio" src=""></audio>
          
        </footer>
        
    </div>
    
    <script>
        window.addEventListener('load', () =>{
            
            setTimeout(carga, 3000);
            function carga(){
                document.getElementById('center').className='hide';
                document.getElementById('contenido').className='animated fadeInDown';
            }
            
    
        })
    </script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.menu').click(function(){
            $('.menu').toggleClass('active')
            $('nav').toggleClass('active')
        })
    })
</script>

</body>
</html>

<style>
header,footer,nav,.musica_columna{
    background-color: <?php echo $datos['color_nav'] ?> !important;
}
body,.inicio a,.fa-gear:before, .fa-cog:before,button,a{
    color: <?php echo $datos['color_fuente'] ?> !important;
}
body,.icono_perfil{
    background-color: <?php echo $datos['color_fondo'] ?> !important;
}


</style>

