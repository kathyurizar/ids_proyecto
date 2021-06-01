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
    $productoHistorial = $producto->historial($codigo);
    $producto_detalle = $producto->producto($codigo);
?>

    <main id="app">

        <div class="container-fluid p-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-danger" href="producto_catalogo.php">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $producto_detalle['descripcion']; ?></li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid pl-4 pr-4 pb-4">            
            <br> 
        
            <div class="row justify-content-center">
                <div class="col-md-12">

                    <div class="row justify-content-between">
                        <div class="col-md-6 pt-2">
                            <a href="{{ route('ajuste.edit', $producto->id) }}" class="btn btn-danger btn-sm">
                                <i class="fas fa-balance-scale"></i> Ajuste
                            </a> 
                            <a href="producto_agregar.php?codigo=<?php echo $codigo ?>" class="btn btn-danger btn-sm">
                                <i class="fas fa-cart-plus"></i> Registrar Compra
                            </a>
                            <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-danger btn-sm">
                                <i class="far fa-edit"></i> Editar
                            </a>
                        </div>
                        <div class="col-md-6 pt-2">
                            <form class="form-inline float-right" method="get" action="">
                                <input type="hidden" name="fechaPdf" id="fechaPdf" value="">
                                <button type="submit" class="btn btn-danger btn-sm float-left">PDF - Imprimir</button>
                            </form>
                            <form class="form-inline float-right mr-1" method="get" action="">
                                <input type="hidden" name="fechaExcel" id="fechaExcel" value="">
                                <button type="submit" class="btn btn-success btn-sm ml-1">Excel</button>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-2 p-1">
                        <div class="col">
                        <div class="row justify-content-center">
                            <div class="col-md-12 p-2">
                                <h4 align="center" style="color: gray"></h4>
                                <div class="row justify-content-center">
                                    <div class="col-6 col-md-2" align="right">
                                        Producto
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <?php echo $producto_detalle['descripcion']; ?>
                                    </div>
                                    <div class="col-6 col-md-2" align="right">
                                        Inventario Minimo 
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <?php echo $producto_detalle['minimo']; ?>
                                    </div>
                                    <div class="col-6 col-md-2" align="right">
                                        Existencia Actual
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <?php echo $producto_detalle['existencias']; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-6 col-md-2" align="right">
                                        Categoria
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <?php echo $producto_detalle['nom_cat']; ?>
                                    </div>
                                    <div class="col-6 col-md-2" align="right">
                                        Subcategoria
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <?php echo $producto_detalle['nombre_sub']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 p-2">
                                <div class="table-responsive">
                                    <table class="table table-hover table-sm table-bordered">
                                        <thead class="bg-dark text-light">
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="3"><center>Entradas</center></td>
                                                <td colspan="3"><center>Salidas</center></td>
                                                <td colspan="3"><center>Existencias</center></td>
                                            </tr>
                                            <tr>
                                                <td>Fecha</td>
                                                <td>Detalle</td>
                                                <td>Cantidad</td>
                                                <td>Costo Unitario</td>
                                                <td>Total</td>
                                                <td>Cantidad</td>
                                                <td>Costo Unitario</td>
                                                <td>Total</td>
                                                <td>Cantidad</td>
                                                <td>Costo Unitario</td>
                                                <td>Total</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($productoHistorial as $historal){ ?>
                                                <tr>
                                                    <th scope="row"><?php echo $historal['created_at'] ?></th>
                                                    <td><?php echo $historal['detalle'] ?></td>
                                                    <td><?php echo $historal['cantidad'] ?></td>
                                                    <td><?php echo $historal['precio_costo'] ?></td>
                                                    <td><?php echo $historal['total'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?php echo $historal['exis_cantidad'] ?></td>
                                                    <td><?php echo $historal['exis_precio_costo'] ?></td>
                                                    <td><?php echo $historal['exis_total'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ajusteModal" tabindex="-1" aria-labelledby="ajusteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajuste</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary btn-sm">Guardar</button>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary btn-sm">Guardar</button>
                </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary btn-sm">Guardar</button>
                </div>
                </div>
            </div>
        </div>
    </main>


    
<?php 
    include '../layout/footer.php'; 
?>




