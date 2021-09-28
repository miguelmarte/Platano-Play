<?php
    $id=$_SESSION['id'];
    require '../../conexion.php';
    $nueva_consulta= $mysqli->prepare("SELECT * FROM clientes where id_cliente='$id'");
    $nueva_consulta->execute();
    $resultado=$nueva_consulta->get_result();
    $datos=$resultado->fetch_assoc();
    $datos1=$datos['id_cliente'].'||'.$datos['Nombre'].'||'.$datos['Correo_Electronico'].'||'.$datos['fecha_nacimiento'].'||'.$datos['color_fondo'].'||'.$datos['color_nav'].'||'.$datos['color_fuente'];
                    
?>
<!-- Modal perfil -->
<div id="modalEdicion" class="modal">
    <div class="modal-content">
        <h4>Editar Informacion</h4>
        <input type="text" hidden="" id="id_cliente" name="">
        <label>Nombre</label>
        <input type="text" name="" id="nombreU" class="form-control input-sm" required>
        <label>Correo Electronico</label>
        <input type="text" name="" id="correoU" class="form-control input-sm" required>
        <label>Fecha de Nacimiento</label>
        <input type="date" name="" id="fechaU" class="form-control input-sm" required>
        


    </div>
    <div class="modal-footer">
        <a class="waves-effect waves-light btn" id="actualizardatos">Actualizar</a>

        <a class="waves-effect waves-light red btn" data-dismiss="modal">Cancelar</a>
        
    </div>
  </div>


<!-- Modal Foto perfil -->
<div id="modalFoto" class="modal">
    <div class="modal-content">
        <h4>Cambiar Foto de Perfil</h4>
        <form action="php/foto_perfil.php" method="post" enctype="multipart/form-data">
            <input type="file" id="foto" name="foto">
            <label>Foto de Perfil</label>
        
        
    </div>
    <div class="modal-footer">
        <button type="submit" class="waves-effect waves-light btn">Actualizar</button>
        </form>
        <a class="waves-effect waves-light red btn" data-dismiss="modal">Cancelar</a>
        
    </div>
  </div>


<!-- Modal cambiar colores -->
<div id="modalColores" class="modal">
    <div class="modal-content">
        <h4>Colores de la Interfaz</h4>
        <input type="color" value="" name="" id="color_fondo"  required>
        <label>Color de Fondo</label>
        <input type="color" value="" name="" id="color_nav"  required>
        <label>Color del reproductor</label>
        <input type="color"  value="" name="" id="color_fuente" required>
        <label>Color de Fuente</label>
        
        


    </div>
    <div class="modal-footer">
        <a class="waves-effect waves-light btn" id="actualizarcolores">Cambiar</a>

        <a class="waves-effect waves-light red btn" data-dismiss="modal">Cancelar</a>
        
    </div>
  </div>
  <!-- Modal contraseña -->
<div id="modalContra" class="modal">
    <div class="modal-content">
        <h4>Editar Contraseña</h4>
        <label>Actual Contraseña</label>
        <input type="password" name="" id="A_contra" class="form-control input-sm" required>
        <label>Nueva Contraseña</label>
        <input type="password" name="" id="new_contra" class="form-control input-sm" required>
        <label>Confirmar Contraseña</label>
        <input type="password" name="" id="confir_contra" class="form-control input-sm" required>
        


    </div>
    <div class="modal-footer">
        <a class="waves-effect waves-light btn" id="actualizarContra">Cambiar</a>

        <a class="waves-effect waves-light red btn" data-dismiss="modal">Cancelar</a>
        
    </div>
  </div>