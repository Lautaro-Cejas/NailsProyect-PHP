<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/mochi-logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="scss/custom.css">
    <title>Iniciardo</title>
</head>

<body class="fondo">
    <header class="mb-5">
        <nav class="navbar bg-light fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <img src="img/isotipo.png" alt="logoOffcanvas" class="img-fluid m-auto" width="150  ">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <?php if (isset($_SESSION["id"])) { ?>
                                <li class="nav-item mx-auto">
                                    <a href="templates/cliente.php" class="text-decoration-none text-warning">Bienvenid@, <?php echo $_SESSION["user"] ?></a>
                                </li>
                                <li class="nav-item mx-auto">
                                    <a href="templates/salir.php"><button class="btn btn-danger">Cerrar sesion</button></a>
                                </li>
                            <?php } else if (!isset($_SESSION["id"])) { ?>
                                <li class="nav-item mx-auto">
                                    <a href="templates/login.php"><button class="btn btn-outline-success">Ingresar</button></a>
                                    <a href="templates/registro.php"><button class="btn btn-outline-primary">Registrarme</button></a>
                                </li>
                            <?php } ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="templates/productos.php">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="templates/servicio.php">Atención al cliente</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="templates/terminos.php">Términos de uso</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="mochi navbar-brand m-auto" href="index.php">M | M</a>
                <a class="nav-link" href="templates/carrito.php">
                    <button class="btn btn-light"><img src="img/carrito.png" alt="carritoNav" width="30">(0)</button>
                </a>
            </div>
        </nav>
    </header>

    <main>
        <header class="m-5">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/banner-1.png" class="d-block w-100 img-fluid rounded-5" alt="carousel1">
                    </div>
                    <div class="carousel-item">
                        <img src="img/banner-2.png" class="d-block w-100 img-fluid rounded-5" alt="carousel2">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </header>
        <main>
            <div class="p-3 m-5 bg-light rounded-5">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold mochi">Mochi Munay</h1>
                    <p class="col-sm-8 fs-4">Te ofrecemos el mejor servicio para decorar y cuidar tus uñas con las mejores estilistas. No pierdas tu tiempo y veni a quedar como una bichota!</p>
                    <a href="templates/productos.php">
                        <button class="btn btn-info btn-lg" type="button">Empezar a reservar</button>
                    </a>
                </div>
            </div>
        </main>
    </main>

    <footer class="mt-5 bg-light">
        <div class="d-flex flex-wrap justify-content-between align-items-center py-3 my-1 border-top">
            <div class="col-md-4 d-flex align-items-center ms-2">
                <a href="index.php" class=" me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <img src="img/logo.png" alt="" width="30">
                </a>
                <span class="text-muted"> © 2022 </span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="img\qr.png"><img src="img/wpp.png" alt="wppFooter" width="30"></a></li>
                <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/mochi.munay/"><img src="img/ig.png" alt="igFooter" width="35"></a></li>
                <li class="mx-3"><a class="text-muted" href="https://www.facebook.com/mic.yevara"><img src="img/fb.png" alt="fbFooter" width="30"></a></li>
            </ul>
        </div>
    </footer>

    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>