<?php

include_once("conexion.php");

session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../index.php");
}

$cx = new Conexion();
$quejas = $cx->consultar("SELECT * FROM `quejas`");

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
    <title>Quejas</title>
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
                        <img src="../img/isotipo.png" alt="logoOffcanvas" class="../img-fluid m-auto" width="150  ">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item mx-auto">
                                <a href="cliente.php" class="text-decoration-none text-warning">Bienvenid@, <?php echo $_SESSION["admin"] ?></a>
                            </li>
                            <li class="nav-item mx-auto">
                                <a href="salir.php"><button class="btn btn-danger">Cerrar sesion</button></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="admin.php">Inicio</a>
                            <li class="nav-item ">
                                <a class="nav-link active" href="quejas.php">Comentarios</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="mochi navbar-brand mx-auto" href="admin.php">M | M</a>
            </div>
        </nav>
    </header>

    <main class="container">
        <div class="row m-0">
            <h1 class="mochi display-1 my-1">Quejas</h1>
            <div class="row bg-light rounded-5 m-auto vh-100">
                <div class="col-auto m-auto">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="fw-bolder">Nombre del emisor</th>
                                <th scope="col" class="fw-bolder">Correo electrónico</th>
                                <th scope="col" class="fw-bolder">Asunto</th>
                                <th scope="col" class="fw-bolder">Queja/Mensaje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($quejas as $queja) { ?>
                                <tr>
                                    <th scope="row"><?php echo $queja["nombre"] ?></th>
                                    <td><?php echo $queja["correo"] ?></td>
                                    <td><?php echo $queja["asunto"] ?></td>
                                    <td><?php echo $queja["mensaje"] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer class="mt-5 bg-light">
        <div class="d-flex flex-wrap justify-content-between align-items-center py-3 my-1 border-top">
            <div class="col-md-4 d-flex align-items-center ms-2">
                <a href="index.php" class=" me-2 mb-md-0 text-muted text-decoration-none lh-1">
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