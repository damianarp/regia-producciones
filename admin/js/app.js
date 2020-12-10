$(document).ready(function () {

    // Funciones de los formularios de creación y edición de ADMINISTRADORES
    $('#crear-registro').attr('disabled', true);
    $('#modificar_admin').attr('disabled', true);

    $('#repetir_password').on('input', function() {
        var password_nuevo = $('#password').val();

        if($(this).val() == password_nuevo) {
            $('#resultado_password').text('Correcto');
            $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('#crear-registro').attr('disabled', false);
            $('#modificar_admin').attr('disabled', false);
        } else {
            $('#resultado_password').text('No son iguales');
            $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
            $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        }
    });

    //////////////////////////////////////////////////////////////////////////////////////////////////////
    // Funciones de los formularios de creación y edición de SUSCRIPTORES
    var nomSusc, correoSusc, errorNomSuscNuevo, errorCorreoSuscNuevo, errorNomSuscEditado, errorCorreoSuscEditado, expresion;
    nomSusc = document.querySelector('#exampleInputName2');
    correoSusc = document.querySelector('#exampleInputEmail2');
    errorNomSuscNuevo = document.querySelector('#error_9');
    errorCorreoSuscNuevo = document.querySelector('#error_10');
    errorNomSuscEditado = document.querySelector('#error_11');
    errorCorreoSuscEditado = document.querySelector('#error_12');
    expresion = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;

    // Creacion de Suscriptores
    // Funciones de los formularios de creación y edición de SUSCRIPTORES
    $('#crear-suscripcion').attr('disabled', true);
    $('#modificar_suscripcion').attr('disabled', true);

    // Validar Nombre (estilos)
    if (nomSusc) {
        nomSusc.addEventListener('blur', validarNombreSusc);
        nomSusc.addEventListener('keyup', validarNombreSusc);
    }
    function validarNombreSusc() {
        if (nomSusc.value == '') {
            errorNomSuscNuevo.style.display = 'block';
            errorNomSuscNuevo.innerHTML = "este campo es obligatorio";
            nomSusc.style.border = '2px solid red';
            errorNomSuscNuevo.style.color = 'red';
            errorNomSuscNuevo.style.paddingTop = '10px';
            return false;
        } else {
            errorNomSuscNuevo.style.display = 'none';
            nomSusc.style.border = '2px solid #eeae00';
            return true;
        }
    }

    // Validar Expresion del correo ///////////
    if (correoSusc) {
        correoSusc.addEventListener('blur', validarExpresionCor);
        correoSusc.addEventListener('keyup', validarExpresionCor);
    }

    // Validar Correo (estilos)
    function validarExpresionCor() {
        if (expresion.test(correoSusc.value) == true) {
            errorCorreoSuscNuevo.style.display = 'none';
            correoSusc.style.border = '2px solid #eeae00';
            return true;
        } else {
            errorCorreoSuscNuevo.style.display = 'block';
            errorCorreoSuscNuevo.innerHTML = "escribe un correo válido";
            correoSusc.style.border = '2px solid red';
            errorCorreoSuscNuevo.style.color = 'red';
            errorCorreoSuscNuevo.style.paddingTop = '10px';
            return false;
        }
    }

    $('#exampleInputName2, #exampleInputEmail2').on('input', function() {
        var nombreSuscriptor = $('#exampleInputName2').val();
        var correoSuscriptor = $('#exampleInputEmail2').val();
        const correoValido = validarExpresionCor();

        if(nombreSuscriptor == '' || correoSuscriptor == '' || !correoValido) {
            $('#guardar-suscripcion').attr('disabled', true);
        } else {
            $('#guardar-suscripcion').attr('disabled', false);
        }
    });


    /////////////////////////////////////////
    // Edicion de Suscriptores
    // Validar Nombre (estilos)
    // if (nomSusc) {
    //     nomSusc.addEventListener('blur', validarNombreSuscEditado);
    //     nomSusc.addEventListener('keyup', validarNombreSuscEditado);
    // }
    // function validarNombreSuscEditado() {
    //     if (nomSusc.value == '') {
    //         errorNomSuscEditado.style.display = 'block';
    //         errorNomSuscEditado.innerHTML = "este campo es obligatorio";
    //         nomSusc.style.border = '2px solid red';
    //         errorNomSuscEditado.style.color = 'red';
    //         errorNomSuscEditado.style.paddingTop = '10px';
    //         return false;
    //     } else {
    //         errorNomSuscEditado.style.display = 'none';
    //         nomSusc.style.border = '2px solid #eeae00';
    //         return true;
    //     }
    // }

    // // Validar Expresion del correo ///////////
    // if (correoSusc) {
    //     correoSusc.addEventListener('blur', validarExpresionCorEditado);
    //     correoSusc.addEventListener('keyup', validarExpresionCorEditado);
    // }

    // // Validar Correo (estilos)
    // function validarExpresionCorEditado() {
    //     if (expresion.test(correoSusc.value) == true) {
    //         errorCorreoSuscEditado.style.display = 'none';
    //         correoSusc.style.border = '2px solid #eeae00';
    //         return true;
    //     } else {
    //         errorCorreoSuscEditado.style.display = 'block';
    //         errorCorreoSuscEditado.innerHTML = "escribe un correo válido";
    //         correoSusc.style.border = '2px solid red';
    //         errorCorreoSuscEditado.style.color = 'red';
    //         errorCorreoSuscEditado.style.paddingTop = '10px';
    //         return false;
    //     }
    // }


    //////////////////////////////////////////////////////////////////////////////////////////////////////
    // Funciones de los formularios de creación y edición de SUSCRIPTORES
    var nomCat, errorCat;

    nomCat = document.querySelector('#nombre_categoria');
    errorCat = document.querySelector('#error_14');

    // Creacion de Categoria
    // Validar Categoria (estilos)
    if (nomCat) {
        nomCat.addEventListener('blur', validarNombreCat);
        nomCat.addEventListener('keyup', validarNombreCat);
    }
    function validarNombreCat() {
        if (nomCat.value == '') {
            errorCat.style.display = 'block';
            errorCat.innerHTML = "este campo es obligatorio";
            nomCat.style.border = '2px solid red';
            errorCat.style.color = 'red';
            errorCat.style.paddingTop = '10px';
            return false;
        } else {
            errorCat.style.display = 'none';
            nomCat.style.border = '2px solid #eeae00';
            return true;
        }
    }


    // Paginación de AdminLTE --> Marca error en consola y no funciona
    // $('.sidebar-menu').tree();

    $('#registros').DataTable({
        'paging'      : true,
        'pageLength'  : 10,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : false,
        'language'        : {
            paginate: {
                next: 'Siguiente',
                previous: 'Anterior',
                last: 'Ùltimo',
                first: 'Primero'
            },
            info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
            emptyTable: 'No hay registros',
            infoEmpty: '0 Registros',
            search: 'Buscar: '
        }
    });

    
});

  
  