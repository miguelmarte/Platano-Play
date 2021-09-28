   <div class="row">
    <div class="col-sm-12">
        
        <table class="table table-hover table-condensed table-bordered" id="tabladinamica">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Fecha de Registro</th>
                 
                    <th></th>
                    
                </tr>
            </thead>
            <tbody>
            <?php  
                require '../../conexion.php';
                $nueva_consulta= $mysqli->prepare("SELECT * FROM clientes where estado='A'");
                $nueva_consulta->execute();
                $resultado=$nueva_consulta->get_result();
                while($datos=$resultado->fetch_assoc()){
                    $datos1=$datos['id_cliente'].'||'.$datos['Nombre'].'||'.$datos['fecha_nacimiento'].'||'.$datos['Correo_Electronico'].'||'.$datos['fecha_registro'].'||'.$datos['Estado_Premium'];
                    
            ?>
            <tr>
                <td><?php echo $datos['id_cliente']?></td>
                <td><?php echo $datos['Nombre']?></td>
                <td><?php echo $datos['fecha_registro']?></td>
              
                <td>
                    <button class="btn btn-warning " data-toggle="modal" data-target="#modalEdicion" onclick="agregarForm('<?php echo $datos1 ?>')"><i class="fa fa-pencil"></i></button>
                
                    <button class="btn btn-danger" onclick="preguntarSiNo(<?php echo $datos['id_cliente'] ?>)"><i class="fas fa-trash"></i></button>
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