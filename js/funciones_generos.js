function agregardatos(nombre){
    genero=$('#newGenero').val();
    
    
    cadena="genero=" + genero;
    $.ajax({
        type:"POST",
        url:"../play_admin/tabla_generos/agregarDatos.php",
        data:cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tabla_generos/tabla.php');
                alertify.success("Agregado con exito");
            }else if (r==2) {
                alertify.error("El Genero insertado ya existe");
            }else{
                alertify.error("Error al agregar");
            }
        }
    });
}


function agregarForm(datos){
    d=datos.split('||');
    $('#id_genero').val(d[0]);
    $('#generoU').val(d[1]);
    
}

function actualizarDatos(datos){
    id=$('#id_genero').val();
    nombre=$('#nombreU').val();
    genero=$('#generoU').val();

    cadena="id="+ id + "&genero=" + genero;

    $.ajax({
        type:"POST",
        url:"../play_admin/tabla_generos/actualizarDatos.php",
        data:cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tabla_generos/tabla.php');
                alertify.success("Actualizado con exito");
            }else if (r==2) {
                alertify.error("El genero insertado ya existe");
            }else{
                alertify.error("Error al actualizar");
            }
        }
    });
}
function preguntarSiNo(id){
    alertify.confirm('Eliminar Genero', '¿Esta seguro de eliminar este Genero?', function(){ eliminarDatos(id) }
                , function(){ alertify.error('Cancelado')});
}
function eliminarDatos(id){
    cadena="id=" + id;

    $.ajax({
        type:"POST",
        url:"../play_admin/tabla_generos/eliminarDatos.php",
        data:cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tabla_generos/tabla.php');
             
                alertify.success("Eliminado con exito");
            }else{
                alertify.error("Error al eliminar");
            }
        }
    });

}
