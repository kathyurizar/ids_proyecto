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
    $html = "<style>
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
    
    <h3>Empresa: ". $empresaNombre ."<br></h3>
    <p>
        Almacen: ". $almacenNombre ."<br>
        Usuario: ". $_SESSION['nombre_user'] ."<br>
        Fecha: ". $fecha['mday'] . '-' . $fecha['mon'] . '-' . $fecha['year'] . '  ' . $fecha['hours'] . ':' . $fecha['minutes'] ."<br>
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
        <tbody>";

    foreach($productos as $p){
        $html .= "<tr>
                        <td>" . $p['cod_producto_sap'] . " </td>
                        <td>" . $p['ItemName'] . " </td>
                        <td>" . $p['nombre'] . " </td>
                        <td>";

                        if($p['existencia']==".00"){
                            $html .= "0";
                        }else{
                            $html .= $p['existencia'];
                        }
                        $html .= "</td>

                        <td>" . $p['InvntryUom'] . " </td>
                        <td>" . $p['inventario_minimo'] . " </td>
                        <td>" . $p['diferencia'] . " </td>
                    </tr>";
    }

    $html .= "</tbody>";
    $html .= "</table>";



    $filename = "newpdffile";

    // include autoloader
    include_once "../../dompdf/autoload.inc.php";

    // reference the Dompdf namespace
    use Dompdf\Dompdf;

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('letter', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($filename,array("Attachment"=>0));

?>