(function() {

    "use strict";


    ////////////////// Mapa con LeafletJS
    document.addEventListener('DOMContentLoaded', function(){

        if(document.querySelector('.mapa')) {
            var map = L.map('mapa').setView([-34.903569, -57.971621], 14);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
    
            L.marker([-34.903569, -57.971621]).addTo(map)
                .bindPopup('Regia Producciones <br> Agencia de Contenidos Audiovisuales')
                .openPopup();
        }
    });
    

    ////////////////////////// Menú
    let btnMenu = document.querySelector('.btn-menu');
    let menu = document.querySelector('.list-container');
    let containerMenu = document.querySelector('.menu');
    let activador = true;

    btnMenu.addEventListener('click', () => {
        console.log('funciona');
    });


})();
