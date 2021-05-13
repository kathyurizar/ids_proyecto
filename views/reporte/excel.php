<?php

    $empresa = $_POST['empresaPdf'];
    $almacen = $_POST['almacenPdf'];
    $stock = $_POST['stockPdf'];
    include '../../model/producto.php';
    include '../../model/almacen.php';
    include '../../model/empresa.php';

    $producto = New Producto();
    $almacenClass = New Almacen();
    $empresaClass = New Empresa();

    $productos = $producto->reporteInventario($empresa, $almacen, $stock);
    $empresaNombre = $empresaClass->nombreEmpresa($empresa);
    $almacenNombre = "";
    if($almacen!="todos"){
        $almacenNombre = $almacenClass->nombreAlmacen($almacen);
    }else{
        $almacenNombre = "Todos";
    }
    $fecha = getdate();

    header("Content-Type: application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=reporteInventario.xls");
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        table{
            width: 100%;
            border: 1px;
        }
        hr {
            width: 30%;
            background-color: black;
        }
        body {
            font-family: 'Helvetica'
        }
        td,th{
            border: 1px solid  #c3c3c3;
        }
        thead{
            font-weight: bold;
            background: black;
            color: white;
        }
    </style>
</head>
<body>


<h3>Empresa: <?php echo $empresaNombre ?><br></h3>
<p>
    Almacen: <?php echo $almacenNombre ?><br>
    Fecha: <?php echo $fecha['mday'] . '-' . $fecha['mon'] . '-' . $fecha['year'] . '  ' . $fecha['hours'] . ':' . $fecha['minutes']; ?>
</p>

<table cellspacing='0'>
    <thead>
    <tr>
        <th>Código</th>
        <th>Descricpión</th>
        <th>Almacén</th>
        <th>Existencia</th>
        <th>Unidad de Medida</th>
        <th>Stock Minimo</th>
        <th>Diferencia</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach($productos as $p){ ?>
        <tr>
            <td><?php echo $p['cod_producto_sap'] ?></td>
            <td><?php echo $p['ItemName'] ?></td>
            <td><?php echo $p['nombre'] ?></td>
            <td><?php if($p['existencia']==".00"){ echo 0;}else{ echo $p['existencia'];} ?></td>
            <td><?php echo $p['InvntryUom'] ?></td>
            <td><?php echo $p['inventario_minimo'] ?></td>
            <td><?php echo $p['diferencia'] ?></td>
        </tr>
    <?php } ?>

    </tbody>
</table>
