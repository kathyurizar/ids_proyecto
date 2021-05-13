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
  include '../../model/almacen.php';

    $almacenes = New Almacen(); 
    if(!isset($_SESSION['usoCodUsuario'])){
        $_SESSION['usoCodUsuario'] = $_POST['codUsuario'];
        $_SESSION['usoCodEmpresa'] = $_POST['codEmpresa'];
        $_SESSION['usoNombreEmpresa'] = $_POST['nombreEmpresa'];
        $_SESSION['usoNombreUsuario'] = $_POST['nombreUsuario'];
    }

    $codUsuario = $_SESSION['usoCodUsuario'];
    $codEmpresa = $_SESSION['usoCodEmpresa'];
    $nombreEmpresa = $_SESSION['usoNombreEmpresa'];
    $nombreUsuario = $_SESSION['usoNombreUsuario'];

    $listaAlmacenes = $almacenes->listAlmacenEmpresa($codEmpresa);
    $listaAsignados = $almacenes->listAlmacenAsignadoUsuario($codUsuario, $codEmpresa);

?>
    <main id="app">
        <div class="d-sm-flex align-items-center justify-content-start mb-4">
            <div class="col-2 col-md-1">
                <a href="listadoUsuarios.php"><img src="../../img/regresar.svg" alt="" style="max-width:50px" class="img-fluid m-0 p-0"></a>
            </div>
            <h1 class="h3 mb-0 text-gray-800">Asignar Almacen</h1>
        </div>
        <div class="container">


            <!-- Content Row -->
            <div class="row justify-content-start">
                <div class="col-2">
                    <p>Usuario</p>
                </div>
                <div class="col-4">
                    <p align="left"><?php echo $nombreUsuario ?></p>
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col-2">
                    <p>Empresa</p>
                </div>
                <div class="col-4">
                    <p align="left"><?php echo $nombreEmpresa ?></p>
                </div>
            </div>
            <div class="row justify-content-center"> 
                <div class="col-12 mt-3">
                <form id="asignarAlmacen" autocomplete="off" @submit.prevent="asignarAlmacenes">
                    <div class="table-responsive">
                        <table id="tablaDiseno"  class="table table-striped table-bordered" style="width:100%">
                        <input type="hidden" name="operador" id="operador" value="3">
                        <input type="hidden" name="codUsuario" value="<?php echo $codUsuario ?>">
                        <input type="hidden" name="codEmpresa" value="<?php echo $codEmpresa ?>">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Asignar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($listaAlmacenes as $key=>$almacen){?>
                                    <tr>
                                        <th><?php echo $almacen['cod_almacen'] ?></th>
                                        <input type="hidden" name="codAlmacen[]" value="<?php echo $almacen['cod_almacen'] ?>">
                                        <td><?php echo $almacen['nombre'] ?></td>
                                        <td><?php echo $almacen['direccion'] ?></td>
                                        <td>
                                            <?php
                                            $estado=false;
                                                foreach($listaAsignados as $asignado){ 
                                                    
                                                if($asignado['cod_almacen']==$almacen['cod_almacen']){
                                                    $estado = true;
                                                    
                                            ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="asignado" name="asignado[]" value="<?php echo $almacen['cod_almacen'] ?>" checked>
                                                </div>
                                            <?php 
                                                }
                                            ?>
      
                                            <?php } if($estado==false){?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="asignado" name="asignado[]" value="<?php echo $almacen['cod_almacen'] ?>">
                                                </div>
                                        </td>
                                    </tr>
                                <?php }} ?>
                            </tbody>
                        </table>
                        
                    </div>
                    <input type="submit" :disabled="deshabilitado" value="Asignar" class="btn btn-primary btn-user btn-block mt-4">  
                        </form>
                </div>
            </div>
        </div>
    </main>

<?php include '../layout/footer.php'; ?>
