<?php 

    include_once 'includes/funciones/bd_conexion.php';
    include_once 'includes/funciones/funciones.php';

    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    // validamos un poco, pero lo hacemos por el negado
    if (!isset($_POST['submit']) || !$_POST['submit']) {
        // error, no es por submit?
        return responseJSON(array('success' => false, 'msg' => 'Datos inválidos!'));
    }

    // si pasa el control de arriba, seguimos por este
    if (!isset($_POST['name']) || !$_POST['name'] || strlen(trim($_POST['name'])) <= 0) {
        // error, no hay nombre
        return responseJSON(array('success' => false, 'msg' => 'Por favor, complete el nombre!'));
    }
    
    // si pasa el control de arriba, seguimos por este
    if (!isset($_POST['mail']) || !$_POST['mail'] || strlen(trim($_POST['mail'])) <= 0) { // falta validacion de correo
        // error, no hay correo
        return responseJSON(array('success' => false, 'msg' => 'Por favor, ingrese un correo válido!'));
    }
    
    // si paso todos los controles
    $nombre = trim($_POST['name']);         // trim elimina los espacios vacios al inicio y al final de lo que se escribe en el input
    $correo = trim($_POST['mail']);
    $fecha = date('y-m-d H:i:s');

    // validamos que el correo no se encuentre ya en la base de datos
    $resultado = $conexion->prepare("SELECT email FROM suscriptores WHERE email like :email");
    $parametros = array('email' => $correo);
    $resultado->execute($parametros);
    $user = $resultado->fetch();

    if ($user && $user['email']) {
        return responseJSON(array('success' => false, 'msg' => 'Este mail ya se encuentra registrado! Intenta con otro!'));
    }

    // guardamos en base de datos
    $consulta = "INSERT INTO suscriptores (nombre, email, fecha_reg) VALUES (:nombre, :email, :fechareg)";
    $resultado = $conexion->prepare($consulta);
    $resultado->bindParam(':nombre', $nombre, PDO::PARAM_STR, 25);
    $resultado->bindParam(':email', $correo, PDO::PARAM_STR, 25);
    $resultado->bindParam(':fechareg', $fecha, PDO::PARAM_STR, 25);
    $resultado->execute();

    $id = $conexion->lastInsertId();

    // cerramos la conexion
    $conexion = null;
     
    if ($id <= 0) {
        // retornamos error, no se pudo guardar en base de datos
        return responseJSON(array('success' => false, 'msg' => 'Lo sentimos, algo falló al intentar realizar la suscripción!'));
    }
    
    // si llegó hasta acá, es porque funciunó todo bien!!! retornamos el exito!
		return responseJSON(array('success' => true, 'msg' => 'Suscripción realizada exitosamente!'));

?> 


