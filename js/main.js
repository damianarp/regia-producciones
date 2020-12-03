(function () {

    "use strict"

    document.addEventListener('DOMContentLoaded', function () {

        //Validar campos
        var titulo, descripcion, contenido, errorDivTit, errorDivDesc, errorDivCont;

        titulo = document.querySelector('#titulo');
        descripcion = document.querySelector('#descripcion');
        contenido = document.querySelector('#contenido');
        errorDivTit = document.querySelector('#error_6');
        errorDivDesc = document.querySelector('#error_7');
        errorDivCont = document.querySelector('#error_8');

        if (titulo) {
            titulo.addEventListener('blur', validarTitulo);
        }
        if (descripcion) {
            descripcion.addEventListener('blur', validarDescripcion);
        }
        if (contenido) {
            contenido.addEventListener('blur', validarContenido);
        }

        // Validar Titulo
        function validarTitulo() {
            if (titulo.value == '') {
                errorDivTit.style.display = 'block';
                errorDivTit.innerHTML = "este campo es obligatorio";
                titulo.style.border = '2px solid red';
                errorDivTit.style.color = 'red';
                errorDivTit.style.paddingTop = '10px';
                return false;
            } else {
                errorDivTit.style.display = 'none';
                titulo.style.border = '2px solid #eeae00';
                return true;
            }
        }

        // Validar Descripcion
        function validarDescripcion() {
            if (descripcion.value == '') {
                errorDivDesc.style.display = 'block';
                errorDivDesc.innerHTML = "este campo es obligatorio";
                descripcion.style.border = '2px solid red';
                errorDivDesc.style.color = 'red';
                errorDivDesc.style.paddingTop = '10px';
                return false;
            } else {
                errorDivDesc.style.display = 'none';
                descripcion.style.border = '2px solid #eeae00';
                return true;
            }
        }

        // Validar Contenido
        function validarContenido() {
            if (contenido.value == '') {
                errorDivCont.style.display = 'block';
                errorDivCont.innerHTML = "este campo es obligatorio";
                contenido.style.border = '2px solid red';
                errorDivCont.style.color = 'red';
                errorDivCont.style.paddingTop = '10px';
                return false;
            } else {
                errorDivCont.style.display = 'none';
                contenido.style.border = '2px solid #eeae00';
                return true;
            }
        }





        //Limpiar formulario de Post
        function limpiarCamposPosteo() {

            titulo.value = '';
            descripcion.value = '';
            contenido.value = '';

            errorDivTit.style.display = 'none';
            titulo.style.border = '2px solid #eeae00';
            errorDivDesc.style.display = 'none';
            descripcion.style.border = '2px solid #eeae00';
            errorDivCont.style.display = 'none';
            contenido.style.border = '2px solid #eeae00';

        }


        ////// AJAX Agregar Post////////
        $('#agregar_post').click(function () {
            // aca debemos validar antes de enviar y marcarle al usuario los errores o campos obligatorios
            if (!validarTitulo()) {
                titulo.focus();
                return;
            }
            if (!validarDescripcion()) {
                    descripcion.focus();
                    return;
            }
            if (!validarContenido()) {
                    contenido.focus();
                    return;
            }
            $.ajax({
                type: 'POST',
                url: 'procesar_agregar_post.php',
                data: $('#postear').serialize(),
                dataType: 'json',
            }).done(function (data) {
                // var resultado = data; // no hace falta por ahora
                if (data.success) {
                    Swal.fire({
                        title: 'Correcto',
                        text: data.msg, //'Tu post ha sido añadido correctamente', // o podemos poner el mensaje que viene de la respuesta
                        type: 'success',
                        confirmButtonColor: '#eeae00',
                        allowOutsideClick: false
                    });

                    // limpiamos los campos!!!
                    limpiarCamposPosteo();
                } else {
                    Swal.fire({
                        title: 'Ups',
                        text: data.msg ? data.msg : 'Hubo un error, no pudo publicar el post!', // esto es un IF corto!!!! el signo de pregunta denotaria el SI, y los dos punto el SINO
                        type: 'warning',
                        confirmButtonColor: '#eeae00',
                        allowOutsideClick: false

                    });
                }
            }).fail(function (data) {
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


    }); // DOM CONTENT LOADED

})();