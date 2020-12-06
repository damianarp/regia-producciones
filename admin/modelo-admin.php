
<?php

include_once 'funciones/funciones.php';
/////////////////////// ADMINISTRADORES //////////////////////
//Variables usadas para los ADMINISTRADORES
$usuario = $_POST['usuario'];
$nombre  = $_POST['nombre'];
$password = $_POST['password'];
$id_registro = $_POST['id_registro'];

// Agregar Admin a la BB
if ($_POST['registro'] == 'nuevo') {

        $opciones = array(
            'cost' => 12
        );
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
    
        try {
            $stmt = $conn->prepare("INSERT INTO admins (usuario, nombre, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $usuario, $nombre, $password_hashed);
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

// Actualizar Admin en la BD
if ($_POST['registro'] == 'actualizar') {

    try {
        if(empty($_POST['password']) ) {
            $stmt = $conn->prepare("UPDATE admins SET usuario = ?, nombre = ?, editado = NOW() WHERE id_admin = ? ");
            $stmt->bind_param("ssi", $usuario, $nombre, $id_registro);
        } else {
            $opciones = array(
                'cost' => 12
            );
    
            $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
            $stmt = $conn->prepare('UPDATE admins SET usuario = ?, nombre = ?, password = ?, editado = NOW() WHERE id_admin = ? ');
            $stmt->bind_param("sssi", $usuario, $nombre, $hash_password, $id_registro);
        }
        
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

// Eliminar Admin de la BD
if($_POST['registro'] == 'eliminar'){
    $id_borrar = $_POST['id'];

    try {
        $stmt = $conn->prepare('DELETE FROM admins WHERE id_admin = ? ');
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

/////////////////////// SUSCRIPTORES //////////////////////
//Variables usadas para los SUSCRIPTORES
$nombre  = $_POST['nombre'];
$correo = $_POST['email'];
$fecha = $_POST['fecha_reg'];
$id_registro = $_POST['id_susc'];

// Agregar Suscriptor a la BB
if ($_POST['suscripcion'] == 'nuevo') {

        $opciones = array(
            'cost' => 12
        );
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
    
        try {
            $stmt = $conn->prepare("INSERT INTO suscriptores (nombre, email, fecha_reg) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nombre, $correo, $fecha);
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

// Actualizar Suscriptor en la BD
if ($_POST['suscripcion'] == 'actualizar') {

    try {
        $stmt = $conn->prepare('UPDATE suscriptores SET nombre = ?, email = ?, susc_editado = NOW() WHERE id = ? ');
        $stmt->bind_param("ssi", $nombre, $correo, $id_registro);
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

// Eliminar Admin de la BD
if($_POST['suscripcion'] == 'eliminar'){
    $id_borrar = $_POST['id'];

    try {
        $stmt = $conn->prepare('DELETE FROM suscriptores WHERE id = ? ');
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

