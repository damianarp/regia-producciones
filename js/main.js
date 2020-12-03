//Limpiar formulario
function limpiarCamposPosteo() {
    const titulo = document.querySelector('#titulo');
    const descripcion = document.querySelector('#descripcion');
    const contenido = document.querySelector('#contenido');

    titulo.value = '';
    descripcion.value = '';
    contenido.value = '';
    
}


////// AJAX suscripción////////
$('#agregar_post').click(function() { 
    
    $.ajax({
            type: 'POST',
            url: 'procesar_agregar_post.php',
            data: $('#postear').serialize(),
            dataType: 'json',
    }).done(function(data) {
            // var resultado = data; // no hace falta por ahora
            if(data.success){
                    Swal.fire({
                            title: 'Correcto',
                            text: data.msg, //'Tu post ha sido añadido correctamente', // o podemos poner el mensaje que viene de la respuesta
                            type: 'success',
                            confirmButtonColor: '#eeae00',
                            allowOutsideClick: false
                    });

                    // limpiamos los campos!!!
                    limpiarCamposPosteo();
            }else{
                    Swal.fire({
                            title: 'Ups',
                            text: data.msg ? data.msg : 'Hubo un error, no pudo publicar el post!', // esto es un IF corto!!!! el signo de pregunta denotaria el SI, y los dos punto el SINO
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
