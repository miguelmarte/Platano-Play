<?php
    session_start();
    $id_album=$_SESSION['id_album'];
?>
<br>
<br>

<div class="row">
    <div class="col-sm-12">
        <br>
        <br>
        <br>
        <table>
            <thead>
                <tr>                
                    <th>Titulo</th>
                    <th>Duracion</th>
                    <th></th>
                   
                </tr>
            </thead>
            <tbody>
            <?php  
                require '../conexion.php';
                $nueva_consulta= $mysqli->prepare("SELECT * FROM musica where estado='A' AND id_album='$id_album'");
                $nueva_consulta->execute();
                $resultado=$nueva_consulta->get_result();
                while($datos=$resultado->fetch_assoc()){
                    $datos1=$datos['id_musica'].'||'.$datos['id_genero'].'||'.$datos['titulo'].'||'.$datos['duracion'].'||'.$datos['musica'];
                    
                    
            ?>
            <tr>
                <td><?php echo $datos['titulo']?></td>
                <td><?php echo $datos['duracion']?></td>
              
                <td>
                <section id="reproductor">
                    
                        <button class="btn btn-primary " id="<?php echo $datos['titulo']?>" onclick="reproducir('<?php echo $datos1?>')" >  <i class="fas fa-play"></i></button>    
                    </section>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        </table>    
    </div>
    </div>