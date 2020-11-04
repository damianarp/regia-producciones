(function () {

    "use strict";



    document.addEventListener('DOMContentLoaded', function () {

        ////////////////// Mapa con LeafletJS ////////////////////////////////////////
        if (document.querySelector('.mapa')) {
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
        let containerMenu = document.getElementById('menu');
        let footer = document.querySelector('footer');
        let activador = true;

        btnMenu.addEventListener('click', () => {

            document.querySelector('.btn-menu i').classList.toggle('fa-times');

            if (activador) {
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
        let ubicacionPrincipal = window.pageYOffset;
        let goTop = document.querySelector('.ir-arriba');
        let ubicacionFooter = window.pageYOffset;

        window.onscroll = function () {

            ///////////// Desplazamiento footer Mobile ////////
            let desplazamientoFooter = window.pageYOffset;

    
            ////////////// Mostrar y ocultar Scroll Estilos ///////////
            let arriba = window.pageYOffset;

            if (arriba <= 600) {
                containerMenu.style.borderBottom = "none";

                goTop.style.right = "-100%";
            } else {
                containerMenu.style.borderBottom = "3px solid #ff2e63";

                goTop.style.transition = "0.9s ease-in-out";
                goTop.style.right = "0px";
            }
        };


        //////////////// Scroll Para iOS /////////////
        $('a[href*="#"]')
            // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function (event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function () {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                }
            });
    });

})();