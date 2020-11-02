(function() {

    // "use strict";


    
    document.addEventListener('DOMContentLoaded', function(){

        ////////////////// Mapa con LeafletJS ////////////////////////////////////////
        if(document.querySelector('.mapa')) {
            var map = L.map('mapa').setView([-34.903569, -57.971621], 14);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
    
            L.marker([-34.903569, -57.971621]).addTo(map)
                .bindPopup('Regia Producciones <br> Agencia de Contenidos Audiovisuales')
                .openPopup();
        }

        ////////////////////////// Menú Hamburguesa ////////////////////////////////////
        let btnMenu = document.querySelector('.btn-menu');
        let menu = document.querySelector('.list-container');
        let containerMenu = document.querySelector('.menu');
        let activador = true;

        btnMenu.addEventListener('click', () => {

            document.querySelector('.btn-menu i').classList.toggle('fa-times');
            
            if(activador) {
                menu.style.left = "0";
                menu.style.transition = "0.5s";

                activador = false;

            } else {
                activador = false;
                menu.style.left = "-100%";
                menu.style.transition = "0.5s";

                activador = true;
            }
        });

        ///////////////////// Colocar clase Activo en las pestañas del menú //////////////////
        let enlaces = document.querySelectorAll('.lists li a');

        enlaces.forEach((element) => {

            element.addEventListener('click', (event) => {

                enlaces.forEach((link) => {
                    link.classList.remove('activo');
                });

                event.target.classList.add('activo');
            });
        });  
        
        ///////////////////// Efectos Scroll ////////////////////
        var ubicacionPrincipal = window.pageYOffset;
        window.onscroll = function() {
            var desplazamientoActual = window.pageYOffset;

            // Mostrar y ocultar menú
            if(ubicacionPrincipal > desplazamientoActual) {
                document.getElementById('menu').style.top = '0';
                document.getElementById('menu').style.transition = "0.5s";
            } else {
                document.getElementById('menu').style.top = '-60px';
                document.getElementById('menu').style.transition = "0.5s";
            }
            ubicacionPrincipal = desplazamientoActual;
        };
    });
     
})();
