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
  include '../../model/rol.php';

  $codUsuario = $_POST['codUsuario'];
  $nombreUsuario = $_POST['nombreUsuario'];
  $usuario = $_POST['usuario'];
  $correo = $_POST['correo'];
  $estado = $_POST['estado'];
  $codRol = $_POST['codRol'];
  $codEmpresa = $_POST['codEmpresa'];


  $roles = New Rol();
  $listaRoles = $roles->listadoRoles();

  include '../../model/empresa.php';
  $empresas = New Empresa();
  $listaEmpresas = $empresas->listadoEmpresas();
?>
    <main id="app">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Navegacion -->
            <div class="d-sm-flex align-items-center justify-content-start mb-4">
                <div class="col-2 col-md-1">
                    <a href="listadoUsuarios.php"><img src="../../img/regresar.svg" alt="" style="max-width:50px" class="img-fluid m-0 p-0"></a>
                </div>
                <h1 class="h3 mb-0 text-gray-800">Editar Usuario - <?php echo $usuario ?></h1>
            </div>

            <!-- Content Row -->
            <div class="row justify-content-center">
                <div class="col-9">
                    <form id="modificarUsuario" autocomplete="off" @submit.prevent="modificarUsuarios">
                        <input type="hidden" name="operador" id="operador" value="3">
                        <input type="hidden" name="codUsuario" id="codUsuario" value="<?php echo $codUsuario ?>">
                        <input type="hidden" name="tipo" id="tipo" value="1">
                        <div class="form-group row">
                            <label for="nombreCompleto" class="col-sm-3 col-form-label">Nombre Completo</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" required value="<?php echo $nombreUsuario ?>">
                            </div>
                        </div>
                        <!--<div class="form-group row">
                            <label for="usuario" class="col-sm-3 col-form-label">Usuario</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="usuario" name="usuario" required value="<?php echo $usuario ?>">
                            </div>
                        </div>-->
                        <div class="form-group row">
                            <label for="correo" class="col-sm-3 col-form-label">Correo</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="correo" name="correo" required value="<?php echo $correo ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contra" class="col-sm-3 col-form-label">Nueva Contraseña</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="contra" name="contra" value="">
                                <small>Opcional</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="codRol" class="col-sm-3 col-form-label">Rol</label>
                            <div class="col-sm-9">
                                <select class="custom-select" id="codRol" name="codRol" required>
                                    <?php 
                                        foreach($listaRoles as $rol){ 
                                            if($rol['cod_rol']==$codRol){
                                    ?>
                                                <option value="<?php echo $rol['cod_rol'] ?>" selected><?php echo $rol['nombre'] ?></option>
                                    <?php 
                                            }else{ 
                                    ?>
                                                <option value="<?php echo $rol['cod_rol'] ?>"><?php echo $rol['nombre'] ?></option>
                                    <?php 
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="empresa">
                            <label for="codEmpresa" class="col-sm-3 col-form-label">Empresa</label>
                            <div class="col-sm-9">
                                <select class="custom-select" id="codEmpresa" name="codEmpresa" required>
                                    <?php
                                        foreach($listaEmpresas as $empresa){
                                            if($empresa['cod_empresa']==$codEmpresa){
                                    ?>
                                                <option value="<?php echo $empresa['cod_empresa'] ?>" selected><?php echo $empresa['nombre_cliente'] ?></option>
                                    <?php
                                            }else{
                                    ?>
                                                <option value="<?php echo $empresa['cod_empresa'] ?>"><?php echo $empresa['nombre_cliente'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="estado" class="col-sm-3 col-form-label">Estado</label>
                            <div class="col-sm-9">
                                <select class="custom-select" id="estado" name="estado" required>
                                    <option value="A" <?php if($estado=='A'){echo "selected"; } ?>>Activo</option>
                                    <option value="I" <?php if($estado=='I'){echo "selected"; } ?>>Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" :disabled="deshabilitado" value="Guardar" class="btn btn-primary btn-user btn-block mt-4">  
                        <a href="listadoUsuarios.php" class="btn btn-danger btn-block">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </main>


<?php include '../layout/footer.php'; ?>


<script>

    $(document).ready(function(){
        empresas();

        $('#codRol').change(function(){
            empresas();
        });
    });

    function empresas(){
        var rol = $('#codRol').val();
        if(rol==1 || rol==3) {
            $('#empresa').hide();
            $('#tipo').val('2');
        }else{
            $('#empresa').show();
            $('#tipo').val('1');
        }
    }
</script>




