function agregarForm(datos){
    d=datos.split('||');
    $('#id_cliente').val(d[0]);
    $('#nombreU').val(d[1]);
    $("#correoU").val(d[2]);
    $("#fechaU").val(d[3]);
}

function agregarColores(datos){
    d=datos.split('||');
    $('#color_fondo').val(d[4]);
    $('#color_nav').val(d[5]);
    $("#color_fuente").val(d[6]);
}


function actualizarContra(){
    A_contra=$('#A_contra').val();
    new_contra=$("#new_contra").val();
    confir_contra=$("#confir_contra").val();

    cadena="A_contra=" + A_contra + "&new_contra=" + new_contra + "&confir_contra=" + confir_contra;

    $.ajax({
        type:"POST",
        url:"php/actualizarContra.php",
        data:cadena,
        success: function(r){
            if(r==1){
                alertify.success("La contraseña fue cambiada exitosamente"); 
            }else if (r==2) {
                alertify.error("Contraseña insertada no valida");
            }else{
                alertify.error("Error al Cambiar contraseña");
            }
        }
    });
}


function actualizarcolores(){
    color_fondo=$("#color_fondo").val();
    color_nav=$("#color_nav").val();
    color_fuente=$("#color_fuente").val();

    cadena="color_fondo=" + color_fondo + "&color_nav=" + color_nav + "&color_fuente=" + color_fuente;

    $.ajax({
        type:"POST",
        url:"php/actualizarColores.php",
        data:cadena,
        success: function(r){
            if(r==1){
                alertify.success("Colores actualizados exitosamente"); 
            }else{
                alertify.error("Error al Cambiar colores");
            }
        }
    });
}


function actualizarDatos(datos){
    id=$('#id_cliente').val();
    nombre=$('#nombreU').val();
    correo=$("#correoU").val();
    fecha=$("#fechaU").val();

    cadena="id="+ id + "&nombre=" + nombre + "&correo=" + correo + "&fecha=" + fecha;

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
