
function agregarForm(datos){
    d=datos.split('||');
    $('#id_album').val(d[0]);
    $('#nombreU').val(d[1]);
    $("#generoU").val(d[4]);
    $('#generoU').change(); 
}



function actualizarDatos(datos){
    id=$('#id_album').val();
    nombre=$('#nombreU').val();
    genero=$('#generoU').val();

    cadena="id="+ id + "&nombre=" + nombre + "&genero=" + genero;

    $.ajax({
        type:"POST",
        url:"../play_admin/tabla_albumes/actualizarDatos.php",
        data:cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tabla_albumes/tabla.php');
                alertify.success("Actualizado con exito");
            }else if (r==2) {
                alertify.error("El album insertado ya existe");
            }else{
                alertify.error("Error al actualizar");
            }
        }
    });
}
function preguntarSiNo(id){
    alertify.confirm('Eliminar Album', '¿Esta seguro de eliminar este Album?', function(){ eliminarDatos(id) }
                , function(){ alertify.error('Cancelado')});
}
function eliminarDatos(id){
    cadena="id=" + id;

    $.ajax({
        type:"POST",
        url:"../play_admin/tabla_albumes/eliminarDatos.php",
        data:cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tabla_albumes/tabla.php');
             
                alertify.success("Eliminado con exito");
            }else{
                alertify.error("Error al eliminar");
            }
        }
    });

}
