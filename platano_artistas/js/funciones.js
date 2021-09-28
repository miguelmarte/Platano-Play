function agregarForm(datos){
    d=datos.split('||');
    $("#nombreU").val(d[1]);
    $("#correoU").val(d[2]);

}


function actualizarDatos(datos){
    nombre=$('#nombreU').val();
    correo=$("#correoU").val();
  

    cadena="nombre=" + nombre + "&correo=" + correo;

    $.ajax({
        type:"POST",
        url:"php/actualizarDatos.php",
        data:cadena,
        success: function(r){
            if(r==1){
                location.reload(); 
            }else if (r==2) {
                alertify.error("El album insertado ya existe");
            }else{
                alertify.error("Error al actualizar");
            }
        }
    });
}
function preguntarSiNo(id){
    alertify.confirm('Eliminar Cuenta', '¿Esta seguro de eliminar su Cuenta?', function(){ eliminarDatos(id) }
                , function(){ alertify.error('Cancelado')});
}
function eliminarDatos(id){
    cadena="id=" + id;

    $.ajax({
        type:"POST",
        url:"php/eliminarDatos.php",
        data:cadena,
        success: function(r){
            if(r==1){
                location.reload();
            }else{
                alertify.error("Error al eliminar");
            }
        }
    });

}
