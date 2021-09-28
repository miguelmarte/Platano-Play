
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
                if (respuesta==1){
                  location.href='./platano_play.php';
                }else if(respuesta==2){
                  location.href='../platano_artistas/index.php';
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
