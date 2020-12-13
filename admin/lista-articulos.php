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
            Listado de Artículos
            <small></small>
          </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja los articulos en esta sección</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Título</th>
                  <th>Imagen</th>
                  <th class="mobile">Categoría</th>
                  <th class="mobile">Autor</th>
                  <th class="mobile">Fecha de Creación</th>
                  <th class="mobile">Estado</th>
                  <th class="mobile">Fecha de Edición</th>
                  <th class="mobile">Editado por:</th>
                  <?php if($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3) : ?>
                  <th>Acciones</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                    <?php
                        try {
                          $sql = "SELECT articulos.id_art, articulos.titulo_art, articulos.descripcion_art, articulos.contenido_art, articulos.img_art, categorias.nombre_cat, admins.nombre, articulos.fecha_creacion, estado.nombre_estado, articulos.fecha_edicion  
                          FROM articulos
                          INNER JOIN categorias ON categorias.id_categoria = articulos.categoria_id
                          INNER JOIN admins ON admins.id_admin = articulos.admin_id
                          INNER JOIN estado ON estado.id_estado = articulos.estado_id
                          LEFT JOIN admins as admins2 ON admins2.id_admin = articulos.edicion_admin_id
                          GROUP BY articulos.id_art, articulos.titulo_art, articulos.descripcion_art, articulos.contenido_art, articulos.img_art, categorias.nombre_cat, admins.nombre, articulos.fecha_creacion, estado.nombre_estado, articulos.fecha_edicion
                          ORDER BY articulos.id_art DESC";
                          $resultado = $conn->query($sql);
                        } catch (Exception $e) {
                          $error = $e->getMessage();
                          echo $error;
                        }
                        while($art = $resultado->fetch_assoc()) { ?>
                          <tr>
                            <td><?php echo $art['titulo_art']; ?></td>
                            <td>
                              <?php if ($art['img_art']) { ?>
                                <img src="../img/articulos/<?php echo $art['img_art']; ?>" width="200px">
                              <?php } ?>
                            </td>
                            <td class="mobile"><?php echo $art['nombre_cat']; ?></td>
                            <td class="mobile"><?php echo $art['nombre']; ?></td>
                            <td class="mobile"><?php echo $art['fecha_creacion']; ?></td>
                            <td class="mobile"><?php echo $art['nombre_estado']; ?></td>
                            <td class="mobile"><?php echo $art['fecha_edicion']; ?></td>
                            <td class="mobile"><?php echo $art['usuario']; ?></td>
                            <?php if($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3) : ?>
                            <td>
                              <a href="editar-articulo.php?id=<?php echo $art['id_art']; ?>" class="btn bg-orange btn-flat margin">
                                  <i class="fa fa-pencil"></i>
                              </a>
                              <a href="#" data-id="<?php echo $art['id_art']; ?>" data-tipo="articulo" class="btn bg-maroon btn-flat margin borrar_articulo">
                                  <i class="fa fa-trash"></i>
                              </a>
                            </td>
                            <?php endif; ?>
                          </tr>
                        <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Título</th>
                  <th>Imagen</th>
                  <th class="mobile">Categoría</th>
                  <th class="mobile">Autor</th>
                  <th class="mobile">Fecha de Creación</th>
                  <th class="mobile">Estado</th>
                  <th class="mobile">Fecha de Edición</th>
                  <th class="mobile">Editado por:</th>
                  <?php if($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3) : ?>
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