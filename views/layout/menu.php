<?php 
  @session_start();
  if(!isset($_SESSION['user'])){
    header('location:../login');
  }
?>
  <div id="wrapper">

    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../home">
        <div class="sidebar-brand-text mx-3">DICAMA</div>
      </a>

      <hr class="sidebar-divider my-0">

      <li class="nav-item active">
        <a class="nav-link" href="../home/index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <?php if($_SESSION['id_rol']==1){ ?>
        
        <hr class="sidebar-divider">

        <div class="sidebar-heading">
          Productos
        </div>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../productos/producto_catalogo.php">
            <i class="fas fa-building"></i>
            <span>Productos</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="../productos/categoria_catalogo.php">
          <i class="fas fa-warehouse"></i>
            <span>Categorias</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="../productos/subcategoria_catalogo.php">
          <i class="fas fa-warehouse"></i>
            <span>SubCategorias</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="../usuarios/usuario_catalogo.php">
            <i class="fas fa-user-tie"></i>
            <span>Usuarios</span>
          </a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
          Compras 
        </div>

        <li class="nav-item">
          <a class="nav-link collapsed" href="../garantia/listadoGarantiasProcesadas.php">
            <i class="fas fa-building"></i>
            <span>Compras</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../garantia/listadoGarantiasProcesadas.php">
            <i class="fas fa-building"></i>
            <span>Cotización</span>
          </a>
        </li>

      <?php } ?>

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <p class="m-4">DICAMA</p>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['user'] ?></span>
                <img class="img-profile rounded-circle" src="../../img/usuario.svg">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../../general/logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>
              </div>
            </li>
          </ul>
        </nav>
