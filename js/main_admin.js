
jQuery(document).on('submit','#formlg',function(event){
            event.preventDefault();
            jQuery.ajax({
                url:'login.php',
                type:'POST',
                dataType:'json',
                data:$(this).serialize(),
                beforeSend:function(){
                  $('.botonlg').val('Validando...');
                }
              })
              .done(function(respuesta){
                if (!respuesta.error) {
                  location.href='./portal_administrador.php';
                }else {
                  $('.error').slideDown('slow');
                  setTimeout(function(){
                    $('.error').slideUp('slow');
                  },3000);
                  $('.botonlg').val('Acceder');
                }
              })
              .fail(function(resp){
                console.log(resp);
              })
              .always(function(){ 
                console.log("complete");
            });
      });
