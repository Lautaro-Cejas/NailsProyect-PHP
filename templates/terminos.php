<?php

session_start();

if (isset($_SESSION['admin'])) {
    header("location:salir.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/mochi-logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../scss/custom.css">
    <title>Términos de uso</title>
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
                        <img src="../img/isotipo.png" alt="logoOffcanvas" class="img-fluid m-auto" width="150  ">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <?php if (isset($_SESSION["id"])) { ?>
                                <li class="nav-item mx-auto">
                                    <a href="cliente.php" class="text-decoration-none text-warning">Bienvenid@, <?php echo $_SESSION["user"] ?></a>
                                </li>
                                <li class="nav-item mx-auto">
                                    <a href="salir.php"><button class="btn btn-danger">Cerrar sesion</button></a>
                                </li>
                            <?php } else if (!isset($_SESSION["id"])) { ?>
                                <li class="nav-item mx-auto">
                                    <a href="login.php"><button class="btn btn-outline-success">Ingresar</button></a>
                                    <a href="registro.php"><button class="btn btn-outline-primary">Registrarme</button></a>
                                </li>
                            <?php } ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="productos.php">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="servicio.php">Atención al cliente</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="terminos.php">Términos de uso</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="mochi navbar-brand m-auto" href="../index.php">M | M</a>
                <a class="nav-link" href="carrito.php">
                    <button class="btn btn-light"><img src="../img/carrito.png" alt="carritoNav" width="30">(0)</button>
                </a>
            </div>
        </nav>
    </header>

    <main>
        <div class="row m-auto">
            <div class="col-auto m-auto">
                <h1 class="mochi display-1 mt-5">Términos de uso</h1>
                <div class="container bg-white rounded-2 border border-light m-auto p-auto">
                    <h2>Nuestros imagenes ilustrativas <strong>son sólo el sponsor de nuestros servicios</strong>, es decir, que cuando usted adquiere nuestros productos o servicios está reservando turnos para poder realizarselo en un lugar autorizado por nosotros y hecho por nosotros. Ninguna de las imagenes que puedan llegar a aparecer en los servicios es símbolo de adquisición de los mismo, reiterando <strong>solo se venden turnos para estos.</strong></h2>
                    <h2>El hecho de que no se utilicen imagenes reales no es sinónimo de que la calidad de nuestros servicios sea una farsa o no cumpla con las expectativas. Preferimos mostrar nuestro trabajo de una forma llamativa, sin dejar de lado la atención que necesita el cliente.</h2>
                    <br>
                    <h2>Los turnos que el cliente adquiere <strong>son turnos exclusivos</strong>, es decir que no puede tomar otro turno más que el que se le da. En caso de cambiar su turno usted deberá comunicarse con nosotros para acordar otro turno único. Si está a tiempo usted puede devolver su producto antes de comprar su turno y así poder elegir otro.</h2>
                    <figcaption class="blockquote-footer mt-2">
                        Equipo técnico de <cite title="Source Title">Mochi Munay</cite>
                    </figcaption>
                </div>
            </div>
        </div>
    </main>

    <footer class="mt-5 mb-0 bg-light">
        <div class="d-flex flex-wrap justify-content-between align-items-center py-3 my-1 border-top">
            <div class="col-md-4 d-flex align-items-center ms-2">
                <a href="../index.php" class=" me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <img src="../img/logo.png" alt="" width="30">
                </a>
                <span class="text-muted"> © 2022 </span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="../img/qr.png"><img src="../img/wpp.png" alt="wppFooter" width="30"></a></li>
                <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/mochi.munay/"><img src="../img/ig.png" alt="igFooter" width="35"></a></li>
                <li class="mx-3"><a class="text-muted" href="https://www.facebook.com/mic.yevara"><img src="../img/fb.png" alt="fbFooter" width="30"></a></li>
            </ul>
        </div>
    </footer>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>