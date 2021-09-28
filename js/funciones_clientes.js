function agregardatos(aula){
    cadena="aula=" + aula;
    $.ajax({
        type:"POST",
        url:"../portal_administrador/tabla_aula/agregar_aulas.php",
        data:cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tabla_aula/tabla_aulas.php');
                alertify.success("Agregado con exito");
            }else if (r==2) {
                alertify.error("El aula insertada ya existe");
            }else{
                alertify.error("Error al agregar");
            }
        }
    });
}

function agregarForm(datos){
    d=datos.split('||');
    $('#id_cliente').val(d[0]);
    $('#clienteU').val(d[1]);
    $('#fechaU').val(d[2]);
    $('#correoU').val(d[3]);
    $('#fecha-RU').val(d[4]);
    $('#premiumU').val(d[5]);
}

function actualizarDatos(datos){
    id=$('#id_cliente').val();
    nombre=$('#clienteU').val();
    fecha=$('#fechaU').val();
    correo=$('#correoU').val();
    premium=$('#premiumU').val();

    cadena="id="+ id + "&nombre=" + nombre + "&fecha=" + fecha + "&correo=" + correo + "&premium=" + premium;

    $.ajax({
        type:"POST",
        url:"../play_admin/tabla_clientes/actualizarDatos.php",
        data:cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tabla_clientes/tabla.php');
                alertify.success("Actualizado con exito");
            }else if (r==2) {
                alertify.error("El cliente insertado ya existe");
            }else{
                alertify.error("Error al actualizar");
            }
        }
    });
}
function preguntarSiNo(id){
    alertify.confirm('Eliminar Cliente', '¿Esta seguro de eliminar esta Cliente?', function(){ eliminarDatos(id) }
                , function(){ alertify.error('Cancelado')});
}
function eliminarDatos(id){
    cadena="id=" + id;

    $.ajax({
        type:"POST",
        url:"../play_admin/tabla_clientes/eliminarDatos.php",
        data:cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tabla_clientes/tabla.php');
             
                alertify.success("Eliminado con exito");
            }else{
                alertify.error("Error al eliminar");
            }
        }
    });

}
