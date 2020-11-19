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
                    containerMenu.style.borderBottom = "3px solid #000000";

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


            /////////////////////// Filtrado de búsqueda /////////////////////

            //Variables
            var inputSearch = document.querySelector('#inputSearch');
            var box_search = document.querySelector('#box-search');

            if (inputSearch) {
                inputSearch.addEventListener("keyup", buscador_interno);
            }

            //Funcion
            function buscador_interno() {
                var filter = inputSearch.value.toUpperCase();
                var li = box_search.getElementsByTagName("li");

                // Recorriendo elementos a filtrar mediante los li
                for (var i = 0; i < li.length; i++) {
                    var a = li[i].getElementsByTagName("a")[0];
                    var textValue = a.textContent || a.innerText;

                    if (textValue.toUpperCase().indexOf(filter) !== -1) {

                        li[i].style.display = "";
                        box_search.style.display = "block";

                        if (inputSearch.value === "") {
                            box_search.style.display = "none";
                        }

                    } else {
                        li[i].style.display = "none";
                    }
                };
            };

            ////////////////// Validar formulario de contacto (Campos obligatorios) //////////////
            
                var nombre, apellido, correo, mensaje, errorDivNom, errorDivApe, errorDivCor, expresion;

                nombre = document.querySelector('#nombre');
                apellido = document.querySelector('#apellido');
                correo = document.querySelector('#correo');
                mensaje = document.querySelector('#mensaje');
                errorDivNom = document.querySelector('#error_1');
                errorDivApe = document.querySelector('#error_2');
                errorDivCor = document.querySelector('#error_3');
                expresion = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
                

                if(nombre) {
                    nombre.addEventListener('blur', validarNombre);
                }
                if(apellido) {
                    apellido.addEventListener('blur', validarApellido);
                }

                function validarNombre() {
                    if(this.value == '') {
                        errorDivNom.style.display = 'block';
                        errorDivNom.innerHTML = "este campo es obligatorio";
                        this.style.border = '2px solid red';
                        errorDivNom.style.color = 'red';
                        errorDivNom.style.paddingTop = '10px';
                    } else {
                        errorDivNom.style.display = 'none';
                        this.style.border = '2px solid #eeae00';
                    }
                }

                function validarApellido() {
                    if(this.value == '') {
                        errorDivApe.style.display = 'block';
                        errorDivApe.innerHTML = "este campo es obligatorio";
                        this.style.border = '2px solid red';
                        errorDivApe.style.color = 'red';
                        errorDivApe.style.paddingTop = '10px';
                    } else {
                        errorDivApe.style.display = 'none';
                        this.style.border = '2px solid #eeae00';
                    }
                }

                ////////// Validar Expresion del correo ///////////
                if(correo) {
                    correo.addEventListener('blur', validarExpresion);
                }

                function validarExpresion() {
                  if(expresion.test(correo) == true) {
                      alert("correo valido");
                  } else {
                    alert("correo NO valido");
                  }
                }

            
        }); // DOM CONTENT LOADED
}());