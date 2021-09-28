
jQuery(document).on('submit','#formreg',function(event){
            event.preventDefault();
            jQuery.ajax({
                url:'registrarse.php',
                type:'POST',
                dataType:'json',
                data:$(this).serialize(),
                beforeSend:function(){
                  $('.botonlg').val('Registrando...');
                }
              })
              .done(function(respuesta){
                if (!respuesta.error) {
                  location.href='./index.php';
                }else {
                  $('.error').slideDown('slow');
                  setTimeout(function(){
                    $('.error').slideUp('slow');
                  },3000);
                  $('.botonlg').val('Registarse');
                }
              })
              .fail(function(resp){
                console.log(resp);
              })
              .always(function(){ 
                console.log("complete");
            });
      });
