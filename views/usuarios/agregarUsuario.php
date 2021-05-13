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
  include '../../model/empresa.php';
  $empresas = New Empresa();
  $listaEmpresas = $empresas->listadoEmpresas();
?>
    <main id="app">
    <div class="col-2 col-md-1 ml-3">
        <a href="../usuarios/listadoUsuarios.php"><img src="../../img/regresar.svg" alt="" style="max-width:50px" class="img-fluid m-0 p-0"></a>
    </div>
        <!-- Begin Page Content -->
        <div class="container">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Agregar Usuario</h1>
            </div>

            <!-- Content Row -->
            <div class="row justify-content-center">
                <div class="col-9">
                    <form id="agregarUsuario" autocomplete="off" @submit.prevent="agregarUsuarios">
                        <input type="hidden" name="operador" id="operador" value="1">
                        <input type="hidden" name="tipo" id="tipo" value="1">
                        <div class="form-group row">
                            <label for="codRol" class="col-sm-3 col-form-label">Rol</label>
                            <div class="col-sm-9">
                                <select class="custom-select" id="codRol" name="codRol" required>
                                    <option value="0">Seleccionar...</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Cliente</option>
                                    <option value="3">Encargado de Almacén SYPSA</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="empresa">
                            <label for="codEmpresa" class="col-sm-3 col-form-label">Empresa</label>
                            <div class="col-sm-9">
                                <select class="custom-select" id="codEmpresa" name="codEmpresa" required>
                                    <?php foreach($listaEmpresas as $empresa){ ?>
                                    <option value="<?php echo $empresa['cod_empresa'] ?>"><?php echo $empresa['nombre_cliente'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombreCompleto" class="col-sm-3 col-form-label">Nombre Completo</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="usuario" class="col-sm-3 col-form-label">Usuario</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="usuario" name="usuario" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="clave" class="col-sm-3 col-form-label">Clave</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="clave" name="clave" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="correo" class="col-sm-3 col-form-label">Correo</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="correo" name="correo" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="estado" class="col-sm-3 col-form-label">Estado</label>
                            <div class="col-sm-9">
                                <select class="custom-select" id="estado" name="estado" required>
                                    <option value="A" selected>Activo</option>
                                    <option value="I">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" :disabled="deshabilitado" value="Guardar" class="btn btn-primary btn-user btn-block mt-4">  
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




