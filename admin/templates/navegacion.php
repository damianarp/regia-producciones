
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
              <img src="admin/img/admins/<?php echo $_SESSION['foto_admin']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <p><?php echo ucwords($_SESSION['nombre']); ?></p>
        </div>
      </div>
      <!-- <div class="user-panel">
        
        <div class="info">
          <p><?php echo ucwords($_SESSION['nombre']); ?></p>
        </div>
      </div> -->
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú de Administración</li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> 
            <span>Artículos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-articulos.php"><i class="fa fa-list-ul"></i> Ver Todos</a></li>
            <li><a href="crear-articulo.php"><i class="fa fa-plus-circle"></i> Crear Articulo</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i>
            <span>Categorías</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-categoria.php"><i class="fa fa-list-ul"></i> Ver Todas</a></li>
            <li><a href="crear-categoria.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-address-card"></i>
            <span>Suscriptores</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-suscriptores.php"><i class="fa fa-list-ul"></i> Ver Todos</a></li>
            <li><a href="crear-suscriptor.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>
          </ul>
        </li>
        <?php if($_SESSION['nivel'] == 1) : ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Administradores</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-admin.php"><i class="fa fa-list-ul"></i> Ver Todos</a></li>
            <li><a href="crear-admin.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>
          </ul>
        </li>
        <?php endif; ?>  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->