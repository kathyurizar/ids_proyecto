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

    $producto = new Producto();

    $codigo = $_GET['codigo'];
    $producto_detalle = $producto->producto($codigo);
?>

    <main id="app">

        <div class="container-fluid p-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-danger" href="producto_catalogo.php">Productos</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="producto_kardex.php?codigo=<?php echo $codigo ?>">KARDEX</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $producto_detalle['descripcion']; ?></li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid pl-4 pr-4 pb-4">            
            <br> 
        
            <div class="row justify-content-center">
                <div class="col-md-12 mb-0 p-4 pb-0 shadow-sm rounded">
                    <div class="row justify-content-between">
                        <div class="col">
                        <h4 style="color:gray" class="mb-3">Agregar Producto a Inventario</h4>
                        </div>
                    </div>
                    <form  action="../../controller/productoController.php" id="formAgregar" method="POST">
                        <input type="hidden" name="operador" value="2">
                        <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
                        <div class="form-group row">
                            <label for="descripcion" class="col-sm-2 col-form-label col-form-label-sm">Descripción</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label col-form-label-sm"><?php echo $producto_detalle['descripcion']; ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="existencia" class="col-sm-2 col-form-label col-form-label-sm">Hay</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label col-form-label-sm"><?php echo $producto_detalle['existencias']; ?></label>
                                <input type="hidden" name="existencia" value="<?php echo $producto_detalle['existencias']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="existencia" class="col-sm-2 col-form-label col-form-label-sm">Minimo</label>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label col-form-label-sm"><?php echo $producto_detalle['minimo']; ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="existencia" class="col-sm-2 col-form-label col-form-label-sm">Agregar</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control form-control-sm" id="cantidadAgregada" name="cantidadAgregada" min="0" value="0">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="precio_costo" class="col-sm-2 col-form-label col-form-label-sm">Precio Costo</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2 input-group-sm">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Q</div>
                                    </div>
                                    <input type="number" class="form-control form-control-sm" id="precio_costo" name="precio_costo" min="0" step="0.01" value="<?php echo $producto_detalle['precio_costo']; ?>">
                                    <input type="hidden" class="form-control form-control-sm" id="precio_costo_anterior" name="precio_costo_anterior" min="0" step="0.01" value="<?php echo $producto_detalle['precio_costo']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="precio_general" class="col-sm-2 col-form-label col-form-label-sm">Precio General</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2 input-group-sm">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Q</div>
                                    </div>
                                    <input type="number" class="form-control form-control-sm" id="precio_general" name="precio_general" min="0" step="0.01" value="<?php echo $producto_detalle['precio_gen']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="precio_mayoreo" class="col-sm-2 col-form-label col-form-label-sm">Precio Mayoreo</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2 input-group-sm">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Q</div>
                                    </div>
                                    <input type="number" class="form-control form-control-sm" id="precio_mayoreo" name="precio_mayoreo" min="0" step="0.01" value="<?php echo $producto_detalle['precio_may']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="factura" class="col-sm-2 col-form-label col-form-label-sm">Factura No.</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2 input-group-sm">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">#</div>
                                    </div>
                                    <input type="number" class="form-control form-control-sm" id="factura" name="factura" min="0" step="0.01">
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="agregarProductoGuardar" class="btn btn-success btn-sm float-right">Guardar</button>
                        <a href="producto_kardex.php?codigo=<?php echo $codigo ?>"><button type="button" class="btn btn-danger btn-sm float-right mr-1">Cancelar</button></a>
                    </form>
                </div>
            </div>
        </div>
    </main>


    
<?php 
    include '../layout/footer.php'; 
?>




