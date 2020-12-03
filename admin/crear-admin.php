<?php
    include_once 'funciones/sesiones.php';
    include_once 'funciones/funciones.php';
    include_once 'templates/header.php';
    include_once 'templates/barra.php';
    include_once 'templates/navegacion.php';
?>





  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Crear Administrador
                <small>Llena el formulario para crear un administrador</small>
            </h1>
        </section>
        <div class="row">
            <div class="col-md-8">

            
                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Crear Administrador</h3>
                        </div>
                        <div class="box-body">
                          <!-- form start -->
                            <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-admin.php">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="usuario">Usuario:</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="usuario" placeholder="Ingresa tu usuario">
                                    </div>

                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" id="exampleInputName1" name="nombre" placeholder="Ingresa tu nombre">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu password">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Repetir password:</label>
                                        <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Ingresa tu password">
                                        <span id="resultado_password" class="help-block"></span>
                                    </div>
                                
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <input type="hidden" name="registro" value="nuevo">
                                    <button type="submit" class="btn btn-primary" id="crear_registro">Añadir</button>
                                </div>
                            </form>
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

  <?php
      include_once 'templates/footer.php';
  ?>