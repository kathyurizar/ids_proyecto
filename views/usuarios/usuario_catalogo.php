<?php 
  @session_start();
  include '../layout/header.php'; 
  if(!isset($_SESSION['user'])){
    header('location:../login');
  }
  if($_SESSION['id_rol']!=1){//ingreso solo de administrador
    header('location:../home/index.php');
  }
  include '../layout/menu.php';

?>
    <main id="app">
    <div class="container-fluid p-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-danger" href="../home">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid pl-4 pr-4 pb-4">
        
            <!-- Content Row -->
            <div class="row justify-content-center">
                <div class="col-12 mt-3">
                    <div class="table-responsive">
                        <table id="tablaDiseno" class="table table-striped table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Estado</th>
                                <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr> 
                                        <th><?php ?></th>
                                        <td><?php ?></td>
                                        <td><?php ?></td>
                                        <td>
                                            
                                            <div class="badge badge-secondary text-wrap" style="width: 6rem;">Inactivo</div>
                                            
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-danger btn-sm">
                                                Detalles
                                            </a>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>


<?php include '../layout/footer.php'; ?>




