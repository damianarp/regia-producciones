<?php
    include_once 'funciones/sesiones.php';
    include_once 'templates/header.php';
    include_once 'funciones/funciones.php';
    include_once 'templates/barra.php';
    include_once 'templates/navegacion.php';

    $id = $_GET['id'];
    
    if(!filter_var($id, FILTER_VALIDATE_INT)) {
        die("Error!!");
    }
?>
<?php if($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2) : ?>
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Editar Suscriptor
                <small>Puedes editar los datos del Suscriptor aquí</small>
            </h1>
        </section>
        <div class="row">
            <div class="col-md-8">

            
                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Suscriptor</h3>
                        </div>
                        <div class="box-body">
                            <?php
                                $sql = "SELECT * FROM `suscriptores` WHERE `id_susc` = $id ";
                                $resultado = $conn->query($sql);
                                $admin = $resultado->fetch_assoc();
                            ?>
                            <!-- Formulario Editar Admin -->
                            <form role="form" name="guardar-suscriptor" id="guardar-suscriptor" method="post" action="modelo-admin.php">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" id="exampleInputName2" name="nombre" placeholder="Ingresa el nombre completo del suscriptor" value="<?php echo $admin['nombre_susc']; ?>">
                                        <div id="error_11"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Usuario:</label>
                                        <input type="email" class="form-control" id="exampleInputEmail2" name="email" placeholder="Ingresa el correo del suscriptor" value="<?php echo $admin['email_susc']; ?>">
                                        <div id="error_12"></div>
                                    </div>
                                
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="hidden" name="suscripcion" value="actualizar">
                                    <input type="hidden" name="id_susc" value="<?php echo $id; ?>">
                                    <button type="submit" class="btn btn-primary" id="modificar-suscripcion">Guardar</button>
                                </div>
                            </form>
                            <!-- /Formulario Editar Admin -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </section>
                <!-- /.content -->
            </div>
        </div>
  </div>
  <!-- /.content-wrapper -->
<?php endif; ?>
<?php include_once 'templates/footer.php';?>