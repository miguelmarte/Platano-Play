<?php

include('cabeza.php');
include('menu.php');

?>
<script src="../js/funciones_autorizar.js"></script>

</nav>
    <div class="container">
        <div id="tabla"></div>
    </div>

            

    

<script type="text/javascript">
    $(document).ready(function(){
        $('#tabla').load('tabla_autorizar/tabla.php');
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
.autorizar{
    background-color: #08365f;
}
</style>