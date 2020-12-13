$(document).ready(function () {

    // Loguear admin
    $('#login-admin').on('submit', function (e) {
        e.preventDefault();

        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var resultado = data;
                if (resultado.respuesta == 'exitoso') {
                    Swal.fire({
                        title: 'Login Correcto',
                        text: 'Bienvenid@ ' + resultado.usuario + '!!', // o podemos poner el mensaje que viene de la respuesta
                        type: 'success',
                        confirmButtonColor: '#eeae00',
                        allowOutsideClick: false,
                    });
                    setTimeout(function () {
                        window.location.href = 'area-admin.php';
                    }, 2000);
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

});