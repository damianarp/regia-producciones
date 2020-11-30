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
                    $stmt = $conex->prepare("INSERT INTO suscriptores (nombre, email, fecha_reg) VALUES (?,?,?)");
                    $stmt->bind_param("sss", $name, $email, $fecha_reg);
                    $stmt->execute();
                    $id = $stmt->insert_id;
                    if($id > 0){
                        $respuesta = array(
                            'respuesta' => 'exito',
                            'id' => $id
                        );
                        
                    }else{
                        $respuesta = array(
                            'respuesta' => 'error' 
                        );
                        
                    }
                    $stmt->close();
                    $conex->close();

                    echo ("<script>setTimeout(\"location.href='index.php?exitoso=1'\",1000)</script>");
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
                die(json_encode($respuesta));
           } else {
               ?>
               <h3>Ups! ha ocurrido un error!</h3>
               <?php
           }

            
        }
?>
