<?php

include('cabeza.php');
include('menu.php');
$_SESSION['id_album']=$_GET['id_album'];

?>
<script src="../js/funciones_canciones.js"></script>

</nav>
    <button class="btn btn-primary agregar" onclick="location.href='albumes.php'">Volver atras
                   
    </button>
    <div class="container">
        <div id="tabla"></div>
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

<?php    
include('funcion_menu.php');
?>

<style>
.albumes{
    background-color: #08365f;
}
</style>