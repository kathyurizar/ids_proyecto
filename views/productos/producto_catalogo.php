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
    include '../../model/producto.php';
    include '../../model/subcategoria.php';

    $producto = new Producto();
    $subcategoria = new Subcategoria();

    $listaSubCategorias = $subcategoria->listaSubCategorias();
    $listaProductos = $producto->listaProductos();



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
                                <th scope="col">Existencias</th>
                                <th scope="col">Minimo</th>
                                <th scope="col">Precio G</th>
                                <th>Precio M</th>
                                <th>Subcategoria</th>
                                <th>Categoria</th>
                                <th>accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($listaProductos as $producto){ ?>
                            <tr>
                                <th scope="row"><?php echo $producto['cod_prod']; ?></th>
                                <td><?php echo $producto['descripcion']; ?></td>
                                <td><?php echo $producto['existencias']; ?></td>
                                <td><?php echo $producto['minimo']; ?></td>
                                <td><?php echo $producto['precio_gen']; ?></td>
                                <td><?php echo $producto['precio_may']; ?></td>
                                <td><?php echo $producto['nombre_sub']; ?></td>
                                <td><?php echo $producto['nom_cat']; ?></td>
                                <td>
                                    <a href="producto_kardex.php?codigo=<?php echo $producto['cod_prod']; ?>" class="btn btn-danger btn-sm">
                                        Kardex
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
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
                            <form action="../../controller/productoController.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="operador" value="1">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="imagen">Imagen del Producto</label>
                                        <input type="file" class="form-control-file" id="imagen" name="imagen">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                    <label for="codigo">Código</label>
                                    <input type="text" class="form-control" id="codigo" name="codigo">
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion">
                                    </div>
                                    <div class="form-group col-md-2">
                                    <label for="serie">Serie</label>
                                    <input type="text" class="form-control" id="serie" name="serie">
                                    </div>
                                    <div class="form-group col-md-2">
                                    <label for="existencias">Existencias</label>
                                    <input type="number" class="form-control" id="existencias" name="existencias">
                                    </div>
                                    <div class="form-group col-md-2">
                                    <label for="minimo">Minimo</label>
                                    <input type="number" class="form-control" id="minimo" name="minimo">
                                    </div>
                                </div>
                                <div class="form-row">
                                <div class="form-group col-md-4">
                                        <label for="precio_costo">Precio Costo</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="precio_costo">Q</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="0.00" aria-label="Username" aria-describedby="basic-addon1" name="precio_costo" id="precio_costo">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="precio_general">Precio General</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="precio_general">Q</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="0.00" aria-label="Username" aria-describedby="basic-addon1" name="precio_general" id="precio_general">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="precio_mayoreo">Precio Mayoreo</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="precio_mayoreo">Q</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="0.00" aria-label="Username" aria-describedby="basic-addon1" name="precio_mayoreo" id="precio_mayoreo">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="subcategoria">Subcategoria</label>
                                        <select id="subcategoria" name="subcategoria" class="form-control">
                                            <option value="sin categoria" selected>Seleccionar</option>
                                            <?php foreach($listaSubCategorias as $sub){ ?>
                                                <option value="<?php echo $sub['ID_subcat'] ?>"><?php echo $sub['nombre_sub'] ?></option>
                                            <?php } ?>
                                        </select>
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




