<?php

include('cabeza.php');
include('menu.php');

?>
<script src="../js/funciones_generos.js"></script>

</nav>
    <div class="container">
        <div id="tabla"></div>
    </div>

    <!-- Modal para nuevo -->
    <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Genero</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <label>Genero</label>
            <input type="text" name="" id="newGenero" class="form-control input-sm">
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarNuevo">Agregar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
            
        </div>
        </div>
    </div>
    </div>

    <!-- Modal para editar -->
    <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Genero</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="text" hidden="" id="id_genero" name="">
            
            <label>Genero</label>
            <input type="text" name="" id="generoU" class="form-control input-sm">
            
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
        $('#tabla').load('tabla_generos/tabla.php');
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){ 
        $('#guardarNuevo').click(function(){
            cliente=$('#newClientes').val();
            agregardatos(cliente);
        });
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

<?php    
include('funcion_menu.php');
?>

<style>
.generos{
    background-color: #08365f;
}
</style>