<?php 
    @session_start();
    include '../layout/header.php'; 
    if(!isset($_SESSION['user'])){
        header('location:../login');
    }

    include '../layout/menu.php';

    $empresa = "";
    $almacen = "";
    $stockMinimo = false;

    if(isset($_POST['empresa'])){
        $empresa = $_POST['empresa'];
        $almacen = $_POST['almacen'];
        echo '<input type="hidden" name="almacenSeleccionado" id="almacenSeleccionado" value="'.$almacen.'">';
    }


    if(isset($_POST['stockMinimo'])){
        $stockMinimo = true; 

    }

    include '../../model/empresa.php';
    include '../../model/producto.php';

    $producto = New Producto();

    $productos = $producto->reporteInventario($empresa, $almacen, $stockMinimo);

    $empresas = New Empresa();
    $listaEmpresas = $empresas->listadoEmpresas();


?>
    <main id="app">   
        <!-- Begin Page Content -->
        <div class="container-fluid mb-5">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="col">
                    <h1 class="h3 mb-0 text-gray-800">Reporte de Inventario</h1>
                </div>

                <div class="col">
                    <form target="_blank" action="excel.php" method="post">
                        <?php if($_SESSION['id_rol']=="2"){ ?>
                            <input type="hidden" id="empresaPdf" name="empresaPdf" value="<?php echo $_SESSION['id_empresa'] ?>">
                        <?php }else{ ?>
                            <input type="hidden" id="empresaPdf" name="empresaPdf" value="<?php echo $empresa ?>">
                        <?php } ?>
                        <input type="hidden" id="almacenPdf" name="almacenPdf" value="<?php echo $almacen ?>">
                        <input type="hidden" id="stockPdf" name="stockPdf" value="<?php echo $stockMinimo ?>">
                        <button type="submit" class="btn btn-success float-right ml-2 mr-2">Excel</button>
                    </form>
                    <form target="_blank" action="pdf.php" method="post">
                        <?php if($_SESSION['id_rol']=="2"){ ?>
                            <input type="hidden" id="empresaPdf" name="empresaPdf" value="<?php echo $_SESSION['id_empresa'] ?>">
                        <?php }else{ ?>
                            <input type="hidden" id="empresaPdf" name="empresaPdf" value="<?php echo $empresa ?>">
                        <?php } ?>
                        <input type="hidden" id="almacenPdf" name="almacenPdf" value="<?php echo $almacen ?>">
                        <input type="hidden" id="stockPdf" name="stockPdf" value="<?php echo $stockMinimo ?>">
                        <button type="submit" class="btn btn-danger float-right">PDF</button>
                    </form>
                </div>
 
            </div>

            <div class="row">
                <div class="col">
                    <form method="POST" action="reporteInventario.php">
                        <div class="form-row">
                            <?php if($_SESSION['id_rol']=="2"){ ?>
                                <input type="hidden" id="empresa" name="empresa" value="<?php echo $_SESSION['id_empresa'] ?>">
                            <?php }else{ ?>
                            <div class="form-group col-md-6">
                                <label for="empresa">Empresa</label>
                                <select class="custom-select mr-sm-2" id="empresa" name="empresa">
                                    <?php

                                        foreach($listaEmpresas as $empresa){
                                            if($_POST['empresa']==$empresa['cod_empresa']){
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
                            <?php } ?>
                            <div id="select2lista" class="form-group col">
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <?php
                                if($stockMinimo){
                            ?>
                                <input type="checkbox" class="form-check-input" id="stockMinimo" name="stockMinimo" checked>
                            <?php
                                }else{
                            ?>
                                <input type="checkbox" class="form-check-input" id="stockMinimo" name="stockMinimo">
                            <?php
                                }
                            ?>
                            <label class="form-check-label" for="stockMinimo" name="stockMinimo">Visualizar solo los de stock minimo</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Consultar</button>
                    </form>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row justify-content-center">
                <div class="col-12 mt-3">
                    <div class="table-responsive">
                        <table id="tablaDiseno" class="table table-striped table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Código</th>
                                    <th>Descripción</th>
                                    <th>Almacén</th>
                                    <th>Existencia</th>
                                    <th>Unidad de Medida</th>
                                    <th>Stock Minimo</th>
                                    <th>Diferencia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($productos as $key=>$producto){?>
                                    <tr>
                                        <th><?php echo $producto['cod_producto_sap'] ?></th>
                                        <td><?php echo $producto['ItemName'] ?></td>
                                        <td><?php echo $producto['nombre'] ?></td>
                                        <td><?php if($producto['existencia']==".00"){ echo 0;}else{ echo $producto['existencia'];} ?></td>
                                        <td><?php echo $producto['InvntryUom'] ?></td>
                                        <td><?php echo $producto['inventario_minimo'] ?></td>
                                        <?php
                                            if($producto['diferencia']<0){
                                        ?>
                                        <td style="color:red"><?php echo $producto['diferencia'] ?></td>
                                        <?php
                                            }else{
                                        ?>
                                        <td style="color:green"><?php echo $producto['diferencia'] ?></td>
                                        <?php
                                            }
                                        ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>


<?php include '../layout/footer.php'; ?>

<script>
$(document).ready(function(){
        recargarLista();

        $('#empresa').change(function(){
            recargarLista();
        });
    })
function recargarLista(){
        var empresa = $('#empresa').val();
        var almacenSeleccionado = $('#almacenSeleccionado').val();
        $.ajax({
            type: "POST",
            url: "../../model/almacenCompletar.php",
            data: {empresa:empresa, reporte:"si"},
            success: function(r){
                $('#select2lista').html(r);
                //$("#tablaProductos").empty();
                $("#almacen option[value='"+ almacenSeleccionado + "'").attr("selected",true);

            }
        })
    }

</script>