
<?php

include_once 'funciones/funciones.php';
/////////////////////// ARTICULOS //////////////////////
//Variables usadas para los ARTICULOS
$titulo = $_POST['titulo'];
$descripcion  = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$contenido = $_POST['contenido'];
$estado = $_POST['estado'];
$admin_id = $_SESSION['id_admin'];
$id_registro = $_POST['id_registro'];
$fecha = date('y-m-d');
// Agregar Aarticulo a la BB
if ($_POST['estado'] == '3') {

        // $respuesta = array (
        //     'post' => $_POST,
        //     'file' => $_FILES
        // );
        // die(json_encode($respuesta));
        
        $directorio = "../img/admins/";
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
            // $sql = "SELECT id_admin, admin_id FROM admins, articulos WHERE admins.id_admin = articulos.admin_id";
            // $resultado = $conn->query($sql);
            // $admin_id = $resultado->fetch_assoc();
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
