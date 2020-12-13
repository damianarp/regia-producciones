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
            Listado de Mensajes
            <small></small>
          </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja los mensajes en esta sección</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="mobile">Nombre del Contacto</th>
                  <th class="mobile">Apellido del Contacto</th>
                  <th>Correo Electrónico</th>
                  <th>Asunto del Mensaje</th>
                  <th>Contenido del Mensaje</th>
                  <th class="mobile">Fecha del Mensaje</th>
                  <?php if($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2) : ?>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                    <?php
                        try {
                          $sql = "SELECT * FROM contacto";
                          $resultado = $conn->query($sql);
                        } catch (Exception $e) {
                          $error = $e->getMessage();
                          echo $error;
                        }
                        while($mensaje = $resultado->fetch_assoc()) { ?>
                          <tr>
                            <td class="mobile"><?php echo $mensaje['nombre_contacto']; ?></td>
                            <td class="mobile"><?php echo $mensaje['apellido_contacto']; ?></td>
                            <td><?php echo $mensaje['correo_contacto']; ?></td>
                            <td><?php echo $mensaje['asunto_contacto']; ?></td>
                            <td><?php echo $mensaje['mensaje_contacto']; ?></td>
                            <td class="mobile"><?php echo $mensaje['fecha_mensaje']; ?></td>
                            <?php if($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2) : ?>
                            <?php endif; ?>
                          </tr>
                        <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th class="mobile">Nombre del Contacto</th>
                  <th class="mobile">Apellido del Contacto</th>
                  <th>Correo Electrónico</th>
                  <th>Asunto del Mensaje</th>
                  <th>Contenido del Mensaje</th>
                  <th class="mobile">Fecha del Mensaje</th>
                  <?php if($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2) : ?>
                  <?php endif; ?>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'templates/footer.php';?>