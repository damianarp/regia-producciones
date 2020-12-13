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
            Listado de Administradores
            <small></small>
          </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja los usuarios en esta sección</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Foto</th>
                  <th>Usuario</th>
                  <th class="mobile">Nombre</th>
                  <th>Nivel</th>
                  <th class="mobile">Fecha de modificación</th>
                  <?php if($_SESSION['nivel'] == 1) : ?>
                  <th>Acciones</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                    <?php
                        try {
                          $sql = "SELECT * FROM admins, nivel WHERE admins.nivel_id = nivel.id_nivel";
                          $resultado = $conn->query($sql);
                        } catch (Exception $e) {
                          $error = $e->getMessage();
                          echo $error;
                        }
                        while($admin = $resultado->fetch_assoc()) { ?>
                          <tr>
                            <td><img src="admin/img/admins/<?php echo $admin['foto_admin']; ?>" width="100px"></td>
                            <td><?php echo $admin['usuario']; ?></td>
                            <td class="mobile"><?php echo $admin['nombre']; ?></td>
                            <td><?php echo $admin['nombre_nivel']; ?></td>
                            <td class="mobile"><?php echo $admin['editado']; ?></td>
                            <?php if($_SESSION['nivel'] == 1) : ?>
                            <td>
                              <a href="editar-admin.php?id=<?php echo $admin['id_admin']; ?>" class="btn bg-orange btn-flat margin">
                                  <i class="fa fa-pencil"></i>
                              </a>
                              <a href="#" data-id="<?php echo $admin['id_admin']; ?>" data-tipo="admin" class="btn bg-maroon btn-flat margin borrar_registro">
                                  <i class="fa fa-trash"></i>
                              </a>
                            </td>
                            <?php endif; ?>
                          </tr>
                        <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Foto</th>
                  <th>Usuario</th>
                  <th class="mobile">Nombre</th>
                  <th>Nivel</th>
                  <th class="mobile">Fecha de modificación</th>
                  <?php if($_SESSION['nivel'] == 1) : ?>
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