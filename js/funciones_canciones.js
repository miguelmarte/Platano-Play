
function agregarForm(datos){
    d=datos.split('||');
    $('#id_cancion').val(d[0]);
    $('#tituloU').val(d[4]);
    $('#duracionU').val(d[5]);
    $("#generoU").val(d[3]);
    $('#generoU').change(); 
    $("#explisitoU").val(d[6]);
    $('#explisitoU').change(); 
}



function actualizarDatos(datos){
    id=$('#id_cancion').val();
    titulo=$('#tituloU').val();
    genero=$('#generoU').val();
    duracion=$('#duracionU').val();
    explisito=$("#explisitoU").val();

    cadena="id="+ id + "&titulo=" + titulo + "&genero=" + genero + "&duracion=" + duracion + "&explisito=" + explisito;

    $.ajax({
        type:"POST",
        url:"../play_admin/tabla_canciones/actualizarDatos.php",
        data:cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tabla_canciones/tabla.php');
                alertify.success("Actualizado con exito");
            }else if (r==2) {
                alertify.error("La musica insertada ya existe");
            }else{
                alertify.error("Error al actualizar");
            }
        }
    });
}
function preguntarSiNo(id){
    alertify.confirm('Eliminar Musica', '¿Esta seguro de eliminar esta Musica?', function(){ eliminarDatos(id) }
                , function(){ alertify.error('Cancelado')});
}
function eliminarDatos(id){
    cadena="id=" + id;

    $.ajax({
        type:"POST",
        url:"../play_admin/tabla_canciones/eliminarDatos.php",
        data:cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tabla_canciones/tabla.php');
             
                alertify.success("Eliminado con exito");
            }else{
                alertify.error("Error al eliminar");
            }
        }
    });

}
