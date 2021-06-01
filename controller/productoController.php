<?php

    include_once "../model/producto.php"; 
    include_once "../model/class.db.php";

    $operador = 0;

    if(isset($_POST['operador'])) {
        $operador = htmlentities($_POST['operador']);
    }else{
        $operador = $_GET['operador'];
    }

    $errores = 0; 
    $correctos = 0;

    if($operador == "1"){

        $codigo = $_POST['codigo'];
        $descripcion = $_POST['descripcion'];
        $serie = $_POST['serie'];
        $existencia = intval($_POST['existencias']);
        $precio_costo = intval($_POST['precio_costo']);
        $precio_general = intval($_POST['precio_general']);
        $precio_mayoreo = intval($_POST['precio_mayoreo']);
        $subcategoria = intval($_POST['subcategoria']);
        $minimo = intval($_POST['minimo']);
        $imagen = 'logo.jpg';
        
        print_r($codigo);
        $producto = new Producto();

        if($producto->nuevoProducto($codigo, $descripcion, $serie, $existencia, $precio_general, $precio_mayoreo, $subcategoria, $imagen, $precio_costo, $minimo)){
            header('Location: ../views/productos/producto_catalogo.php');
        }else{
            echo "no guardado";
        }
    }

    if($operador== "2"){
        $codigo = $_POST['codigo'];
        $existencia = intval($_POST['existencia']);
        $agregado = intval($_POST['cantidadAgregada']);
        $precio_costo = intval($_POST['precio_costo']);
        $precio_costo_anterior = intval($_POST['precio_costo_anterior']);
        $precio_general = intval($_POST['precio_general']);
        $precio_mayoreo = intval($_POST['precio_mayoreo']);
        $factura = intval($_POST['factura']);

        $producto = new Producto();

        if($producto->modificarProducto_compra($codigo, $existencia, $agregado, $precio_costo, $precio_general, $precio_mayoreo, $factura, $precio_costo_anterior)){
            header('Location: ../views/productos/producto_catalogo.php');
        }else{
            echo "no guardado";
        }
    }

    

?>