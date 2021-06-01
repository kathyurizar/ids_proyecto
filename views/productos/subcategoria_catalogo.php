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
    include '../../model/subcategoria.php';
    include '../../model/categoria.php';

    $sub = new Subcategoria();
    $subcategorias = $sub->listaSubCategorias();

    
    $categoria = new Categoria();
    $categorias = $categoria->getCategorias();

?>
    <main id="app">
        <div class="container-fluid p-4">
            <nav aria-label="breadcrumb"> 
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-danger" href="../home">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Subcategorias</li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid pb-4 pl-4 pr-4">
        

            <div class="row justify-content-center p-1">
                <div class="col-md-12"> 
                    <a href="" class="btn btn-danger float-right btn-sm mb-2" data-toggle="modal" data-target="#nuevoProducto">Nueva SubCategoria</a>
                    <div class="table-responsive">
                        <table id="tablaDiseno" class="table table-striped table-bordered table-sm" style="width:100%">
                            <thead class="bg-dark text-light sm">
                            <tr>
                                <th scope="col">ID Subcategoria</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Subcategoria</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($subcategorias as $subc){ ?>
                            <tr>
                                <th scope="row"><?php echo $subc['ID_subcat'] ?></th>
                                <th><?php echo $subc['nom_cat'] ?></th>
                                <td><?php echo $subc['nombre_sub'] ?></td>
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
                            <h5 class="modal-title" id="importar">Agregar   </h5>
                        </div>
                        <div class="modal-body">
                            <form action="../../controller/subCategoriaController.php" method="POST">
                                <input type="hidden" name="operador" value="1">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="categoria">Categoria</label>
                                        <select id="categoria" name="categoria" class="form-control">
                                            <option value="sin categoria" selected>Seleccionar</option>
                                            <?php foreach($categorias as $categoria){ ?>
                                                <option value="<?php echo $categoria['ID_cat'] ?>"><?php echo $categoria['nom_cat'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                    <label for="subcategoria">Categoria</label>
                                    <input type="text" class="form-control" id="subcategoria" name="subcategoria">
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




