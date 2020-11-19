<?php 

    $destinatario = 'damianarp@gmail.com';

    if(isset($_POST['submit'])) {
        if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['correo']) && !empty($_POST['mensaje'])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $mensaje = $_POST['mensaje'];
            $header = "Enviado desde la web de Regia Producciones";
            $mensajeCompleto = $mensaje . "\nAtentamente: " . $nombre;
            $mail = mail($destinatario, $mensaje, $header);
            
            echo "<script>alert('correo enviado exitosamente')</script>";
            echo "<script>setTimeout(\"location.href='index.php'\",1000)</script>";
            
        }
    }


?>