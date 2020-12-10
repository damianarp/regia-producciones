
<?php

include_once 'funciones/funciones.php';
include_once 'funciones/sesiones.php';

/////////////////////// ARTICULOS //////////////////////
//Variables usadas para los ARTICULOS
if (isset($_POST['articulos']) && $_POST['articulos']) {
    $titulo = $_POST['titulo'];
    $descripcion  = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $contenido = $_POST['contenido'];
    $estado = $_POST['estado'];
    $admin_id = $_SESSION['id_admin'];
    $id_registro = $_POST['id_articulo'];
    $fecha = date('y-m-d');
    // Agregar Aarticulo a la BB
    if ($_POST['articulos'] == 'nuevo') {

        // $respuesta = array (
        //     'post' => $_POST,
        //     'file' => $_FILES
        // );
        // die(json_encode($respuesta));
        
        $directorio = "admin/img/articulos/";
        if(!is_dir($directorio)) {
            mkdir($directorio, 0755, true);
        }

        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $_FILES['imagen']['name'])) {
            $imagen_url = $_FILES['imagen']['name'];
            $imagen_resultado = "Se subió correctamente";
        } else {
            $respues = array (
                'respuesta' => error_get_last()
            );
        }

        try {
            $stmt = $conn->prepare("INSERT INTO articulos (titulo_art, descripcion_art, contenido_art, img_art, categoria_id, admin_id, fecha_creacion, estado_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssiisi", $titulo, $descripcion, $contenido, $imagen_url, $categoria, $admin_id, $fecha, $estado);
            $stmt->execute();
            $id_registro = $stmt->insert_id;
            
            if($id_registro > 0) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_admin' => $id_registro,
                    'resultado_imagen' => $imagen_resultado
                );
                
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
           
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        
        die(json_encode($respuesta));
    }
}

/////////////////////// CATEGORIAS //////////////////////
//Variables usadas para las CATEGORIAS
if (isset($_POST['categorias']) && $_POST['categorias']) {
    $nombre_categoria = $_POST['nombre_categoria'];
    $id_registro = $_POST['id_categoria'];
    
    // Agregar Categoría a la BD
    if ($_POST['categorias'] == 'nuevo') {
    
        try {
            $stmt = $conn->prepare("INSERT INTO categorias (nombre_cat) VALUES (?)");
            $stmt->bind_param("s", $nombre_categoria);
            $stmt->execute();
            $id_registro = $stmt->insert_id;
            
            if($id_registro > 0) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_admin' => $id_registro
                );
                
            } else {
                    $respuesta = array(
                        'respuesta' => 'error'
                    );
            }
           
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        
        die(json_encode($respuesta));
    }
    
    // Actualizar Categoria en la BD
    if ($_POST['categorias'] == 'actualizar') {
    
        try {
             
            $stmt = $conn->prepare('UPDATE categorias SET nombre_cat = ?, estado_cat = NOW() WHERE id_categoria = ? ');
            $stmt->bind_param("si", $nombre_categoria, $id_registro);
            $stmt->execute();
    
            if ($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_actualizado' => $stmt->insert_id
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
            $stmt->close();
            $conn->close();  
        } catch (Exception $e){
            $respuesta = array(
                'respuesta' => $e->getMessage()
            );
        }
        die(json_encode($respuesta));
    }
    
    // Eliminar Categoria de la BD
    if($_POST['categorias'] == 'eliminar'){
        $id_borrar = $_POST['id'];
    
        try {
            $stmt = $conn->prepare('DELETE FROM categorias WHERE id_categoria = ? ');
            $stmt->bind_param('i', $id_borrar);
            $stmt->execute();
            if($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_eliminado' => $id_borrar
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
        } catch (Exception $e) {
            $respuesta = array(
                'respuesta' => $e->getMessage()
            );
        }
        die(json_encode($respuesta)); 
    }
}