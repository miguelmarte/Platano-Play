function reproducir(datos) {
    d=datos.split('||');
    var boton = document.getElementById(d[4]);
    var v = document.getElementById(d[0]);
    
        if (!v.paused && !v.ended) {
            v.pause();
            boton.innerHTML = '<i class="fas fa-play"></i>';
            
            
        } else {
            v.play();
            boton.innerHTML= '<i class="fas fa-pause"></i>';
            
        }

};  