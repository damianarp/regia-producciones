<?php 

    include_once 'includes/funciones/bd_conexion.php';
    include_once 'includes/funciones/funciones.php';

    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    
	// error_log('entro al contactar.php con' . json_encode($_POST));

	// {"nombre":"Jorge Gast\\u00f3n","apellido":"Arp","correo":"gaston_arp@hotmail.com","mensaje":"test","submit":"Enviar"}

    $destinatario = 'damianarp@gmail.com';
	
	// validamos un poco, pero lo hacemos por el negado
	if (!isset($_POST['submit']) || !$_POST['submit']) {
			// error, no es por submit?
			return responseJSON(array('success' => false, 'msg' => 'Datos inválidos!'));
	}

	// si pasa el control de arriba, seguimos por este
	if (!isset($_POST['nombre']) || !$_POST['nombre'] || strlen(trim($_POST['nombre'])) <= 0) {
		// error, no hay nombre
		return responseJSON(array('success' => false, 'msg' => 'Por favor, complete el nombre!'));
	}

	// si pasa el control de arriba, seguimos por este
	if (!isset($_POST['apellido']) || !$_POST['apellido'] || strlen(trim($_POST['apellido'])) <= 0) {
		// error, no hay apellido
		return responseJSON(array('success' => false, 'msg' => 'Por favor, complete el apellido!'));
	}

	// si pasa el control de arriba, seguimos por este
	if (!isset($_POST['correo']) || !$_POST['correo'] || strlen(trim($_POST['correo'])) <= 0) { // falta validacion de correo
		// error, no hay correo
		return responseJSON(array('success' => false, 'msg' => 'Por favor, ingrese un correo válido!'));
	}

	// si pasa el control de arriba, seguimos por este
	if (!isset($_POST['asunto']) || !$_POST['asunto'] || strlen(trim($_POST['asunto'])) <= 0) {
		// error, no hay asunto
		return responseJSON(array('success' => false, 'msg' => 'Por favor, complete el asunto!'));
	}

	// si pasa el control de arriba, seguimos por este
	if (!isset($_POST['mensaje']) || !$_POST['mensaje'] || strlen(trim($_POST['mensaje'])) <= 0) {
		// error, no hay mensaje
		return responseJSON(array('success' => false, 'msg' => 'Por favor, ingrese un mensaje!'));
	}

	// si paso todos los controles
	$nombre = trim($_POST['nombre']);         // trim elimina los espacios vacios al inicio y al final de lo que se escribe en el input
	$apellido = trim($_POST['apellido']);
	$correo = trim($_POST['correo']);
	$asunto = trim($_POST['asunto']);
	$mensaje = trim($_POST['mensaje']);
	$mensajeCompleto = $mensaje . "\nAtentamente: " . $nombre;
	$remitente = 'Contacto de ' . $nombre . ' ' . $apellido;
	$fecha = date('y-m-d');

	// guardamos en base de datos
	$consulta = "INSERT INTO contacto (nombre_contacto, apellido_contacto, correo_contacto, asunto_contacto, mensaje_contacto, fecha_mensaje) VALUES (:nombre, :apellido, :correo, :asunto, :mensaje, :fecha)";
	$resultado = $conexion->prepare($consulta);
	$resultado->bindParam(':nombre', $nombre, PDO::PARAM_STR, 25);
	$resultado->bindParam(':apellido', $apellido, PDO::PARAM_STR, 25);
	$resultado->bindParam(':correo', $correo, PDO::PARAM_STR, 25);
	$resultado->bindParam(':asunto', $correo, PDO::PARAM_STR, 25);
	$resultado->bindParam(':mensaje', $mensaje, PDO::PARAM_STR, 25);
	$resultado->bindParam(':fecha', $fecha, PDO::PARAM_STR, 25);
	$resultado->execute();

	$id = $conexion->lastInsertId();

	// cerramos la conexion
	$conexion = null;
	
	// como siempre queremos saber si nos contactaron, ya sea por base de datos o por email, separamos las funcionalidades
	// es por eso que no nos importa si falló la guardada en base de datos para mandarnos el email

	// por ahi deberiamos usar la libreria PHPMailer, pero por ahora esto alcanza
	$mail = mail($destinatario, $remitente, $asunto, $mensajeCompleto);

	if (!$mail && $id <= 0) {
		// error, no se pudo ni enviar correo ni guardar en base de datos
		return responseJSON(array('success' => false, 'msg' => 'Lo sentimos, algo falló al intentar enviar el mensaje!'));
	}

	// si llegó hasta acá, es porque funciunó todo bien!!! retornamos el exito!
	return responseJSON(array('success' => true, 'msg' => 'Mensaje enviado exitosamente!'));

?>
