<?php

//Pantalla para login de cliente

require 'config/config.php';
require 'clases/clienteFunciones.php';

$db = new Database();
$con = $db->conectar();

$proceso = isset($_GET['pago']) ? 'pago' : 'login';

$errors = [];

if (!empty($_POST)) {

    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
    $proceso = $_POST['proceso'] ?? 'login';

    if (esNulo([$usuario, $password])) {
        $errors[] = "Debe llenar todos los campos";
    }

    if (empty($errors)) {
        $errors[] = login($usuario, $password, $con, $proceso);
    }
}


?>
<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en linea</title>

    <link href="<?php echo SITE_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
    <style>
        .log {
            max-width: 250px;
        }
    </style>

</head>

<body class="body-login" style="background-image: url('images/FondoLogin.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">


    <?php include 'header.php'; ?>

    <!-- Contenido -->
    <main class="form-login m-auto pt-4 text-center mt-5">
        <i class="log fas fa-users fa-5x"></i> <!-- Cambié el tamaño a fa-3x -->
        <h2>Iniciar sesión</h2>

        <?php mostrarMensajes($errors); ?>

        <form class="row g-3 mt-4" action="login.php" method="post" autocomplete="off">

            <input type="hidden" name="proceso" value="<?php echo $proceso; ?>">

            <div class="form-floating">
                <input class="form-control" type="text" id="usuario" name="usuario" placeholder="Usuario" required autofocus>
                <label for="usuario">Usuario</label>
            </div>
            <div class="form-floating">
                <input class="form-control" type="password" id="password" name="password" placeholder="Contraseña" required>
                <label for="password">Contraseña</label>
            </div>

            <div class="col-12">
                <a href="recupera.php">¿Olvidaste tu contraseña?</a>
            </div>

            <div class="d-grid gap-3 col-8 mx-auto">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>

            <hr>
            <div class="col-12 text-center">
                ¿No tiene cuenta? <a href="registro.php">Registrate aquí</a>
            </div>
        </form>
        </div>
    </main>

    <script src="<?php echo SITE_URL; ?>js/bootstrap.bundle.min.js"></script>

</body>

</html>