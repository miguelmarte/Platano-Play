
function preguntarSiNo(id){
    alertify.confirm('Eliminar Musica', '¿Esta seguro de eliminar esta Musica?', function(){ eliminarDatos(id) }
                , function(){ alertify.error('Cancelado')});
}
function preguntarAutorizar(id){
    alertify.confirm('Autorizar Musica', '¿Esta seguro de autorizar esta Musica?', function(){ autorizar(id) }
                , function(){ alertify.error('Cancelado')});
}

function preguntarAutorizar(id){
    cadena="id=" + id;

    $.ajax({
        type:"POST",
        url:"../play_admin/tabla_autorizar/autorizar.php",
        data:cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tabla_autorizar/tabla.php');
             
                alertify.success("Autorizacion completada con exito");
            }else{
                alertify.error("Error al autorizar");
            }
        }
    });

}
function eliminarDatos(id){
    cadena="id=" + id;

    $.ajax({
        type:"POST",
        url:"../play_admin/tabla_autorizar/eliminarDatos.php",
        data:cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tabla_autorizar/tabla.php');
             
                alertify.success("Eliminado con exito");
            }else{
                alertify.error("Error al eliminar");
            }
        }
    });

}
