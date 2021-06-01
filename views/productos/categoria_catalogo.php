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
    include '../../model/categoria.php';

    $categoria = new Categoria();
    $categorias = $categoria->getCategorias();

?>
    <main id="app">
        <div class="container-fluid p-4">
            <nav aria-label="breadcrumb"> 
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-danger" href="../home">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid pb-4 pl-4 pr-4">
        

            <div class="row justify-content-center p-1">
                <div class="col-md-12"> 
                    <a href="" class="btn btn-danger float-right btn-sm mb-2" data-toggle="modal" data-target="#nuevoProducto">Nueva Categoria</a>
                    <div class="table-responsive">
                        <table id="tablaDiseno" class="table table-striped table-bordered table-sm" style="width:100%">
                            <thead class="bg-dark text-light sm">
                            <tr>
                                <th scope="col">ID Categoria</th>
                                <th scope="col">Categoria</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($categorias as $categoria){ ?>
                            <tr>
                                <th scope="row"><?php echo $categoria['ID_cat'] ?></th>
                                <td><?php echo $categoria['nom_cat'] ?></td>
                            <?php } ?>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="nuevoProducto" tabindex="-1" aria-labelledby="nuevo" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="importar">Agregar Producto</h5>
                        </div>
                        <div class="modal-body">
                            <form action="../../controller/categoriaController.php" method="POST">
                                <input type="hidden" name="operador" value="1">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                    <label for="categoria">Categoria</label>
                                    <input type="text" class="form-control" id="categoria" name="categoria">
                                    </div>
                                </div>
                                <br>
                                <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>-->
                                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
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




