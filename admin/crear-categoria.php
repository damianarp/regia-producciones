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
                Crear Categoría
                <small>Llena el formulario para crear una nueva categoría</small>
            </h1>
        </section>
        <div class="row">
            <div class="col-md-8">

                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Crear Categoría</h3>
                        </div>
                        <div class="box-body">

                            <!-- Formulario Guardar Admin -->
                            <form role="form" name="guardar-categoria" id="guardar-categoria" method="post" action="modelo-articulo.php">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        <label for="nombre_categoria">Nombre de la Categoría:</label>
                                        <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Ingresa el nombre de la categoría">
                                        <div id="error_14"></div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="hidden" name="categorias" value="nuevo">
                                    <button type="submit" class="btn btn-primary" id="crear-categoria">Añadir</button>
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