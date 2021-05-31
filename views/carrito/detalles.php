<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<img src="./imagenes/dicama.jpg" id="logo">
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>
	<section>
		
	<?php
       require("../conexion/conexion.php");
		$sql="SELECT * FROM producto WHERE cod_prod=".$_GET['id'];
        $re=mysqli_query($conexion,$sql);
        while ($f=mysqli_fetch_array($re)) {
		?>	
			<center>
				<img src="./productos/<?php echo $f['img'];?>"><br>
				<span><?php echo $f['nombre'];?></span><br>
				<span>Precio: <?php echo $f['precio_gen'];?></span><br>
				<a href="./carritodecompras.php?id=".$_GET['id']>Añadir al carrito de compras</a>
			</center>
	<?php
		}
	?>		
	</section>
</body>
</html>