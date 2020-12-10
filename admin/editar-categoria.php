<?php
    include_once 'funciones/sesiones.php';
    include_once 'funciones/funciones.php';
    include_once 'templates/header.php';
    include_once 'templates/barra.php';
    include_once 'templates/navegacion.php';

    $id = $_GET['id'];
    
    if(!filter_var($id, FILTER_VALIDATE_INT)) {
        die("Error!!");
    }
?>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Editar Categoría
                <small>Llena el formulario para editar una categoría</small>
            </h1>
        </section>
        <div class="row">
            <div class="col-md-8">

                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Categoría</h3>
                        </div>
                        <div class="box-body">
                            <?php
                                $sql = "SELECT * FROM `categorias` WHERE `id_categoria` = $id ";
                                $resultado = $conn->query($sql);
                                $categoria = $resultado->fetch_assoc();
                            ?>
                            <!-- Formulario Guardar Admin -->
                            <form role="form" name="guardar-categoria" id="guardar-categoria" method="post" action="modelo-articulo.php">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        <label for="nombre_categoria">Nombre de la Categoría:</label>
                                        <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="<?php echo $categoria['nombre_cat']; ?>">
                                        <div id="error_14"></div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="hidden" name="categorias" value="actualizar">
                                    <input type="hidden" name="id_categoria" value="<?php echo $id; ?>">
                                    <button type="submit" class="btn btn-primary" id="modificar_categoria">Guardar</button>
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

<?php include_once 'templates/footer.php';?>