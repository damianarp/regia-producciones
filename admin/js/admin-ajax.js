$(document).ready(function() {

    // Creación de variables
    var usuarioAdmin = document.querySelector('#exampleInputEmail1');
    var nombreAdmin = document.querySelector('#exampleInputName1');
    var passwordAdmin = document.querySelector('#password');
    var repetirPasswordAdmin = document.querySelector('#repetir_password');
    var correctoAdmin = document.querySelector('#resultado_password');

    // Limpiar formulario
    function limpiarCampos() {
      
      usuarioAdmin.value = '';
      nombreAdmin.value = '';
      passwordAdmin.value = '';
      repetirPasswordAdmin = '';
      correctoAdmin.style.display = 'none';
    }


    // Crear admin
    $('#guardar-registro').on('submit', function(e) {
            e.preventDefault();
            
            var datos = $(this).serializeArray();
            
            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var resultado = data;
                    if(resultado.respuesta == 'exito') {
                      Swal.fire({
                        title: 'Correcto',
                        text: 'El usuario se ha guardado correctamente', // o podemos poner el mensaje que viene de la respuesta
                        type: 'success',
                        confirmButtonColor: '#eeae00',
                        allowOutsideClick: false,
                      });

                      // limpiamos los campos!!!
                      limpiarCampos();

                    } else {
                      Swal.fire({
                        title: 'Ups',
                        text: 'El nombre de usuario ya está registrado, intenta con otro!', // esto es un IF corto!!!! el signo de pregunta denotaria el SI, y los dos punto el SINO
                        type: 'warning',
                        confirmButtonColor: '#eeae00',
                        allowOutsideClick: false,
                      });
                      // limpiamos los campos!!!
                      limpiarCampos();
                    }
                }
            })
    });

    // Eliminar admin
    $('.borrar_registro').on('click', function (e) {
        e.preventDefault();

        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');

        Swal.fire({
            title: 'Estás segur@ de eliminarlo?',
            text: "Esta acción no se puede revertir!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#eeae00',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borralo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if(result.value) {
                $.ajax({
                    type: 'post',
                    data: {
                        'id': id,
                        'registro': 'eliminar'
                    },
                    url: 'modelo-' + tipo + '.php',
                    success: function (data) {
                        var resultado = JSON.parse(data);
                        if (resultado.respuesta == 'exito') {
    
                                Swal.fire(
                                  'Borrado!',
                                  'El administrador ha sido eliminado',
                                  'success'
                                )
                                jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
                        
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                title: 'Ups',
                                text: 'El administrador no pudo eliminarse', // esto es un IF corto!!!! el signo de pregunta denotaria el SI, y los dos punto el SINO
                                type: 'error',
                                confirmButtonColor: '#eeae00',
                                allowOutsideClick: false,
                              });
                        }
                        
                    }
                })
            }
        });
    });
    
});