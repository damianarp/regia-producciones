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
            Listado de Suscriptores
            <small></small>
          </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja los suscriptores en esta sección</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre Completo</th>
                  <th>Correo Electrónico</th>
                  <th class="mobile">Fecha de Suscripción</th>
                  <th class="mobile">Fecha de Modificación</th>
                  <?php if($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2) : ?>
                  <th>Acciones</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                    <?php
                        try {
                          $sql = "SELECT id_susc, nombre_susc, email_susc, fecha_susc, editado_susc FROM suscriptores";
                          $resultado = $conn->query($sql);
                        } catch (Exception $e) {
                          $error = $e->getMessage();
                          echo $error;
                        }
                        while($susc = $resultado->fetch_assoc()) { ?>
                          <tr>
                            <td><?php echo $susc['nombre_susc']; ?></td>
                            <td><?php echo $susc['email_susc']; ?></td>
                            <td class="mobile"><?php echo $susc['fecha_susc']; ?></td>
                            <td class="mobile"><?php echo $susc['editado_susc']; ?></td>
                            <?php if($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2) : ?>
                            <td>
                              <a href="editar-suscriptor.php?id=<?php echo $susc['id_susc'] ?>" class="btn bg-orange btn-flat margin">
                                  <i class="fa fa-pencil"></i>
                              </a>
                              <a href="#" data-id="<?php echo $susc['id_susc']; ?>" data-tipo="admin" class="btn bg-maroon btn-flat margin borrar_suscriptor">
                                  <i class="fa fa-trash"></i>
                              </a>
                            </td>
                            <?php endif; ?>
                          </tr>
                        <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre Completo</th>
                  <th>Correo Electrónico</th>
                  <th class="mobile">Fecha de Suscripción</th>
                  <th class="mobile">Fecha de Modificación</th>
                  <?php if($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2) : ?>
                  <th>Acciones</th>
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