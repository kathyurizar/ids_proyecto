<?php 
  @session_start();
  include '../layout/header.php'; 
  if(!isset($_SESSION['user'])){
    header('location:../login');
  }
  if($_SESSION['id_rol']!=1){//ingreso solo de administrador
    header('location:../home/index.php');
  }
  include '../layout/menu.php';

  include '../../model/usuario.php';

  $usuario = New Usuario();

  $codUsuario = $_GET['codUsuario'];

  $detalleUsuario = $usuario->detalleUsuario($codUsuario);
?>
    <main id="app">
    <?php foreach($detalleUsuario as $detalles) ?>
    <div class="container p-0">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="listadoUsuarios.php">Usuarios</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $detalles['usuario'] ?></li>
        </ol>
    </nav>
</div>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Detalles de Usuario</h1>

            </div>

            <!-- Content Row -->
            <div class="row justify-content-center">
                <div class="col-4">
                    <p align="right">Código de Usuario</p>
                </div>
                <div class="col-4">
                    <p align="left"><?php echo $detalles['cod_usuario'] ?></p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4">
                    <p align="right">nombre del Usuario</p>
                </div>
                <div class="col-4">
                    <p align="left"><?php echo $detalles['nombre_completo'] ?></p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4">
                    <p align="right">Rol</p>
                </div>
                <div class="col-4">
                    <p align="left"><?php echo $detalles['nombreRol'] ?></p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4">
                    <p align="right">Usuario</p>
                </div>
                <div class="col-4">
                    <p align="left"><?php echo $detalles['usuario'] ?></p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4">
                    <p align="right">Correo</p>
                </div>
                <div class="col-4">
                    <p align="left"><?php echo $detalles['correo'] ?></p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4">
                    <p align="right">Estado del Usuario</p>
                </div>
                <div class="col-4">
                    <p align="left"><?php echo ($detalles['estadoUsuario']=='A') ?  "Activo" : "Inactivo" ?></p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4">
                    <p align="right">Empresa</p>
                </div>
                <div class="col-4">
                    <p align="left"><?php echo $detalles['nombre_cliente'] ?></p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4">
                    <p align="right">Estado de la Empresa</p>
                </div>
                <div class="col-4">
                    <p align="left"><?php echo ($detalles['estadoEmpresa']=='A') ?  "Activo" : "Inactivo" ?></p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4">
                    <p align="right">Almacen</p>
                </div>
                <div class="col-4">
                    <p align="left"><?php echo ($detalles['nombreAlmacen']=='') ?  "Sin Asignar" : $detalles['nombreAlmacen'] ?></p>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-12 col-sm-12 col-md-4 col-l-3 col-xl-3 mt-1">
                    <form action="asignarAlmacen.php" method="POST">
                        <input type="hidden" id="codUsuario" name="codUsuario" value="<?php echo $detalles['cod_usuario'] ?>">
                        <input type="hidden" name="codEmpresa" value="<?php echo $detalles['cod_empresa'] ?>">
                        <input type="hidden" name="nombreEmpresa" value="<?php echo $detalles['nombre_cliente'] ?>">
                        <input type="hidden" name="nombreAlmacen" value="<?php echo $detalles['nombreAlmacen'] ?>">
                        <input type="hidden" name="nombreUsuario" value="<?php echo $detalles['nombre_completo'] ?>">
                        <input type="hidden" name="usuario" value="<?php echo $detalles['usuario'] ?>">
                        <input type="submit" value="Asignar Almacen" class="btn btn-primary btn-block">
                    </form>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-l-3 col-xl-3 mt-1">
                    <form>
                        <input type="submit" value="Editar" class="btn btn-secondary btn-block">
                    </form>
                </div>
            </div>
        </div>
    </main>


<?php include '../layout/footer.php'; ?>
