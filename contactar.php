<?php 

    include("bd_conexion.php");

    $destinatario = 'damianarp@gmail.com';

    if(isset($_POST['submit'])): 
        
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $mensaje = $_POST['mensaje'];
            $header = "Enviado desde la web de Regia Producciones";
            $mensajeCompleto = $mensaje . "\nAtentamente: " . $nombre;
            $mail = mail($destinatario, $mensaje, $header);

            try {
                require_once('includes/funciones/bd_conexion.php');
                $stmt = $conn->prepare("INSERT INTO usuario (nombre, apellido, correo, mensaje) VALUES (?,?,?,?)");
                $stmt->bind_param("ssss", $nombre, $apellido, $correo, $mensaje);
                $stmt->execute();
                $ID_registro = $stmt->insert_id;
                $stmt->close();
                $conn->close();
                //header('Location: validar_registro.php?exitoso=1');
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            endif;
            
            echo "<script>alert('Correo enviado exitosamente')</script>";
            echo "<script>setTimeout(\"location.href='index.php'\",1000)</script>";

?>