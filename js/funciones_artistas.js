
function agregarForm(datos){
    d=datos.split('||');
    $('#id_artista').val(d[0]);
    $('#artistaU').val(d[1]);

    $('#correoU').val(d[3]);
       
    $("#generoU").val(d[4]);
    $('#generoU').change(); 
}

function actualizarDatos(datos){
    id=$('#id_artista').val();
    nombre=$('#artistaU').val();
    genero=$('#generoU').val();
    correo=$('#correoU').val();

    cadena="id="+ id + "&nombre=" + nombre + "&genero=" + genero + "&correo=" + correo;

    $.ajax({
        type:"POST",
        url:"../play_admin/tabla_artistas/actualizarDatos.php",
        data:cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tabla_artistas/tabla.php');
                alertify.success("Actualizado con exito");
            }else if (r==2) {
                alertify.error("El artista insertado ya existe");
            }else{
                alertify.error("Error al actualizar");
            }
        }
    });
}
function preguntarSiNo(id){
    alertify.confirm('Eliminar Artista', '¿Esta seguro de eliminar este Artista?', function(){ eliminarDatos(id) }
                , function(){ alertify.error('Cancelado')});
}
function eliminarDatos(id){
    cadena="id=" + id;

    $.ajax({
        type:"POST",
        url:"../play_admin/tabla_artistas/eliminarDatos.php",
        data:cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tabla_artistas/tabla.php');
             
                alertify.success("Eliminado con exito");
            }else{
                alertify.error("Error al eliminar");
            }
        }
    });

}
