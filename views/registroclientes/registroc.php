<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>



        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="#">DICAMA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false"aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Compras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Cotización</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                                    Cuenta
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                    Carrito
                                </a>
                            </li>
                        </ul>
                    </span>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand"></a>
                <form class="d-flex">
                <input class="form-control me-2 form-control-sm" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-danger btn-sm" type="submit">Buscar</button>
                </form>
                <a class="navbar-brand"></a>
            </div>
        </nav>

        <!-- menu carrito de compras -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">Carrito de Compras</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                ...
            </div>
        </div>

        <!--- Menu cuenta del cliente -->
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasBottomLabel">Cuenta</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body small">
                <div class="row">
                    <div class="col-12 col-md-4">
                        Detalles de la cuenta
                    </div>
                    <div class="col-12 col-md-2">
                        Opciones <br>
                        <div class="row">
                                <div class="d-grid gap-2">
                                <p>¿No tienes una cuenta? <a class="link" href="../registroclientes/registroc.php">Registrate </a></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col m-1">
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-outline-danger btn-sm">Actualizar datos</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-1">
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-outline-danger btn-sm">Ayuda</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-1">
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-outline-danger btn-sm">Aplicar a Mayorista</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>