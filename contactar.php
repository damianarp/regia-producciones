<?php 

    include_once 'includes/funciones/bd_conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    

    // $destinatario = 'damianarp@gmail.com';

    // if(isset($_POST['submit'])) { 
    //     if(strlen($_POST['nombre']) >= 1 &&       // Valida que los campos NO esten vacios al hacer submit
    //        strlen($_POST['apellido']) >= 1 && 
    //        strlen($_POST['correo']) >= 1 &&
    //        strlen($_POST['mensaje']) >= 1) {

    //             $nombre = trim($_POST['nombre']);         // trim elimina los espacios vacios al inicio y al final de lo que se escribe en el input
    //             $apellido = trim($_POST['apellido']);
    //             $correo = trim($_POST['correo']);
    //             $mensaje = trim($_POST['mensaje']);
    //             $mensajeCompleto = $mensaje . "\nAtentamente: " . $nombre;
    //             $mail = mail($destinatario, $mensaje, $header);

    //             try {
    //                 require_once('includes/funciones/bd_conexion.php');
    //                 $stmt = $conn->prepare("INSERT INTO usuario (nombre, apellido, correo, mensaje) VALUES (?,?,?,?)");
    //                 $stmt->bind_param("ssss", $nombre, $apellido, $correo, $mensaje);
    //                 $stmt->execute();
    //                 $id = $stmt->insert_id;
    //                 if($id > 0){
    //                     $respuesta = array(
    //                         'respuesta' => 'exito',
    //                         'id' => $id
    //                     );
                        
    //                 }else{
    //                     $respuesta = array(
    //                         'respuesta' => 'error' 
    //                     );
                        
    //                 }
    //                 $stmt->close();
    //                 $conn->close();

    //                 echo ("<script>setTimeout(\"location.href='contacto.php?exitoso=1'\",1000)</script>");
    //             } catch (\Exception $e) {
    //                 echo $e->getMessage();
    //             }
    //             die(json_encode($respuesta));
    //        } else {
    //        }

            
    //     }
?>
