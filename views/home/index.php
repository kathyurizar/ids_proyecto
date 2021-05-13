<?php 
  @session_start();
  include '../layout/header.php'; 
  if(!isset($_SESSION['user'])){
    header('location:../login');
  }
  include '../layout/menu.php';

  include '../../model/dashboard.php';
 
  $dash = New Dashboard();

?>

  <div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total de Ventas en Línea</div>
                <div class="h2 mb-0 font-weight-bold text-gray-800">0</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-car-side fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total de clientes Activios en Línea</div>
                <div class="h2 mb-0 font-weight-bold text-gray-800"><?php echo 0 ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users-cog fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total de Ingresos registrados</div>
                <div class="h2 mb-0 font-weight-bold text-gray-800">Q <?php echo 0 ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-coins fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total de Ingresos registrados</div>
                <div class="h2 mb-0 font-weight-bold text-gray-800">Q <?php echo 0 ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-coins fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-xl-6 col-sm-12 col-md-12 mb-2 col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3 text-center">
            <h6 class="m-0 font-weight-bold text-danger">Top 10 Productos mas Vendidos</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Código</th>
                    <th scope="col">Número</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Facturado Q</th>
                  </tr>
                </thead>
                <tbody>
                  <?php for($i = 0; $i<5; $i++){ ?>
                    <tr>
                      <th scope="row"><?php echo 0 ?></th>
                      <td><?php echo 102203 ?></td>
                      <td><?php echo 230902 ?></td>
                      <td><?php echo "Producto" ?></td>
                      <td><?php echo "Q 2000.00 " ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-2">
          <h1>Reportes</h1>
          <button class="btn btn-outline-dark btn-sm m-1">Reporte de Ventas</button>
          <button class="btn btn-outline-dark btn-sm m-1">Reporte de Inventario</button>
          <button class="btn btn-outline-dark btn-sm m-1">Reporte de Utilidades</button>
          <button class="btn btn-outline-dark btn-sm m-1">Inventario Bajo</button>
      </div>
    </div>
  </div>
</div>

<!-- footer -->
<footer class="sticky-footer bg-dark">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span class="text-white">DICAMA © 2021</span>
    </div>
  </div>
</footer>

<?php include '../layout/footer.php'; ?>
