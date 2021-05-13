<?php

include_once "../model/producto.php"; 
include_once "../model/class.db.php";
include_once "../model/empresa.php";

$operador = 0;

if(isset($_POST['operador'])) {
    $operador = htmlentities($_POST['operador']);
}else{
    $operador = $_GET['operador'];
}

$errores = 0; 
$correctos = 0;

if($operador == "1"){

    $codEmpresa = $_POST['codEmpresa'];
    $codItem = $_POST['codItem'];
    $invMinimo = $_POST['inventarioMinimo'];
    $agregar = New Producto();

        if ($agregar->asignaProductos($codItem, $codEmpresa, $invMinimo)){
            echo 1;
        }else {
            echo 2;
        }

}

if($operador == "2"){
    $resultado = 0;
    $codEmpresa = $_POST['codEmpresa'];
    $contenidoArchivo = $_FILES['documento'];
    if($_FILES['documento']['tmp_name'] != null){
    $contenidoArchivo = file_get_contents($contenidoArchivo['tmp_name']);
    $contenidoArchivo = explode("\n", $contenidoArchivo);
    $contenidoArchivo = array_filter($contenidoArchivo);
    $agregar = New Producto();


    //preparar los datos
    foreach($contenidoArchivo as $fila){
        $listado[] = explode(";", $fila); 
    }
 
    //insertar los datos
    foreach($listado as $key => $registro){
        $a = $registro[0];
        $b = $registro[1];

        if ($agregar->asignaProductos($a, $codEmpresa, $b)){
            echo ++$key.". Producto <b>".$a." </b>Registrado Correctamente<br>";
        }else{
            echo "<p style='color: red';>".++$key.". Producto <b>".$a." </b>No Registrado</p>";
        }

    }
    }else{
        echo "selecciones un archivo";
    }
    //print_r($listado);
    


    //if ($modificar->modificarEmpresa($codEmpresa, $codigoEmpresaSap, $nombreEmpresa, $estadoEmpresa)){
    //    echo 1;
    //}else {
    //    echo 2;
    //}
}

if($operador=="3"){
    $palabra = htmlentities($_POST['palabra']);
    $almacen = htmlentities($_POST['almacen']);
    $completar = New Producto(); 
    $resultado = $completar->autocompletarProducto($palabra, $almacen);
    echo $resultado;
}
 
if($operador == "4"){
    $codigo = htmlentities($_POST['opciones']);
    $empresa = htmlentities($_POST['empresa']);

    $empresaClass = new Empresa();
    $costoProducto = New Producto();

    $empresa = $empresaClass->codEmpresaSap($empresa);

    $resultado = $costoProducto->precioProducto2($codigo, $empresa);
    echo $resultado;
}

if($operador == "10"){
    $codigo = htmlentities($_POST['opciones']); 
    $empresa = $_SESSION['cod_cliente'];

    $costoProducto = New Producto();

    $resultado = $costoProducto->precioProducto2($codigo, $empresa);
    echo $resultado;
}

if($operador == "5"){
    $codProducto = $_GET['producto'];
    $codEmpresa = $_GET['empresa'];



    $quitar = New Producto();

    if($quitar->eliminarProducto($codProducto, $codEmpresa)){
        header("Location: ../views/productos/asignarProductos.php?delete=1");
    }else{
        header("Location: ../views/productos/asignarProductos.php?delete=2");
    }
}

if($operador == "6"){
    $codigo = htmlentities($_POST['opciones']);
    $costoProducto = New Producto();

    $resultado = $costoProducto->descripcionProducto($codigo);
    echo $resultado;
}

if($operador == "8"){
    $codigo = htmlentities($_POST['opciones']);
    $existenciaProducto = New Producto();
    $almacen = htmlentities($_POST['almacen']);

    $resultado = $existenciaProducto->existenciaProducto($codigo, $almacen);
    echo $resultado;
}

if($operador == "9"){
    $codigo = htmlentities($_POST['opciones']);
    $existenciaProducto = New Producto();
    $almacen = htmlentities($_POST['almacen']);
    $empresa = htmlentities($_POST['empresa']);

    $resultado = $existenciaProducto->existenciaProducto2($codigo, $almacen, $empresa);
    echo $resultado;
}

if($operador=="11"){
    $codigo = htmlentities($_POST['opciones']); 

    $empresa = $_SESSION['cod_cliente'];
    
    if($_SESSION['id_rol']=="1"){
        $empresa = $_POST['empresa'];
    }else{
        $empresa = $_SESSION['cod_cliente'];
    }

    $costoProducto = New Producto();

    $resultado = $costoProducto->precioOrigen($codigo, $empresa);
    echo $resultado;
}

if($operador=="12"){
    $codigo = htmlentities($_POST['opciones']); 
    if($_SESSION['id_rol']=="1"){
        $empresa = $_POST['empresa'];
    }else{
        $empresa = $_SESSION['cod_cliente'];
    }

    $costoProducto = New Producto();

    $resultado = $costoProducto->tipoCambio($codigo, $empresa);
    echo $resultado;
}

?>