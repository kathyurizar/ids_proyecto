
<?php

include_once "../model/usuario.php"; 
include_once "../model/class.db.php"; 
$operador = htmlentities($_POST['operador']);

//nuevo usuario
if($operador == "1"){
    $codEmpresa = "";
    if($_POST['tipo']=="1") {
        $codEmpresa = htmlentities($_POST['codEmpresa']);
    }else{
        $codEmpresa = 0;
    }
    $nombreCompleto = htmlentities($_POST['nombreCompleto']);
    $usuario = htmlentities($_POST['usuario']);
    $clave = htmlentities($_POST['clave']);
    $correo = htmlentities($_POST['correo']);
    $codRol = htmlentities($_POST['codRol']);
    $estado = htmlentities($_POST['estado']);

    $agregar = New Usuario();


    if ($agregar->registrarUsuario($codEmpresa, $nombreCompleto, $usuario, $clave, $correo, $codRol, $estado)){
        echo 1;
    }else {
        echo 2;
    }
}

//Asignar almacen al usuario
if($operador == "2"){
    $codAlmacen = htmlentities($_POST['codAlmacen']);
    $codUsuario = htmlentities($_POST['codUsuario']);
    $codEmpresa = htmlentities($_POST['codEmpresa']);

    $asignaAlmacen = New Usuario();

    if ($asignaAlmacen->asignarAlmacen($codAlmacen, $codUsuario, $codEmpresa)){
        echo 1;
    }else {
        echo 2;
    }

}

//Modificar datos del usuario
if($operador == "3"){
    $codUsuario = $_POST['codUsuario'];
    $nombreUsuario = $_POST['nombreUsuario'];
    //$usuario = $_POST['usuario'];
    $codEmpresa = "";
    if($_POST['tipo']=="1") {
        $codEmpresa = htmlentities($_POST['codEmpresa']);
    }else{
        $codEmpresa = 0;
    }

    $correo = $_POST['correo'];
    $estado = $_POST['estado'];
    $codRol = $_POST['codRol'];

    $modificar = New Usuario();

    if($_POST['contra']==""){
        if ($modificar->modificarUsuario($codUsuario, $nombreUsuario, $correo, $estado, $codRol, $codEmpresa)){
            echo 1;
        }else {
            echo 2;
        }
    }else{
        $contra = $_POST['contra'];
        if ($modificar->modificarUsuarioC($codUsuario, $nombreUsuario, $correo, $estado, $codRol, $codEmpresa, $contra)){
            echo 1;
        }else {
            echo 2;
        }
    }





}

?>