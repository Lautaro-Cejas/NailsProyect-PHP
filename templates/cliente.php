<?php

include_once("conexion.php");

session_start();

if (isset($_SESSION['admin'])) {
    header("location:salir.php");
}

$id_usuario = $_SESSION["id"];

$objcx = new Conexion();
$usuarios = $objcx->consultar("SELECT * FROM `usuario` WHERE `id-usuario` = '$id_usuario'");

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
    <title>Perfil</title>
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
                                    <a href="salir.php"><button class="btn btn-outline-danger">Cerrar sesion</button></a>
                                </li>
                            <?php } else if (!isset($_SESSION["id"])) { ?>
                                <li class="nav-item mx-auto">
                                    <a href="login.php"><button class="btn btn-outline-success">Ingresar</button></a>
                                    <a href="registro.php"><button class="btn btn-outline-primary">Registrarme</button></a>
                                </li>
                            <?php } ?>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="../index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="productos.php">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="servicio.php">Atención al cliente</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="terminos.php">Términos de uso</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="mochi navbar-brand m-auto" href="../index.php">M | M</a>
            </div>
        </nav>
    </header>

    <main class="container">
        <div class="row m-0">
            <h1 class="mochi display-1 mt-1 mb-0">Perfil</h1>
            <div class="row bg-light rounded-5 p-0 m-auto vh-100">
                <div class="col-12 m-auto">
                    <div class="row">
                        <div class="col-auto text-center">
                            <img src="../img/logo.png" alt="fotoPerfil" class="img-fluid m-auto" width="350">
                        </div>
                        <div class="col-auto p-auto m-auto text-bg-dark p-4 rounded-5">
                            <h1 class="text-center mochi">Datos</h1>
                            <?php foreach ($usuarios as $usuario) { ?>
                                <h3 class="mochi text-warning">Nombre: <strong class="text-light"><?php echo $usuario["nombre"] ?></strong>
                                </h3>
                                <h3 class="mochi text-warning">Nombre de usuario: <strong class="text-light"><?php echo $usuario["usuario"] ?></strong>
                                </h3>
                                <h3 class="mochi text-warning">Correo electrónico: <strong class="text-light"><?php echo $usuario["correo"] ?></strong>
                                </h3>
                                <h3 class="mochi text-warning">Número de teléfono: <strong class="text-light"><?php echo $usuario["telefono"] ?></strong>
                                </h3>
                            <?php } ?>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </main>

    <footer class="mt-5 bg-light">
        <div class="d-flex flex-wrap justify-content-between align-items-center py-3 my-1 border-top">
            <div class="col-md-4 d-flex align-items-center ms-2">
                <a href="../index.php" class=" me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <img src="../img/logo.png" alt="" width="30">
                </a>
                <span class="text-muted"> © 2022 </span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="img\qr.png"><img src="../img/wpp.png" alt="wppFooter" width="30"></a></li>
                <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/mochi.munay/"><img src="../img/ig.png" alt="igFooter" width="35"></a></li>
                <li class="mx-3"><a class="text-muted" href="https://www.facebook.com/mic.yevara"><img src="../img/fb.png" alt="fbFooter" width="30"></a></li>
            </ul>
        </div>
    </footer>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>