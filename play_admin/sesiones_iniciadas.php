<?php

include('cabeza.php');
include('menu.php');

?>

</nav>
    <div class="container">
        <div id="tabla"></div>
    </div>

            

    

<script type="text/javascript">
    $(document).ready(function(){
        $('#tabla').load('tabla_sesiones/tabla.php');
    });
</script>

<?php    
include('funcion_menu.php');
?>

<style>
.sesiones{
    background-color: #08365f;
}
</style>