<?php 
  include '../layout/header.php'; 
?>

<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Registro Usuario</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<br>
<div class="container" style="max-width: 650px; min-width: 400px;">
  <div class="card">
    <h2 class="card-header text-center">Formulario de Registro</h2>
    <div class="card-body">
      <form method="POST" action="../registro/regisql.php">
        <div class="form-group">
          <legend>Datos de la Cuenta</legend>
          <label for="user">Nombre completo:</label>
          <input type="text" class="form-control" name="nombre" placeholder="nombre">
          <label for="email">Correo Electronico:</label>
          <input type="email" class="form-control" name="correo" placeholder="nombre@ejemplo.com">
          <label for="Pass1">Contraseña:</label>
          <input type="password" class="form-control" name="contra" placeholder="Contraseña">
          <label for="codipos">Usuario:</label>
          <input type="text" class="form-control" name="usua" placeholder="usuario">
        </div>

        <div class="form-group">
          <legend>Tipo de usuario</legend>
          <label for="rol">ROL:</label>
          <input type="radio" value="1" name="rol">ADMINISTRADOR
          <input type="radio" value="2" name="rol"> USUARIO<br>
          </select>      
          <label for="terminos">Legalidades:</label><br>
          <input type="checkbox" id="terminos"> Acepto los términos y condiciones          
        </div>
        <input type="submit" class="btn btn-success" id="boton" value="Registrar">
      </form>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>
