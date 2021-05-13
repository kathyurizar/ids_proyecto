<?php 
  @session_start();
  include '../layout/header.php'; 
  if(isset($_SESSION['user'])){
    header('location:../home');
  }
?>
<main id="app">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center mt-2">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block p-5">
                <img src="../../img/usuario.svg" class="img-fluid">
              </div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Inicia sesión para continuar</h1>
                      <hr>
                    </div>

                    <form class="user" id="inicioSesion" autocomplete="off" @submit.prevent="login">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="user" id="user" placeholder="Usuario" required>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="pass" id="pass" placeholder="Contraseña" required pattern="[A-Za-z0-9]{2,10}">
                      </div>
                      <input type="submit" value="Iniciar Sesión" class="btn btn-primary btn-user btn-block">
                      <br>
                      <br>
                      <p>¿No tienes una cuenta? <a class="link" href="../registro/registroe.php">Registrate </a></p></a></p>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </main>
  

  <?php include '../layout/footer.php'; ?>