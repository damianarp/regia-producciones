<?php
    include_once 'funciones/sesiones.php';
    include_once 'funciones/funciones.php';
    include_once 'templates/header.php';
    include_once 'templates/barra.php';
    include_once 'templates/navegacion.php';
?>
<?php if($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2) : ?>
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Crear Suscriptor
                <small>Llena el formulario para crear un suscriptor</small>
            </h1>
        </section>
        <div class="row">
            <div class="col-md-8">

                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Crear Suscriptor</h3>
                        </div>
                        <div class="box-body">

                            <!-- Formulario Guardar Admin -->
                            <form role="form" name="guardar-suscriptor" id="guardar-suscriptor" method="post" action="modelo-admin.php">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        <label for="nombre">Nombre Completo:</label>
                                        <input type="text" class="form-control" id="exampleInputName2" name="nombre" placeholder="Ingresa el nombre completo del suscriptor">
                                        <div id="error_9"></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email">Correo Electrónico:</label>
                                        <input type="email" class="form-control" id="exampleInputEmail2" name="email" placeholder="Ingresa el correo electrónico del suscriptor">
                                        <div id="error_10"></div>
                                    </div>
                                
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="hidden" name="suscripcion" value="nuevo">
                                    <button type="submit" class="btn btn-primary" id="guardar-suscripcion">Añadir</button>
                                </div>
                            </form> 
                            <!-- /Formulario Guardar Admin -->
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