<?php

session_start();

if (isset($_SESSION['admin'])) {
    header("location:salir.php");
}

include_once("conexion.php");

$objcx = new Conexion();
$sql = "SELECT * FROM `producto`";
$productos = $objcx->consultar($sql);

$id_sesion = '';
$id_usuario = '';

if ($_SESSION) {
    $id_sesion = $_SESSION["sesion"];
    $id_usuario = $_SESSION["id"];
}
$estaEnCarrito = $objcx->consultar("SELECT * FROM `carrito` WHERE `id-sesion` = '$id_sesion' AND `id-usuario` = '$id_usuario'");

if (isset($_SESSION["id"])) {
    if ($_GET) {
        if (isset($_GET["agregar"])) {
            $id_producto = $_GET["agregar"];
            $estado = "En proceso";
            $id_sesion = $_SESSION["sesion"];
            $cx = new Conexion();
            $disponibles = $cx->consultar("SELECT `stock` FROM `producto` WHERE `id-producto` = '$id_producto'");
            foreach ($dispobibles as $disponible) {
                if ($disponible >= 1) {
                    $cx->ejecutar("INSERT INTO `carrito` (`id-sesion`,`id-producto`,`id-usuario`,`id-turno`,`estado`) VALUES ('$id_sesion', '$id_producto', '$id_usuario',NULL, '$estado')");
                }
            }
            header("location:productos.php");
        }
        if (isset($_GET["cancelar"])) {
            $id_producto = $_GET["cancelar"];
            $cx = new Conexion();
            $cx->ejecutar("DROP WHERE `id-producto` = '$id_producto' AND `id-usuario` = '$id_usuario'");
        }
    }
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
    <title>Productos</title>
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
                        <img src="../img/isotipo.png" alt="logoOffcanvas" class="img-fluid m-auto" width="150">
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
                                <a class="nav-link" aria-current="page" href="../index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="productos.php">Productos</a>
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
                <a class="nav-link" href="carrito.php">
                    <button class="btn btn-light"><img src="../img/carrito.png" alt="carritoNav" width="30">(0)</button>
                </a>
            </div>
        </nav>
    </header>

    <main class="mb-5">
        <div class="row m-0 justify-content-end align-items-center">
            <h1 class="text-center mochi mt-4">Productos y servicios disponibles</h1>
            <?php foreach ($productos as $producto) { ?>
                <div class="col-md-3 col-sm-6 mx-auto mb-5 my-1">
                    <div class="card border-light rounded-5">
                        <img src="data:image/png;base64,<?php echo base64_encode($producto["img"]) ?>" class="card-img-top img-fluid" alt="imgCard">
                        <div class="card-body text-bg-dark">
                            <h5 class="card-title fw-bolder text-center"><?php echo $producto["producto"] ?></h5>
                            <p class="card-text"><?php echo substr($producto["descripcion"], 0, 90) . "..." ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-success">$<?php echo $producto["precio"] ?></li>
                            <li class="list-group-item text-bg-warning"><?php echo $producto["categoria"] ?></li>
                            <?php if ($producto["stock"] >= 1) { ?>
                                <li class="list-group-item text-primary">En stock</li>
                            <?php } else { ?>
                                <li class="list-group-item text-danger">No disponible</li>
                            <?php } ?>
                        </ul>
                        <div class="card-body mx-auto">
                            <?php if (isset($_SESSION["sesion"])) { ?>
                                <?php if (isset($_GET)) { ?>
                                    <a href="?agregar=<?php echo $producto["id-producto"] ?>" class="card-link"><button class="btn btn-success btn-lg">Agregar al carrito</button></a>
                                <?php } else { ?>
                                    <button class="btn btn-primary disabled">En el carrito</button>
                                    <a href="?cancelar=<?php echo $producto["id-producto"] ?>" class="card-link">
                                        <button class="btn btn-danger">Cancelar</button>
                                    </a>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="alert alert-warning">Debe ingresar para comprar</div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
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
                <li class="ms-3"><a class="text-muted" href="../img/qr.png"><img src="../img/wpp.png" alt="wppFooter" width="30"></a></li>
                <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/mochi.munay/"><img src="../img/ig.png" alt="igFooter" width="40"></a></li>
                <li class="ms-2"><a class="text-muted" href="https://www.facebook.com/mic.yevara"><img src="../img/fb.png" alt="fbFooter" width="30"></a></li>
            </ul>
        </div>
    </footer>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>