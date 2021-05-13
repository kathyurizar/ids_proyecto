<?php
        require("../conexion/conexion.php");

$rol = $_POST['rol'];
$nombre = $_POST['nombre'];
$usuario= $_POST['usuario'];
$email = $_POST['correo'];
$clave = $_POST['contra'];

$m1 = md5($clave);
$clave_cifrada=md5($m1);
echo $clave_cifrada;
$sql="SELECT * FROM usuarios WHERE correo='$email';";

$sql="SELECT * FROM usuarios WHERE correo='$email';";

$q = "INSERT INTO `usuarios` (`nombre`, `correo`, `clave`, `rol`, `usuario`, `estado`) 
VALUES ('$nombre','$email', '$clave_cifrada','$rol', '$usuario', 'A')";
$consulta = mysqli_query($conexion,$sql);
if (mysqli_num_rows($consulta)>0){
 echo '<script>alert("ERROR AL CREAR USUARIO")</script> ';
echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
header("location:../registro/registroe.php  ");

}else{
if (mysqli_query($conexion, $q)) {
echo '<script>alert("USUARIO CREADO CON EXITO")</script> ';
header("location: ../login/index.php");
} else {
echo '<script>alert("ERROR AL CREAR USUARIO")</script> ';
echo "Error: " . $q . "<br>" . mysqli_error($conexion);
header("location: ../registro/registroe.php");
}
}
mysqli_close($conexion);
?>