<?php 

    include_once 'includes/funciones/con_db.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    
    // Recepción de datos enviados mediante POST desde AJAX
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $email = (isset($_POST['email'])) ? $_POST['email'] : '';
    $fechareg = date("d/m/y");

    $consulta = "INSERT INTO suscriptores (nombre, email, fecha_reg) VALUES (:nombre,:email,:fechareg)";
    $resultado = $conexion->prepare($consulta);
    $resultado->bindParam(':nombre', $nombre, PDO::PARAM_STR, 25);
    $resultado->bindParam(':email', $email, PDO::PARAM_STR, 25);
    $resultado->bindParam(':fechareg', $fechareg, PDO::PARAM_STR, 25);
    $resultado->execute();

    $id = $resultado->insert_id;

    if($id > 0){
        
        // COMPLETAR CODIGO
    }else{
        // COMPLETAR CODIGO
    }

    $resultado->close();
    $conexion->close();





    

    // if(isset($_POST['register'])) { 
    //     if(strlen($_POST['name']) >= 1 &&       // Valida que los campos NO esten vacios al hacer submit
    //        strlen($_POST['email']) >= 1) {

    //             $name = trim($_POST['name']);         // trim elimina los espacios vacios al inicio y al final de lo que se escribe en el input
    //             $email = trim($_POST['email']);
    //             $fechareg = date("d/m/y");
    //             try {
    //                 require_once('includes/funciones/con_db.php');
    //                 $stmt = $conn->prepare("INSERT INTO suscriptores (nombre, email, fecha_reg) VALUES (?,?,?)");
    //                 $stmt->bind_param("sss", $name, $email, $fechareg);
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
    //                 echo ("<script>setTimeout(\"location.href='index.php?exitoso=1'\",1000)</script>");
    //             } catch (\Exception $e) {
    //                 echo $e->getMessage();
    //             }
    //             die(json_encode($respuesta));
    //     } else {
    //     }  
    // } 
?> 


