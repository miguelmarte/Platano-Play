function agregardatos(nombre){
    nombre=$('#newNombre').val();
    usuario=$('#newUsuario').val();
    pass=$('#newPass').val();
    
    cadena="nombre=" + nombre + "&usuario=" + usuario + "&pass=" + pass;
    $.ajax({
        type:"POST",
        url:"../play_admin/tabla_admin/agregarDatos.php",
        data:cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tabla_admin/tabla.php');
                alertify.success("Agregado con exito");
            }else if (r==2) {
                alertify.error("El Administrador insertado ya existe");
            }else{
                alertify.error("Error al agregar");
            }
        }
    });
}


function agregarForm(datos){
    d=datos.split('||');
    $('#id_admin').val(d[0]);
    $('#nombreU').val(d[1]);
    $('#usuarioU').val(d[2]);
    
}

function actualizarDatos(datos){
    id=$('#id_admin').val();
    nombre=$('#nombreU').val();
    usuario=$('#usuarioU').val();

    cadena="id="+ id + "&nombre=" + nombre + "&usuario=" + usuario;

    $.ajax({
        type:"POST",
        url:"../play_admin/tabla_admin/actualizarDatos.php",
        data:cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tabla_admin/tabla.php');
                alertify.success("Actualizado con exito");
            }else if (r==2) {
                alertify.error("El administrador insertado ya existe");
            }else{
                alertify.error("Error al actualizar");
            }
        }
    });
}
function preguntarSiNo(id){
    alertify.confirm('Eliminar Administrador', '¿Esta seguro de eliminar este Administrador?', function(){ eliminarDatos(id) }
                , function(){ alertify.error('Cancelado')});
}
function eliminarDatos(id){
    cadena="id=" + id;

    $.ajax({
        type:"POST",
        url:"../play_admin/tabla_admin/eliminarDatos.php",
        data:cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tabla_admin/tabla.php');
             
                alertify.success("Eliminado con exito");
            }else{
                alertify.error("Error al eliminar");
            }
        }
    });

}
