
<?php

include_once 'funciones/funciones.php';
/////////////////////// ADMINISTRADORES //////////////////////
//Variables usadas para los ADMINISTRADORES
$usuario = $_POST['usuario'];
$nombre  = $_POST['nombre'];
$password = $_POST['password'];
$nivel = $_POST['nivel'];
$id_registro = $_POST['id_registro'];

// Agregar Admin a la BB
if ($_POST['registro'] == 'nuevo') {

        $opciones = array(
            'cost' => 12
        );
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
    
        try {
            $stmt = $conn->prepare("INSERT INTO admins (usuario, nombre, password, nivel_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssi", $usuario, $nombre, $password_hashed, $nivel);
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
            $stmt = $conn->prepare("UPDATE admins SET usuario = ?, nombre = ?, nivel_id = ?, editado = NOW() WHERE id_admin = ? ");
            $stmt->bind_param("ssii", $usuario, $nombre, $nivel, $id_registro);
        } else {
            $opciones = array(
                'cost' => 12
            );
    
            $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
            $stmt = $conn->prepare('UPDATE admins SET usuario = ?, nombre = ?, password = ?, nivel_id = ?, editado = NOW() WHERE id_admin = ? ');
            $stmt->bind_param("sssii", $usuario, $nombre, $hash_password, $nivel, $id_registro);
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
$fecha = $_POST['fecha_susc'];
$id_registro = $_POST['id_susc'];

// Agregar Suscriptor a la BB
if ($_POST['suscripcion'] == 'nuevo') {

        $opciones = array(
            'cost' => 12
        );
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
    
        try {
            $stmt = $conn->prepare("INSERT INTO suscriptores (nombre_susc, email_susc, fecha_susc) VALUES (?, ?, ?)");
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
        $stmt = $conn->prepare('UPDATE suscriptores SET nombre_susc = ?, email_susc = ?, editado_susc = NOW() WHERE id_susc = ? ');
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

// Eliminar Suscriptor de la BD
if($_POST['suscripcion'] == 'eliminar'){
    $id_borrar = $_POST['id'];

    try {
        $stmt = $conn->prepare('DELETE FROM suscriptores WHERE id_susc = ? ');
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

