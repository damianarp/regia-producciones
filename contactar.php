<?php 

    include("bd_conexion.php");

    $destinatario = 'damianarp@gmail.com';

    if(isset($_POST['submit'])): 

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $mensaje = $_POST['mensaje'];
            $mensajeCompleto = $mensaje . "\nAtentamente: " . $nombre;
            $mail = mail($destinatario, $mensaje, $header);

            try {
                require_once('includes/funciones/bd_conexion.php');
                $stmt = $conn->prepare("INSERT INTO usuario (nombre, apellido, correo, mensaje) VALUES (?,?,?,?)");
                $stmt->bind_param("ssss", $nombre, $apellido, $correo, $mensaje);
                $stmt->execute();
                $stmt->close();
                $conn->close();

                echo ("<script>setTimeout(\"location.href='contacto.php?exitoso=1'\",1000)</script>");
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            endif; 
?>