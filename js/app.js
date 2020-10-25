(function() {

    "use strict";

    document.addEventListener('DOMContentLoaded', function(){

        console.log("Listo");
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
    
})();
