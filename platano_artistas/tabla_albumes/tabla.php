   <div class="row">
    <div class="col-sm-12">
    
        <table class="table table-hover table-condensed table-bordered" id="tabladinamica">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Artista</th>
                    <th>Genero</th>
                 
                    <th></th>
                    
                </tr>
            </thead>
            <tbody>
            <?php  
            
            session_start();
            $id=$_SESSION['id_artista'];
                
                require '../../conexion.php';
                $nueva_consulta= $mysqli->prepare("SELECT * FROM albums where estado='A' AND id_artista='$id'");
                $nueva_consulta->execute();
                $resultado=$nueva_consulta->get_result();
                while($datos=$resultado->fetch_assoc()){
                    $id_genero=$datos['id_genero'];
                    require '../../conexion.php';
                    $nueva_consulta1= $mysqli->prepare("SELECT * FROM genero where id_genero='$id_genero'");
                    $nueva_consulta1->execute();
                    $resultado1=$nueva_consulta1->get_result();
                    $datos2=$resultado1->fetch_assoc();

                    $id_artista=$datos['id_artista'];
                    require '../../conexion.php';
                    $nueva_consulta2= $mysqli->prepare("SELECT * FROM artistas where id_artista='$id_artista'");
                    $nueva_consulta2->execute();
                    $resultado2=$nueva_consulta2->get_result();
                    $datos3=$resultado2->fetch_assoc();

                    $datos1=$datos['id_album'].'||'.$datos['nombre'].'||'.$datos2['genero'].'||'.$datos3['nombre'].'||'.$datos['id_genero'];
                    
            ?>
            <tr>
                <td><?php echo $datos['id_album']?></td>
                <td><?php echo $datos['nombre']?></td>
                <td><?php echo $datos3['nombre']?></td>
                <td><?php echo $datos2['genero']?></td>
                
              
                <td>
                    <button class="btn btn-warning " data-toggle="modal" data-target="#modalEdicion" onclick="agregarForm('<?php echo $datos1 ?>')"><i class="fa fa-pencil"></i></button>
                
                    <button class="btn btn-primary " onclick="location.href='tabla_canciones.php?id_album=<?php echo $datos['id_album']?> ' "> <i class="fa fa-eye"></i></button>
            
                    <button class="btn btn-danger" onclick="preguntarSiNo(<?php echo $datos['id_album'] ?>)"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        </table>    
    </div>
    </div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tabladinamica').DataTable({
            language:{
                "sProcessing":     "Procesando...",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
</script>