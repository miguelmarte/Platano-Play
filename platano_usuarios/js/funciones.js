
function reproducir(datos) {
    d=datos.split('||');
    
    var audio = document.getElementById('reproductor_audio');
    
    
    var boton = document.getElementById(d[2]);
    var boton1 = document.getElementById('btn-reproducir');
    //var v = document.getElementById(d[0]);
    
        if (!audio.paused && !audio.ended) {
            audio.pause();
            boton.innerHTML = '<i class="fas fa-play"></i>';
            boton1.innerHTML = '<i class="fas fa-play"></i>';
            
            
        }else {
            audio.src="../Musica/"+d[4];
            audio.play();
            boton.innerHTML= '<i class="fas fa-pause"></i>';
            boton1.innerHTML= '<i class="fas fa-pause"></i>';
            
        }

};

function repro() {
    
    var boton1 = document.getElementById('btn-reproducir');
    var audio = document.getElementById('reproductor_audio');
    
        if (!audio.paused && !audio.ended) {
            audio.pause();
            boton1.innerHTML = '<i class="fas fa-play"></i>';
            
            
        }else {
            audio.play();
            boton1.innerHTML= '<i class="fas fa-pause"></i>';
            
        }

};


