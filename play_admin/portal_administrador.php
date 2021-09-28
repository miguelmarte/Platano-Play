<?php

include('cabeza.php');
include('menu.php');

?>

    <table id="tabla_principal"class="table table-hover table-condensed table-bordered">
        <tr>
            <td>Total de Artistas: <?php echo $_SESSION['T_artistas'] ?></td> <td>Total de Albumes: <?php echo $_SESSION['T_albumes'] ?></td>
        </tr>
        <tr>
            <td>Musicas Totales: <?php echo $_SESSION['T_canciones'] ?></td> <td>Tiempo total de reproduccion :</td>
        </tr>
        <tr>
             <td>Total de usuarios: <?php echo $_SESSION['T_usuarios'] ?></td><td>Total de usuarios con premium: <?php echo $_SESSION['T_usuarios_premium'] ?></td>
        </tr>
        <tr>
            <td>Fecha del ultimo Inicio: <?php echo $_SESSION['U_fecha'] ?></td> <td>Hora del ultimo Inicio: <?php echo $_SESSION['U_hora'] ?></td>
        </tr>
        
        
    </table>

<?php    
include('funcion_menu.php');
?>
<style>
.principal{
    background-color: #08365f;
}
</style>
