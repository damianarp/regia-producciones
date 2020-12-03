$(document).ready(function() {
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
                        swal(
                          'Correcto',
                          'Se guardó correctamente',
                          'success'
                        )
                    } else {
                        swal(
                          'Error!',
                          'Hubo un error',
                          'error'
                        )
                    }
                }
            })
    });
    // Se ejecuta cuando hay un archivo
    
    
    $('#guardar-registro-archivo').on('submit', function(e) {
            e.preventDefault();
            
            var datos = new FormData(this);
            
            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                contentType: false,
                processData : false,
                async: true,
                cache: false,
                success: function(data) {
                    console.log(data);
                    var resultado = data;
                    if(resultado.respuesta == 'exito') {
                        swal(
                          'Correcto',
                          'Se guardó correctamente',
                          'success'
                        )
                    } else {
                        swal(
                          'Error!',
                          'Hubo un error',
                          'error'
                        )
                    }
                }
            })
    });
    
    
    
    // Eliminar un registro
    
    /* ELIMINAR */
  $('.borrar_registro').on('click', function (e) {
    e.preventDefault(); 
 
    var id = $(this).attr('data-id');
    var tipo = $(this).attr('data-tipo');
 
 
    swal({
      title: 'Está seguro de eliminarlo?',
      text: "La acción será irreversible",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Eliminar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
 
      $.ajax({
 
        type: 'POST',
        data: {
          'id': id,
          'registro': 'eliminar'
        },
        url: 'modelo' + tipo + '.php',
 
        success: function (data) {
          console.log(data);
          var resultado = JSON.parse(data);
          /* console.log(respuesta); */
          jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
 
 
        }
      })
 
        swal({
          title: 'Eliminado!',
          text: 'El elemento ha sido eliminado.',
          confirmButtonText: 'Entendido',
          type: 'success'
        })
      }
    })
 
 
  });
    
    
});
