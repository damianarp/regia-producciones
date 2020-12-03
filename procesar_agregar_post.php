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
		if (!isset($_POST['titulo']) || !$_POST['titulo'] || strlen(trim($_POST['titulo'])) <= 0) {
			// error, no hay titulo
			return responseJSON(array('success' => false, 'msg' => 'Por favor, completa el titulo!'));
        }

        // si pasa el control de arriba, seguimos por este
		if (!isset($_POST['descripcion']) || !$_POST['descripcion'] || strlen(trim($_POST['descripcion'])) <= 0) {
			// error, no hay descripcion
			return responseJSON(array('success' => false, 'msg' => 'Por favor, completa la descripcion!'));
        }

        // si pasa el control de arriba, seguimos por este
		if (!isset($_POST['contenido']) || !$_POST['contenido'] || strlen(trim($_POST['contenido'])) <= 0) {
			// error, no hay contenido
			return responseJSON(array('success' => false, 'msg' => 'Por favor, completa el contenido!'));
        }


        // si paso todos los controles
		$titulo = trim($_POST['titulo']);         // trim elimina los espacios vacios al inicio y al final de lo que se escribe en el input
		$descripcion = trim($_POST['descripcion']);
		$categoria = $_POST['categoria'];
        $contenido = trim($_POST['contenido']);
        
        $nombre_imagen = $_FILES["imagen"]["name"];
        $nombre_temporal = $_FILES["imagen"]["tmp_name"];
        $tipo_archivo = $_FILES["imagen"]["type"];
        $tamano_imagen = $_FILES["imagen"]["size"];
        $fecha = date('y-m-d H:i:s');

        $permitidos = array("image/jpeg", "image/jpg", "image/png", "image/gif", "image/tiff", "image/svg+xml", "video/avi", "video/mpeg", "video/mp4", "video/ogg", "video/quicktime", "video/webm");
        $limite_mb = 500000;

        if(in_array($tipo_archivo, $permitidos) && $tamano_imagen <= $limite_mb * 1024) {
            $ruta = "assets/Blog-post" . $nombre_imagen;
            move_uploaded_file($nombre_temporal, $ruta);
        }

        // guardamos en base de datos
        $consulta = "INSERT INTO post (autor_post, fecha_post, categoria_post, titulo_post, imagen_post, descripcion_post, contenido_completo_post, ruta_imagen) VALUES ('Regia Producciones', :fecha_post, :categoria_post, :titulo_post, :imagen_post, :descripcion_post, :contenido_completo_post, :ruta_imagen)";
        $resultado = $conexion->prepare($consulta);
        $resultado->bindParam(':fecha_post', $fecha, PDO::PARAM_STR, 25);
        $resultado->bindParam(':categoria_post', $categoria, PDO::PARAM_STR, 25);
        $resultado->bindParam(':titulo_post', $titulo, PDO::PARAM_STR, 25);
        $resultado->bindParam(':imagen_post', $nombre_imagen, PDO::PARAM_STR, 25);
        $resultado->bindParam(':descripcion_post', $descripcion, PDO::PARAM_STR, 25);
        $resultado->bindParam(':contenido_completo_post', $contenido, PDO::PARAM_STR, 25);
        $resultado->bindParam(':ruta_imagen', $ruta, PDO::PARAM_STR, 25);
        $resultado->execute();

        // cerramos la conexion
        $conexion = null;
        
        if ($resultado->execute()) {
            // retornamos error, no se pudo guardar en base de datos
            return responseJSON(array('success' => false, 'msg' => 'Lo sentimos, algo falló al intentar agregar el post!'));
        }
        // si llegó hasta acá, es porque funciunó todo bien!!! retornamos el exito!
            return responseJSON(array('success' => true, 'msg' => 'El post se agregó exitosamente!'));
    
        
?>