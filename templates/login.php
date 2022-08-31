<?php

session_start();
session_destroy();
include_once("conexion.php");

if ($_POST) {
    if (isset($_POST["usuario"])) {
        $usuario = $_POST["usuario"];
    }
    if (isset($_POST["clave"])) {
        $clave = md5($_POST["clave"]);
    }

    $objcx = new Conexion();
    $sql = "SELECT * FROM `usuario` WHERE `usuario` = '$usuario' AND `clave` = '$clave'";
    $usuarios = $objcx->consultar($sql);
    $admins = $objcx->consultar("SELECT * FROM `admin` WHERE `admin` = '$usuario' AND `clave` = '$clave'");
    
    if ($admins) {
        foreach ($admins as $admin) {
            session_start();
            $_SESSION["id-admin"] = $admin["id-admin"];
            $_SESSION["admin"] = $admin["admin"];
        }
        header("location:admin.php");
    } else if ($usuarios) {
        foreach ($usuarios as $usuario) {
            session_start();
            $_SESSION["sesion"] = session_id(uniqid('user_session', true));
            $_SESSION["id"] = $usuario["id-usuario"];
            $_SESSION["user"] = $usuario["usuario"];
            $_SESSION["email"] = $usuario["correo"];
            $_SESSION["phone"] = $usuario["telefono"];
        }
        header("location:../index.php");
    } else {
        echo '<div class="alert alert-danger">Usuario o contraseña incorrecto,</div>';
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
    <title>Iniciar sesión</title>
</head>

<body class="container-fluid bg-light">
    <div class="row vh-100">
        <div class="col-lg-5 col-sm-6 bg-login align-self-auto container">
            <div class="row mt-5">
                <div class="col">
                    <p class="display-1 text-center text-bg-info rounded-5">Por favor, identifiquese</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-sm-6 bg-light m-auto">
            <a href="../index.php"><button class="btn btn-outline-dark m-1">Volver</button></a>
            <div class="mt-4 rounded-5 text-bg-dark">
                <h1 class="text-center"><strong class="display-2">
                        Iniciar sesión
                    </strong></h1>
            </div>
            <div class="text-bg-dark rounded-5 p-auto m-5">
                <div class="m-auto p-md-5 p-4 col-auto">
                    <form action="" method="post" class="m-auto justify-content-center align-items-center">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" name="usuario" class="form-control" placeholder="Ingrese su nombre de usuario..." aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="clave" class="form-label">Contraseña</label>
                            <input type="password" name="clave" class="form-control" placeholder="Ingrese su contraseña..." aria-describedby="helpId">
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-success mb-3">Ingresar</button>
                        </div>
                        <hr class="border mx-auto border-light">
                    </form>
                    <h6>¿No tienes una cuenta? <a href="registro.php" class="text-decoration-none"><strong class="text-primary">Registrate</strong></a></h6>
                    <div class="text-end">
                        <a href="../index.php" class="me-1 text-muted text-decoration-none lh-1">
                            <img src="../img/logo.png" alt="" width="30">
                        </a>
                        <span class="text-muted">© 2022 </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>