<h1 class="titulo">Artistas</h1>
            
            <section class="musica">
                <div class="contenedor">
                    
                    <?php
            
                    
                
                            require '../conexion.php';
                            $nueva_consulta= $mysqli->prepare("SELECT * FROM artistas");
                            $nueva_consulta->execute();
                            $resultado=$nueva_consulta->get_result();
                            while($datos=$resultado->fetch_assoc()){
                        ?>
                            <article class="musica_columna">
                                <img src="../platano_artistas/<?php echo $datos['img_perfil'] ?>" onclick="artista('<?php echo $datos['id_artista']?>')">
                                
                                <h3 align="center"><a href="#"><?php echo $datos['nombre'] ?></a></h3>
                            </article>
                        
                        <?php
                        }
                    ?>
                    <article>
                        <br>
                        <br>
                        <br>                    
                    </article>
                
            </div>


        </section>