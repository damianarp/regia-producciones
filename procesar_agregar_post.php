<?php

    include_once 'includes/funciones/bd_conexion.php';
    include_once 'includes/funciones/funciones.php';

    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

        // si paso todos los controles
		$titulo = trim($_POST['titulo']);         // trim elimina los espacios vacios al inicio y al final de lo que se escribe en el input
		$descripcion = trim($_POST['descripcion']);
		$categoria = trim($_POST['categoria']);
        $contenido = trim($_POST['contenido']);
        
        $nombre_imagen = $_FILES["imagen"]["name"];
        $nombre_temporal = $_FILES["imagen"]["tmp_name"];
        $tipo_archivo = $_FILES["imagen"]["type"];

        $destino = "assets/Blog-post" . $nombre_imagen;

        // // Valida si la imagen tiene formato
        // if ($tipo_archivo == "image/jpeg" || $tipo_archivo == "image/jpg" || $tipo_archivo == "image/png" || $tipo_archivo == "image/gif") {
        //     move_uploaded_file($nombre_temporal, $destino);
        //     return responseJSON(array('success' => true, 'msg' => 'La imagen se ha subido con exito!'));
        // } else {
        //     return responseJSON(array('success' => false, 'msg' => 'El archivo subido no es una imagen!'));
        // }

        // guardamos en base de datos
        $consulta = "INSERT INTO post (autor_post, categoria_post, titulo_post, imagen_post, descripcion_post, contenido_completo_post) VALUES ('Regia Producciones', :categoria_post, :titulo_post, :imagen_post, :descripcion_post, :contenido_completo_post)";
        $resultado = $conexion->prepare($consulta);
        $resultado->bindParam(':categoria_post', $categoria, PDO::PARAM_STR, 25);
        $resultado->bindParam(':titulo_post', $titulo, PDO::PARAM_STR, 25);
        $resultado->bindParam(':imagen_post', $nombre_imagen, PDO::PARAM_STR, 25);
        $resultado->bindParam(':descripcion_post', $descripcion, PDO::PARAM_STR, 25);
        $resultado->bindParam(':contenido_completo_post', $contenido, PDO::PARAM_STR, 25);
        $resultado->execute();

        $id = $conexion->lastInsertId();

        // cerramos la conexion
        $conexion = null;
        
        if ($id <= 0) {
            // retornamos error, no se pudo guardar en base de datos
            return responseJSON(array('success' => false, 'msg' => 'Lo sentimos, algo falló al intentar agregar el post!'));
        }
        // si llegó hasta acá, es porque funciunó todo bien!!! retornamos el exito!
            return responseJSON(array('success' => true, 'msg' => 'El post se agregó exitosamente!'));
    
        
?>