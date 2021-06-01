<?php

    include_once "../model/categoria.php"; 
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

        $categoria = $_POST['categoria'];

        $categoria_model = new Categoria();

        if($categoria_model->nuevaCategoria($categoria)){
            header('Location: ../views/productos/categoria_catalogo.php');
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