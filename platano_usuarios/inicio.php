<h1 class="titulo">Albumes Reciente</h1>
            
                    <section class="musica">
                        <div class="contenedor">
                            
                            <?php
                            
                        
                                require '../conexion.php';
                                $nueva_consulta1= $mysqli->prepare("SELECT * FROM albums where estado='A' order by id_album ASC");
                                $nueva_consulta1->execute();
                                $resultado1=$nueva_consulta1->get_result();
                                while($datos1=$resultado1->fetch_assoc()){
                        
                                    $id_artista=$datos1['id_artista'];
                        
                                    require '../conexion.php';
                                    $nueva_consulta2= $mysqli->prepare("SELECT * FROM artistas where id_artista='$id_artista'");
                                    $nueva_consulta2->execute();
                                    $resultado2=$nueva_consulta2->get_result();
                                    while($datos2=$resultado2->fetch_assoc()){
                                ?>
                                    <article class="musica_columna">
                                        <input type="text" name="id_album" hidden="" value="<?php echo $datos1['id_album'] ?>">
                                        <img src="../portadas_albums/<?php echo $datos1['portada'] ?>" onclick="album('<?php echo $datos1['id_album']?>')">
                                        
                                        <h3 align="center"><a><?php echo $datos1['nombre'] ?></a></h3>
                                        <h4 align="center"><a><?php echo $datos2['nombre'] ?></a></h4>
                                    </article>
                                
                                <?php
                                }
                                }
                            ?>
                        <article>
                            <br>
                            <br>
                            <br>                    
                        </article>
                        
                        
                    </div>


                </section>