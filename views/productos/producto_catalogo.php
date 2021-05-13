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

?>
    <main id="app">
        <div class="container-fluid p-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-danger" href="../home">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Productos</li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid pl-4 pr-4 pb-4">

            <div class="row justify-content-center p-1">
                <div class="col-md-12"> 
                    <a href="" class="btn btn-danger float-right btn-sm mb-2" data-toggle="modal" data-target="#nuevoProducto">Nuevo Producto</a>
                    <div class="table-responsive">
                        <table id="tablaDiseno" class="table table-striped table-bordered table-sm" style="width:100%">
                            <thead class="bg-dark text-light sm">
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Descripción del Producto</th>
                                <th scope="col">Departamento</th>
                                <th scope="col">Costo</th>
                                <th>P. Venta</th>
                                <th>Inv. Minimo</th>
                                <th>Tipo Venta</th>
                                <th>accion</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="producto_kardex.php" class="btn btn-danger btn-sm">
                                        Kardex
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="nuevoProducto" tabindex="-1" aria-labelledby="nuevo" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="importar">Agregar Producto</h5>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data" id="formularioArchivo">
                            <input type="hidden" name="operador" id="operador" value="2">
                            <input type="hidden" name="codEmpresa" id="codEmpresa" value="<?php echo $codEmpresa ?>">
                                <input type="file" class="form-control" name="documento" required>
                                <br>
                                <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>-->
                                <button type="button" onclick="cargarDatos()" class="btn btn-primary btn-block">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>

<?php 
    include '../layout/footer.php'; 
?>




