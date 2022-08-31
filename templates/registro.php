<?php

session_start();
session_destroy();
session_start();

include_once("conexion.php");

if ($_POST) {
    if (isset($_POST["nombre"])) {
        $nombre = $_POST["nombre"];
    }
    if (isset($_POST["correo"])) {
        $correo = $_POST["correo"];

        $objcx = new Conexion();
        $sql = "SELECT `correo` FROM `usuario` WHERE `correo` = '$correo'";
        $verificacion = $objcx->consultar($sql);

        if ($verificacion) {
            echo "<script>alert('Este documento ya existe. Ingrese uno válido, por favor.')</script>";
            header("location:registro.php");
        }
    }
    if (isset($_POST["telefono"])) {
        $telefono = $_POST["telefono"];

        $objcx = new Conexion();
        $sql = "SELECT `telefono` FROM `usuario` WHERE `telefono` = '$telefono'";
        $verificacion = $objcx->consultar($sql);

        if ($verificacion) {
            echo "<script>alert('Este teléfono ya existe. Ingrese uno válido, por favor.')</script>";
            header("location:registro.php");
        }
    }
    if (isset($_POST["usuario"])) {
        $usuario = $_POST["usuario"];

        $objcx = new Conexion();
        $sql = "SELECT `usuario` FROM `usuario` WHERE `usuario` = '$usuario'";
        $verificacion = $objcx->consultar($sql);

        if ($verificacion) {
            echo "<script>alert('Este nombre de usuario ya está en uso. Ingrese uno válido, por favor.')</script>";
            header("location:registro.php");
        }
    }
    if (isset($_POST["clave"])) {
        if (isset($_POST["confirmar"])) {
            $confirmar = $_POST["confirmar"];
            if ($confirmar == $_POST["clave"]) {
                $clave = md5($_POST["clave"]);
            } else {
                echo "<script>alert('Las contraseñas no son iguales.')</script>";
                header("location:registro.php");
            }
        }
    }

    $objcx = new Conexion(); 
    $sql = "INSERT INTO `usuario` (`id-usuario`, `nombre`, `usuario`, `telefono`, `correo`, `clave`) VALUES (NULL, '$nombre', '$usuario', '$telefono', '$correo', '$clave')";
    $objcx->ejecutar($sql);
    
    if ($objcx) {
        header("location:login.php");
        echo "<script>alert('Registro completado!')</script>";
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
    <title>Registro</title>
</head>

<body class="container-fluid bg-light">
    <div class="row vh-100">
        <div class="col-lg-5 col-sm-6 bg-login align-self-auto container">
            <div class="row mt-5">
                <div class="col">
                    <p class="display-1 text-center text-bg-info rounded-5">Registro</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-sm-6 bg-light m-auto">
            <a href="../index.php"><button class="btn btn-outline-dark m-1">Volver</button></a>
            <div class="text-bg-dark rounded-5 p-auto m-4">
                <div class="m-auto p-4 col-auto">
                    <form action="registro.php" method="post" class="m-auto justify-content-center align-items-center">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" required class="form-control" placeholder="Ingrese su nombre completo..." aria-describedby="helpId">
                            <small class="text-muted">Utilice su nombre real</small>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" name="correo" required class="form-control" placeholder="Ingrese su correo electrònico..." aria-describedby="helpId">
                            <small class="text-muted">Utilice un correo al que tenga acceso</small>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono o celular</label>
                            <input type="tel" name="telefono" required class="form-control" placeholder="Ingrese su nùmero de teléfono..." aria-describedby="helpId">
                            <small class="text-muted">Utilice un número de teléfono real</small>
                        </div>
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" name="usuario" required class="form-control" placeholder="Ingrese su nombre de usuario..." aria-describedby="helpId">
                            <small class="text-muted">Hasta 16 caracteres</small>
                        </div>
                        <div class="mb-3">
                            <label for="clave" class="form-label">Contraseña</label>
                            <input type="password" name="clave" required class="form-control" minlength="8" maxlength="16" placeholder="Ingrese su contraseña..." aria-describedby="helpId">
                            <small class="text-muted">Contiene 8-16 caracteres. No utilice caracteres acentuados ni acentos, emojis, espacios o caracteres especiales</small>
                        </div>
                        <div class="mb-3">
                            <label for="confirmar" class="form-label">Confirmar contraseña</label>
                            <input type="password" name="confirmar" required class="form-control" placeholder="Ingrese su contraseña de nuevo..." aria-describedby="helpId">
                            <small class="text-muted">Vuelva a escribir su contraseña</small>
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary mb-3">Registrarte</button>
                        </div>
                        <hr class="border mx-auto border-light">
                    </form>
                    <h6>¿Ya tienes una cuenta? <a href="login.php" class="text-decoration-none"><strong class="text-success">Ingresa</strong></a></h6>
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