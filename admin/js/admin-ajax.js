$(document).ready(function() {
    /////////////////////// ADMINISTRADORES //////////////////////
    // Creación de variables para ADMINISTRADORES
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
            
            var datos = new FormData(this);
            
            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                contentType: false,
                processData: false,
                async: true,
                cache: false,
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
            type: 'warning',
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
    
                                Swal.fire({
                                  title: 'Borrado!',
                                  text: 'El administrador ha sido eliminado',
                                  type: 'success'
                                });
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
    
    /////////////////////// SUSCRIPTORES //////////////////////
    // Creación de variables para SUSCRIPTORES
    var nombreSus = document.querySelector('#exampleInputName2');
    var correoSus = document.querySelector('#exampleInputEmail2');
  
    // Limpiar formulario
    function limpiarCamposSus() {
      
      nombreSus.value = '';
      correoSus.value = '';
      correctoAdmin.style.display = 'none';
    }

    // Crear Suscriptor
    $('#guardar-suscriptor').on('submit', function(e) {
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
                  text: 'El suscriptor se ha guardado correctamente', // o podemos poner el mensaje que viene de la respuesta
                  type: 'success',
                  confirmButtonColor: '#eeae00',
                  allowOutsideClick: false,
                });

                // limpiamos los campos!!!
                limpiarCamposSus();

              } else {
                Swal.fire({
                  title: 'Ups',
                  text: 'El suscriptor ya está registrado, intenta con otro!', // esto es un IF corto!!!! el signo de pregunta denotaria el SI, y los dos punto el SINO
                  type: 'warning',
                  confirmButtonColor: '#eeae00',
                  allowOutsideClick: false,
                });
                // limpiamos los campos!!!
                limpiarCamposSus();
              }
          }
      })
});

    // Eliminar Suscriptor
    $('.borrar_suscriptor').on('click', function (e) {
      e.preventDefault();

      var id = $(this).attr('data-id');
      var tipo = $(this).attr('data-tipo');

      Swal.fire({
          title: 'Estás segur@ de eliminarlo?',
          text: "Esta acción no se puede revertir!",
          type: 'warning',
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
                      'suscripcion': 'eliminar'
                  },
                  url: 'modelo-' + tipo + '.php',
                  success: function (data) {
                    
                      var resultado = JSON.parse(data);
                      if (resultado.respuesta == 'exito') {
  
                              Swal.fire({
                                title: 'Borrado!',
                                text: 'El suscriptor ha sido eliminado',
                                type: 'success'
                              });
                              jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
                      
                      } else if (result.dismiss === 'cancel') {
                          Swal.fire({
                              title: 'Ups',
                              text: 'El suscriptor no pudo eliminarse', // esto es un IF corto!!!! el signo de pregunta denotaria el SI, y los dos punto el SINO
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
  
    
    /////////////////////// ARTICULOS //////////////////////
    // Crear articulo
    $('#articulo').on('submit', function(e) {
      e.preventDefault();
      
      var datos = new FormData(this);
      
      $.ajax({
          type: $(this).attr('method'),
          data: datos,
          url: $(this).attr('action'),
          dataType: 'json',
          contentType: false,
          processData: false,
          async: true,
          cache: false,
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
              } else {
                Swal.fire({
                  title: 'Ups',
                  text: 'El nombre de usuario ya está registrado, intenta con otro!', // esto es un IF corto!!!! el signo de pregunta denotaria el SI, y los dos punto el SINO
                  type: 'warning',
                  confirmButtonColor: '#eeae00',
                  allowOutsideClick: false,
                });
              }
          }
      })
    });

    /////////////////////// CATEGORIAS //////////////////////
    // Creación de variables para CATEGORIAS
    var nombreCategoria = document.querySelector('#nombre_categoria');

    // Limpiar formulario
    function limpiarCamposCategoria() {
      
      nombreCategoria.value = '';
    }


    // Crear categoria
    $('#guardar-categoria').on('submit', function(e) {
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
                        text: 'La categoría se ha guardado correctamente', // o podemos poner el mensaje que viene de la respuesta
                        type: 'success',
                        confirmButtonColor: '#eeae00',
                        allowOutsideClick: false,
                      });

                      // limpiamos los campos!!!
                      limpiarCamposCategoria();

                    } else {
                      Swal.fire({
                        title: 'Ups',
                        text: 'La categoría no pudo guardarse, intenta con otra!', // esto es un IF corto!!!! el signo de pregunta denotaria el SI, y los dos punto el SINO
                        type: 'warning',
                        confirmButtonColor: '#eeae00',
                        allowOutsideClick: false,
                      });
                      // limpiamos los campos!!!
                      limpiarCamposCategoria();
                    }
                }
            })
    });



    // Eliminar Categoria
    $('.borrar_categoria').on('click', function (e) {
        e.preventDefault();

        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');

        Swal.fire({
            title: 'Estás segur@ de eliminarla?',
            text: "Esta acción no se puede revertir!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#eeae00',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrala!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if(result.value) {
                $.ajax({
                    type: 'post',
                    data: {
                        'id': id,
                        'categorias': 'eliminar'
                    },
                    url: 'modelo-' + tipo + '.php',
                    success: function (data) {
                        var resultado = JSON.parse(data);
                        if (resultado.respuesta == 'exito') {
    
                                Swal.fire({
                                  title: 'Borrada!',
                                  text: 'La categoría ha sido eliminada',
                                  type: 'success'
                                });
                                jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
                        
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                title: 'Ups',
                                text: 'La categoría no pudo eliminarse', // esto es un IF corto!!!! el signo de pregunta denotaria el SI, y los dos punto el SINO
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

    //////////////// PREVIEW DE IMAGEN /////////////////
    document.getElementById("imagen").onchange = function(e) {
      // Creamos el objeto de la clase FileReader
      let reader = new FileReader();
    
      // Leemos el archivo subido y se lo pasamos a nuestro fileReader
      reader.readAsDataURL(e.target.files[0]);
    
      // Le decimos que cuando este listo ejecute el código interno
      reader.onload = function(){
        let preview = document.getElementById('preview'),
                image = document.createElement('img');
    
        image.src = reader.result;
        
        preview.innerHTML = '';
        preview.append(image);
        image.style.width = "300px";
        const formGroup = document.getElementsByClassName('form-group');
        if (formGroup && formGroup.length > 0) {
          formGroup[0].style.display = 'block';
        }
      };
    } 
    




});
