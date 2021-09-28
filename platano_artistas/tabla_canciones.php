<?php
session_start();
$_SESSION['id_album']=$_GET['id_album'];
$id=$_SESSION['id_artista'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Musica del album</title>
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
    <script src="../js/funciones_albumes.js"></script>
</head>
<body>



</nav>
    <button class="btn btn-primary agregar" onclick="location.href='albumes.php'">Volver atras
                   
    </button>
    <div class="container">
        <div id="tabla"></div>
    </div>
<!-- Modal para nuevo -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Musica</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="tabla_canciones/agregarDatos.php" method="post" enctype="multipart/form-data">

                <label>Titulo</label>
                <input type="text" name="newTitulo" id="newTitulo" class="form-control input-sm">
                
                <label>Duracion</label>
                <input type="text" name="newDuracion" id="newDuracion" class="form-control input-sm">

                <input type="file" id="newMusica" name="newMusica">
                <label>Añadir Musica</label>

            
        </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
        
            </div>
    </div>
    </div>


    <!-- Modal para editar -->
    <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Cancion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="text" hidden="" id="id_cancion" name="">
            <label>Titulo</label>
            <input type="text" name="" id="tituloU" class="form-control input-sm" required>
            <label>Duracion</label>
            <input type="text" name="" id="duracionU" class="form-control input-sm" required>
    
            <label>Genero</label>
            <select class="form-control selectpicker" id="generoU">
                <option value="0" disabled selected>Genero</option>
            <?php
            require '../conexion.php';
            $consulta= $mysqli->prepare("SELECT * FROM genero");
            $consulta->execute();
            $resultado=$consulta->get_result();

            while($mostrar=mysqli_fetch_array($resultado)){
                ?>
                <option value="<?php echo $mostrar['id_genero'];?>"><?php echo $mostrar['genero'];?></option>
            <?php                   
            }
            ?>
            <?php
            $mysqli->close();
            $consulta->close();
            ?>
            </select>

            <label>Explisito</label>
            <select class="form-control selectpicker" id="explisitoU">
                <option value="0" disabled selected>Explisito</option>
                <option value="A">Si</option>
                <option value="I">No</option>
            </select>

            
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="actualizardatos" data-dismiss="modal">Actualizar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
    </div>

    

<script type="text/javascript">
    $(document).ready(function(){
        $('#tabla').load('tabla_canciones/tabla.php');
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){ 
        $('#actualizardatos').click(function(){
            cliente=$('#tituloU').val();
            id=$('#id_cancion').val();
            actualizarDatos(cliente);
        });
    });
</script>
</body>
</html>



<style>
.albumes{
    background-color: #08365f;
}
</style>