$(document).ready(function() {

    //Limpiar formulario
    function limpiarCampos() {
      let usuario = document.querySelector('#exampleInputEmail1');
      let nombre = document.querySelector('#exampleInputName1');
      let password = document.querySelector('#password');
      let repetirPassword = document.querySelector('#repetir_password');
      let correcto = document.querySelector('#resultado_password');



      usuario.value = '';
      nombre.value = '';
      password.value = '';
      repetirPassword = '';
      correcto.style.display = 'none';
    }


    // Crear admin
    $('#crear-admin').on('submit', function(e) {
            e.preventDefault();
            
            var datos = $(this).serializeArray();
            
            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                success: function(data) {
                    var resultado = data;
                    if(resultado.respuesta == 'exito') {
                      Swal.fire({
                        title: 'Correcto',
                        text: 'El usuario se ha añadido correctamente', // o podemos poner el mensaje que viene de la respuesta
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

    $('#login-admin').on('submit', function(e) {
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
                if(resultado.respuesta == 'exitoso') {
                  Swal.fire({
                    title: 'Login Correcto',
                    text: 'Bienvenid@ '+resultado.usuario+'!!', // o podemos poner el mensaje que viene de la respuesta
                    type: 'success',
                    confirmButtonColor: '#eeae00',
                    allowOutsideClick: false,
                  });
                } else {
                  Swal.fire({
                    title: 'Ups',
                    text: 'Usuario y/o contraseña incorrectos!', // esto es un IF corto!!!! el signo de pregunta denotaria el SI, y los dos punto el SINO
                    type: 'error',
                    confirmButtonColor: '#eeae00',
                    allowOutsideClick: false,
                  });
                }
              }
          })
    });


    // Se ejecuta cuando hay un archivo

    // $('#guardar-registro-archivo').on('submit', function(e) {
    //         e.preventDefault();
            
    //         var datos = new FormData(this);
            
    //         $.ajax({
    //             type: $(this).attr('method'),
    //             data: datos,
    //             url: $(this).attr('action'),
    //             dataType: 'json',
    //             contentType: false,
    //             processData : false,
    //             async: true,
    //             cache: false,
    //             success: function(data) {
    //                 console.log(data);
    //                 var resultado = data;
    //                 if(resultado.respuesta == 'exito') {
    //                     swal(
    //                       'Correcto',
    //                       'Se guardó correctamente',
    //                       'success'
    //                     )
    //                 } else {
    //                     swal(
    //                       'Error!',
    //                       'Hubo un error',
    //                       'error'
    //                     )
    //                 }
    //             }
    //         })
    // });
    
    
    
    // Eliminar un registro
    
    /* ELIMINAR */
  // $('.borrar_registro').on('click', function (e) {
  //   e.preventDefault(); 
 
  //   var id = $(this).attr('data-id');
  //   var tipo = $(this).attr('data-tipo');
 
 
  //   swal({
  //     title: 'Está seguro de eliminarlo?',
  //     text: "La acción será irreversible",
  //     icon: 'warning',
  //     showCancelButton: true,
  //     confirmButtonColor: '#3085d6',
  //     cancelButtonColor: '#d33',
  //     confirmButtonText: 'Eliminar',
  //     cancelButtonText: 'Cancelar'
  //   }).then((result) => {
  //     if (result.value) {
 
  //     $.ajax({
 
  //       type: 'POST',
  //       data: {
  //         'id': id,
  //         'registro': 'eliminar'
  //       },
  //       url: 'modelo' + tipo + '.php',
 
  //       success: function (data) {
  //         console.log(data);
  //         var resultado = JSON.parse(data);


          /* console.log(respuesta); **************************************************/


          // jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
 
 
  //       }
  //     })
 
  //       swal({
  //         title: 'Eliminado!',
  //         text: 'El elemento ha sido eliminado.',
  //         confirmButtonText: 'Entendido',
  //         type: 'success'
  //       })
  //     }
  //   })
 
 
  // });
    
    
});
