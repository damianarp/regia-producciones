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
        expresion = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;


        if (nombre) {
            nombre.addEventListener('blur', validarNombre);
        }
        if (apellido) {
            apellido.addEventListener('blur', validarApellido);
        }

        function validarNombre() {
            if (nombre.value == '') {
                errorDivNom.style.display = 'block';
                errorDivNom.innerHTML = "este campo es obligatorio";
                nombre.style.border = '2px solid red';
                errorDivNom.style.color = 'red';
								errorDivNom.style.paddingTop = '10px';
								return false;
            } else {
                errorDivNom.style.display = 'none';
								nombre.style.border = '2px solid #eeae00';
								return true;
            }
        }

        function validarApellido() {
            if (apellido.value == '') {
                errorDivApe.style.display = 'block';
                errorDivApe.innerHTML = "este campo es obligatorio";
                apellido.style.border = '2px solid red';
                errorDivApe.style.color = 'red';
								errorDivApe.style.paddingTop = '10px';
								return false;
            } else {
                errorDivApe.style.display = 'none';
								apellido.style.border = '2px solid #eeae00';
								return true;
            }
        }

        ////////// Validar Expresion del correo ///////////
        if (correo) {
            correo.addEventListener('keyup', validarExpresion);
        }

        function validarExpresion() {
            if (expresion.test(correo.value) == true) {
                errorDivCor.style.display = 'none';
								correo.style.border = '2px solid #eeae00';
								return true;
            } else {
                errorDivCor.style.display = 'block';
                errorDivCor.innerHTML = "Escribe un correo válido";
                correo.style.border = '2px solid red';
                errorDivCor.style.color = 'red';
								errorDivCor.style.paddingTop = '10px';
								return false;
            }
        }

        /////////// Sweet Alert 2 ///////
        // $("#enviado").click(function(){
            
        //         Swal.fire({
        //             type: "success",
        //             title: "Correcto",
        //             text: "El mensaje se ha enviado correctamente",
        //             icon: "success",
        //             closeOnClickOutside: false,
        //             showConffirmButton: true
        //         });
                
				//     })
				
        function limpiarCamposContacto() {
						const nombre = document.querySelector('#nombre');
						const apellido = document.querySelector('#apellido');
						const correo = document.querySelector('#correo');
						const mensaje = document.querySelector('#mensaje');
						const errorDivNom = document.querySelector('#error_1');
						const errorDivApe = document.querySelector('#error_2');
						const errorDivCor = document.querySelector('#error_3');

						nombre.value = '';
						apellido.value = '';
						correo.value = '';
						mensaje.value = '';

						errorDivNom.style.display = 'none';
						nombre.style.border = '2px solid #eeae00';
						errorDivApe.style.display = 'none';
						apellido.style.border = '2px solid #eeae00';
						errorDivCor.style.display = 'none';
						correo.style.border = '2px solid #eeae00';
						
				}
        
        ////// AJAX contacto////////
				$('#enviado').click(function() { //Si pongo el # del id no inserta en la BBDD
						// aca debemos validar antes de enviar y marcarle al usuario los errores o campos obligatorios
						if (!validarNombre()) {
								nombre.focus();
								return;
						}
						if (!validarApellido()) {
								apellido.focus();
								return;
						}
						if (!validarExpresion()) {
								correo.focus();
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
												icon: 'success',
												closeOnClickOutside: false
										});

										// limpiamos los campos!!!
										limpiarCamposContacto();
								}else{
										Swal.fire({
												title: 'Upss',
												text: data.msg ? data.msg : 'Hubo un error, no pudo enviar el mensaje!', // esto es un IF corto!!!! el signo de pregunta denotaria el SI, y los dos punto el SINO
												icon: 'error',
												closeOnClickOutside: false
										});
								}
						}).fail(function(data){
								Swal.fire({
										title: 'Upss',
										text: 'Hubo un error!',
										icon: 'error',
										closeOnClickOutside: false
								});
						});
						
						return false;
				});

        ////// AJAX suscripción////////
        $('#suscripcion').submit(function(e) {
            e.preventDefault();
            let nombre = $.trim($("#name").val());
            let email = $.trim($("#mail").val());
            let fechareg = date("d/m/y");

            if(nombre.length == "" || email.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Completá todos los campos',
                    confirmButtonColor: '#eeae00'
                });
                return false;
            } else {
                $.ajax({
                    url: "includes/funciones/registrar.php",
                    type: "POST",
                    datatype: "json",
                    data: {nombre:name, email:mail, fechareg:fechareg},
                    success: function(data){
                        if(data == 'exito') {
                            Swal.fire({
                                type: 'success',
                                title: 'Te has suscripto correctamente!'
                            });
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Hubo un error! No se completó la suscripción.'
                            });
                        }
                    }
                });
            }

        });




























        // $(function() {
        //     $('suscribir').click(function() { //Si pongo el # del id no inserta en la BBDD
        //         let destino = "registrar.php";
        //         $.ajax({
        //             type: 'POST',
        //             url: destino,
        //             data: $('#suscripcion').serialize(),
        //             dataType: 'json',
        //         }).done(function(data) {
        //             var resultado = data;
        //             if(resultado.respuesta === 'exito'){
        //                 Swal.fire({
        //                     title: "Correcto",
        //                     text: "Te has suscripto correctamente",
        //                     icon: "success",
        //                     closeOnClickOutside: false
        //                 });
        //             }else{
        //                 Swal.fire({
        //                     title: "Error",
        //                     text: "Hubo un error, no has podido suscribirte!",
        //                     icon: "error",
        //                     closeOnClickOutside: false
        //                 });
        //             }   
                        
        //             }).fail( function(data){
        //                 Swal.fire({
        //                     title: "Error",
        //                     text: "Hubo un error!",
        //                     icon: "error",
        //                     closeOnClickOutside: false
        //                 });
        //             });
                
        //         return false;
        //     });
        // });

    }); // DOM CONTENT LOADED
}());