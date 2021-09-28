
<!-- Modal perfil -->
<div id="modalEdicion" class="modal">
    <div class="modal-content">
        <h4>Editar Informacion</h4>
    
        <label>Nombre</label>
        <input type="text" name="" id="nombreU" class="form-control input-sm" required>
        <label>Correo Electronico</label>
        <input type="text" name="" id="correoU" class="form-control input-sm" required>
 
    </div>
    <div class="modal-footer">
        <a class="waves-effect waves-light btn" id="actualizardatos">Actualizar</a>
        
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
        
    </div>
  </div>


  <div id="modal1" class="modal">
        <div class="modal-content ">
            <h4>Comienza tu album nuevo</h4>
            <p>Llena los campos ¡Y no te olvides de la imagen para tu album!</p>
            <div class="input-field">
            <form action="php/foto_album.php" method="post" enctype="multipart/form-data">
                <input  id="icon_prefix" class="validate" type="text" name="nombre">
                <label for="icon_prefix">Nombre del Album:</label>
            </div>
            <div>
                
                    <input type="file" id="foto" name="foto">
                    <label>Portada del album</label>
        
        
            </div>
            <div class="modal-footer">
                <button type="submit" class="waves-effect waves-light btn">Actualizar</button>
                </form>
            </div>
            
            
        </div>
    </div>


    