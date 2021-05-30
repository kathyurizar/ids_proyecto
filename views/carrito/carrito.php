<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript"  href="../js/scripts.js"></script>
</head>
<body>
	<header>
		<h1>Carrito De Compras</h1>
		<a href="../carritodecompras.php" title="ver carrito de compras">
			<img src="../imagenes/carrito.png">
		</a>
	</header>
	<section>
		
	<?php
	require("../conexion/conexion.php");
    $sql="SELECT nombre, img, cod_prod FROM producto";
	$query=mysqli_query($conexion,$sql);
	while($arreglo=mysqli_fetch_array($query)){
		echo '<div class="producto">';
		echo "<center>";
              echo '<img src="../productos/'.$arreglo[1].'"><br>';
              echo '<span>'.$arreglo[0].'</span><br>';
	   echo'</center>';
	   echo'</div>';
	}
	?>
	</body>
</html>
