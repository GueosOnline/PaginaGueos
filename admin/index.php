<?php

//Pantalla para login de administración

require 'config/config.php';
require 'clases/adminFunciones.php';

$db = new Database();
$con = $db->conectar();

$errors = [];

if (!empty($_POST)) {
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    if (esNulo([$usuario, $password])) {
        $errors[] = "Debe llenar todos los campos";
    }

    if (empty($errors)) {
        $errors[] = login($usuario, $password, $con);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Marco Robles" />
    <title>Inicio de sesión - Tienda Online</title>
    <link href="css/styles.css" rel="stylesheet" />

    <style>
        body {
            background-image: url('images/FondoLoginAdmin.jpg');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .form-floating input:focus+label {
            color: white !important;
        }
    </style>
</head>

<body class="bg-aprimary bga-gradient">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main class="m-auto pt-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">

                            <div class=" mb-5 mt-5 mx-auto" style="max-width: 350px;">
                                <img src="../images/logos/LogoGueos.jpg" class="img-fluid">
                            </div>

                            <div class="card-header">
                                <h3 class="text-center text-light">Iniciar sesion</h3>
                                <p class="text-center mb-4 text-light">Administrador</p>
                            </div>

                            <div class="card-body">

                                <form action="index.php" method="post" autocomplete="off">

                                    <div class="form-floating mb-3 col-6 mx-auto">
                                        <input class="form-control text-light" id="usuario" name="usuario" type="text" autofocus style="background-color: rgba(0, 0, 0, 0.7); color:white;" required />
                                        <label for="password" style="color: black;">Usuario</label>
                                    </div>

                                    <div class="form-floating mb-3 col-6 mx-auto">
                                        <input class="form-control text-light" id="password" name="password" type="password" style="background-color: rgba(0, 0, 0, 0.7);" required />
                                        <label for="password" style="color: black;">Contraseña</label>
                                    </div>

                                    <?php mostrarMensajes($errors); ?>

                                    <div class="d-grid col-3 mx-auto">
                                        <button type="submit" class="btn" style="background-color:	#f58021;">Ingresar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>