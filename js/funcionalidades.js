
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

        ///////////////// AOS Instance /////////////////////
        AOS.init();

        ///////////////////// Efectos Scroll ////////////////////
        let goTop = document.querySelector('.ir-arriba');
        
        window.onscroll = function () {
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


        /////////////////////// Filtrado en el buscador de la página 404 /////////////////////

        // Variables
        var inputSearch = document.querySelector('#inputSearch');
        var box_search = document.querySelector('#box-search');
        
        // Valida si alguien escribe
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
        var nombreCon, apellidoCon, correoCon, asunto, mensaje, errorDivNom, errorDivApe, errorDivCor, errorAsunto, expresion;

        nombreCon = document.querySelector('#nombre');
        apellidoCon = document.querySelector('#apellido');
        correoCon = document.querySelector('#correo');
        mensaje = document.querySelector('#mensaje');
        asunto = document.querySelector('#asunto');
        errorDivNom = document.querySelector('#error_1');
        errorDivApe = document.querySelector('#error_2');
        errorAsunto = document.querySelector('#error_13');
        errorDivCor = document.querySelector('#error_3');
        expresion = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;

        // Validar Nombre (estilos)
        if (nombreCon) {
            nombreCon.addEventListener('blur', validarNombre);
            nombreCon.addEventListener('keyup', validarNombre);
        }

        function validarNombre() {
            if (nombreCon.value == '') {
                errorDivNom.style.display = 'block';
                errorDivNom.innerHTML = "este campo es obligatorio";
                nombreCon.style.border = '2px solid red';
                errorDivNom.style.color = 'red';
                errorDivNom.style.paddingTop = '10px';
                return false;
            } else {
                errorDivNom.style.display = 'none';
                nombreCon.style.border = '2px solid #eeae00';
                return true;
            }
        }

        // Validar Apellido (estilos)
        if (apellidoCon) {
            apellidoCon.addEventListener('blur', validarApellido);
            apellidoCon.addEventListener('keyup', validarApellido);
        }

        function validarApellido() {
            if (apellidoCon.value == '') {
                errorDivApe.style.display = 'block';
                errorDivApe.innerHTML = "este campo es obligatorio";
                apellidoCon.style.border = '2px solid red';
                errorDivApe.style.color = 'red';
                errorDivApe.style.paddingTop = '10px';
                return false;
            } else {
                errorDivApe.style.display = 'none';
                apellidoCon.style.border = '2px solid #eeae00';
                return true;
            }
        }
        // Validar Asunto (estilos)
        if (asunto) {
            asunto.addEventListener('blur', validarAsunto);
            asunto.addEventListener('keyup', validarAsunto);
        }

        function validarAsunto() {
            if (asunto.value == '') {
                errorAsunto.style.display = 'block';
                errorAsunto.innerHTML = "este campo es obligatorio";
                asunto.style.border = '2px solid red';
                errorAsunto.style.color = 'red';
                errorAsunto.style.paddingTop = '10px';
                return false;
            } else {
                errorAsunto.style.display = 'none';
                asunto.style.border = '2px solid #eeae00';
                return true;
            }
        }

        ////////// Validar Expresion del correo ///////////
        if (correoCon) {
            correoCon.addEventListener('blur', validarExpresionCon);
            correoCon.addEventListener('keyup', validarExpresionCon);
        }

        // Validar Correo (estilos)
        function validarExpresionCon() {
            if (expresion.test(correoCon.value) == true) {
                errorDivCor.style.display = 'none';
                correoCon.style.border = '2px solid #eeae00';
                return true;
            } else {
                errorDivCor.style.display = 'block';
                errorDivCor.innerHTML = "escribe un correo válido";
                correoCon.style.border = '2px solid red';
                errorDivCor.style.color = 'red';
                errorDivCor.style.paddingTop = '10px';
                return false;
            }
        }

        
		// Limpiar formulario de Contacto
        function limpiarCamposContactoCon() {
            
            nombreCon.value = '';
            apellidoCon.value = '';
            correoCon.value = '';
            asunto.value = '';
            mensaje.value = '';

            errorDivNom.style.display = 'none';
            nombreCon.style.border = '2px solid #eeae00';
            errorDivApe.style.display = 'none';
            apellidoCon.style.border = '2px solid #eeae00';
            errorAsunto.style.display = 'none';
            asunto.style.border = '2px solid #eeae00';
            errorDivCor.style.display = 'none';
            correoCon.style.border = '2px solid #eeae00';
            
        }
        
        ////// AJAX contacto////////
        $('#enviado').click(function() { 
            // aca debemos validar antes de enviar y marcarle al usuario los errores o campos obligatorios
            if (!validarNombre()) {
                nombreCon.focus();
                return;
            }
            if (!validarApellido()) {
                apellidoCon.focus();
                return;
            }
            if (!validarAsunto()) {
                asunto.focus();
                return;
            }
            if (!validarExpresionCon()) {
                correoCon.focus();
                return;
            }
            $.ajax({
                type: 'POST',
                url: 'contactar.php',
                data: $('#formulario').serialize(),
                dataType: 'json',
            }).done(function(data) {
                // var resultado = data; // no hace falta por ahora
                if(data.success){
                    Swal.fire({
                        title: 'Correcto',
                        text: data.msg, //'El mensaje se envió correctamente', // o podemos poner el mensaje que viene de la respuesta
                        type: 'success',
                        confirmButtonColor: '#eeae00',
                        allowOutsideClick: false
                    });

                    // limpiamos los campos!!!
                    limpiarCamposContactoCon();
                }else{
                    Swal.fire({
                        title: 'Upss',
                        text: data.msg ? data.msg : 'Hubo un error, no pudo enviar el mensaje!', // esto es un IF corto!!!! el signo de pregunta denotaria el SI, y los dos punto el SINO
                        type: 'error',
                        confirmButtonColor: '#eeae00',
                        allowOutsideClick: false
                    });
                    // limpiamos los campos!!!
                    limpiarCamposContactoCon();
                }
            }).fail(function(data){
                Swal.fire({
                    title: 'Upss',
                    text: 'Hubo un error!',
                    type: 'error',
                    confirmButtonColor: '#eeae00',
                    allowOutsideClick: false
                });
            });
            
            return false;
        });

        ////////////////// Validar formulario de Suscripción (Campos obligatorios) //////////////
        var nombreSusc, correoSusc, errorDivNomSusc, errorDivCorSusc;

        nombreSusc = document.querySelector('#name');
        correoSusc = document.querySelector('#mail');
        errorDivNomSusc = document.querySelector('#error_4');
        errorDivCorSusc = document.querySelector('#error_5');

        expresion = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;

        if (nombreSusc) {
            nombreSusc.addEventListener('blur', validarNombreSusc);
            nombreSusc.addEventListener('keyup', validarNombreSusc);
        }

        // Validar Nombre (estilos)
        function validarNombreSusc() {
            if (nombreSusc.value == '') {
                errorDivNomSusc.style.display = 'block';
                errorDivNomSusc.innerHTML = "este campo es obligatorio";
                nombreSusc.style.border = '3px solid #eeae00';
                errorDivNomSusc.style.color = '#eeae00';
                errorDivNomSusc.style.paddingTop = '5px';
                return false;
            } else {
                errorDivNomSusc.style.display = 'none';
                nombreSusc.style.border = 'none';
                return true;
            }
        }

        ////////// Validar Expresion del correo ///////////
        if (correoSusc) {
            correoSusc.addEventListener('blur', validarExpresionSusc);
            correoSusc.addEventListener('keyup', validarExpresionSusc);
        }

        // Validar Correo (estilos)
        function validarExpresionSusc() {
            if (expresion.test(correoSusc.value) == true) {
                errorDivCorSusc.style.display = 'none';
                correoSusc.style.border = 'none';
                return true;
            } else {
                errorDivCorSusc.style.display = 'block';
                errorDivCorSusc.innerHTML = "escribe un correo válido";
                correoSusc.style.border = '3px solid #eeae00';
                errorDivCorSusc.style.color = '#eeae00';
                errorDivCorSusc.style.paddingTop = '5px';
                return false;
            }
        }

        //Limpiar formulario de suscripción
        function limpiarCamposContactoSusc() {

            nombreSusc.value = '';
            correoSusc.value = '';

            errorDivNomSusc.style.display = 'none';
            nombreSusc.style.border = 'none';
            errorDivCorSusc.style.display = 'none';
            correoSusc.style.border = 'none';
            
        }

        ////// AJAX suscripción////////
        $('#suscribir').click(function() { 
            // aca debemos validar antes de enviar y marcarle al usuario los errores o campos obligatorios
            if (!validarNombreSusc()) {
                nombreSusc.focus();
                return;
            }
            if (!validarExpresionSusc()) {
                correoSusc.focus();
                return;
            }
            $.ajax({
                type: 'POST',
                url: 'registrar.php',
                data: $('#suscripcion').serialize(),
                dataType: 'json',
            }).done(function(data) {
                // var resultado = data; // no hace falta por ahora
                if(data.success){
                    Swal.fire({
                        title: 'Correcto',
                        text: data.msg, //'Te has suscripto correctamente', // o podemos poner el mensaje que viene de la respuesta
                        type: 'success',
                        confirmButtonColor: '#eeae00',
                        allowOutsideClick: false
                    });

                    // limpiamos los campos!!!
                    limpiarCamposContactoSusc();
                }else{
                    Swal.fire({
                        title: 'Ups',
                        text: data.msg ? data.msg : 'Hubo un error, no pudo suscribirse!', // esto es un IF corto!!!! el signo de pregunta denotaria el SI, y los dos punto el SINO
                        type: 'warning',
                        confirmButtonColor: '#eeae00',
                        allowOutsideClick: false    
                    });
                }
            }).fail(function(data){
                Swal.fire({
                    title: 'Upss',
                    text: 'Hubo un error!',
                    type: 'error',
                    confirmButtonColor: '#eeae00',
                    allowOutsideClick: false
                });
            });
            
            return false;
        });

        // Deshabilitar botones de la paginacion del blog
        $('.disabled a').click(function(){
            return false;
        });

    
    }); //-----> DOM CONTENT LOADED
}());