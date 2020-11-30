<?php 

    include("con_db.php");

    if(isset($_POST['register'])) { 
        if(strlen($_POST['name']) >= 1 &&       // Valida que los campos NO esten vacios al hacer submit
           strlen($_POST['email']) >= 1) {

                $name = trim($_POST['name']);         // trim elimina los espacios vacios al inicio y al final de lo que se escribe en el input
                $email = trim($_POST['email']);
                $fechareg = date("d/m/y");
                try {
                    require_once('includes/funciones/bd_conexion.php');
                    $stmt = $conn->prepare("INSERT INTO suscriptores (nombre, email, fecha_reg) VALUES (?,?,?)");
                    $stmt->bind_param("sss", $name, $email, $fechareg);
                    $stmt->execute();
                    $id = $stmt->insert_id;
                    if($id > 0){
                        $respuesta = array(
                            'respuesta' => 'exito',
                            'id' => $id
                        );
                        ?> 
                            <h3 class="ok">¡Te has inscripto correctamente!</h3>
                        <?php
                    }else{
                        $respuesta = array(
                            'respuesta' => 'error' 
                        );
                        ?> 
	    	                <h3 class="bad">¡Ups ha ocurrido un error!</h3>
                        <?php
                    }
                    $stmt->close();
                    $conn->close();

                    echo ("<script>setTimeout(\"location.href='index.php?exitoso=1'\",1000)</script>");
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
                die(json_encode($respuesta));
           } else {
               ?>
                    <h3 class="bad">¡Por favor complete los campos!</h3>
               <?php
           }

            
        } 
?> 


