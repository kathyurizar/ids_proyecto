<?php

    include_once "../model/subcategoria.php"; 
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
        $subcategoria = $_POST['subcategoria'];

        $categoria_model = new Subcategoria();

        if($categoria_model->nuevaSubCategoria($subcategoria, $categoria)){
            header('Location: ../views/productos/subcategoria_catalogo.php');
        }else{
            echo "no guardado";
        }
    }

?>