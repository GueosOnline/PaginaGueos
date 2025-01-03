<?php

//Pantalla para registro de cliente

require 'config/config.php';
require 'clases/clienteFunciones.php';

$db = new Database();
$con = $db->conectar();

$errors = [];

if (!empty($_POST)) {

    $nombres = trim($_POST['nombres']);
    $apellidos = trim($_POST['apellidos']);
    $email = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);
    $cedula = trim($_POST['cedula']);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);


    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    $secretkey = "6LfofqcqAAAAAFET5lfdhheMwH4E03v4UaP7mA1a"; //llave secreta

    $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");

    $atributos = json_decode($respuesta, TRUE);

    if (!$atributos['success']) {
        $errors[] = "Verificar el reCAPTCHA";
    }

    if (esNulo([$nombres, $apellidos, $email, $telefono, $cedula, $usuario, $password, $repassword])) {
        $errors[] = "Debe llenar todos los campos";
    }

    if (!esEmail($email)) {
        $errors[] = "La dirección de correo no es válida";
    }

    if (!validaPassword($password, $repassword)) {
        $errors[] = "Las contraseñas no coinciden";
    }

    if (usuarioExiste($usuario, $con)) {
        $errors[] = "El nombre de usuario $usuario ya existe";
    }

    if (emailExiste($email, $con)) {
        $errors[] = "El correo electrónico $email ya existe";
    }

    if (empty($errors)) {

        $id = registraCliente([$nombres, $apellidos, $email, $telefono, $cedula], $con);

        if ($id > 0) {

            require 'clases/Mailer.php';
            $mailer = new Mailer();
            $token = generarToken();
            $pass_hash = password_hash($password, PASSWORD_DEFAULT);

            $idUsuario = registraUsuario([$usuario, $pass_hash, $token, $id], $con);
            if ($idUsuario > 0) {

                $url = SITE_URL . 'activa_cliente.php?id=' . $idUsuario . '&token=' . $token;
                $asunto = "Activar cuenta - Tienda online";
                $cuerpo = "Estimado $nombres: <br> Para continuar con el proceso de registro es indispensable de clic en la siguiente liga <a href='$url'>Activar cuenta</a>";

                if ($mailer->enviarEmail($email, $asunto, $cuerpo)) {
                    echo "<script>
                        alert('Para terminar el proceso de registro siga las instrucciones que le hemos enviado a la dirección de correo electrónico $email');
                        window.location.href = 'login.php';
                      </script>";
                    exit;
                }
            } else {
                $errors[] = "Error al registrar usuario";
            }
        } else {
            $errors[] = "Error al registrar cliente";
        }
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

    <!--Implemntacion de recaptcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <link href="<?php echo SITE_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body class="body-login" style="background-image: url('images/FondoLogin.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">

    <?php include 'header.php'; ?>

    <!-- Contenido -->
    <main class="flex-shrink-0">
        <div class="container">
            <div class="d-flex justify-content-center mb-2">
                <i class="fas fa-book fa-4x"></i>
            </div>
            <h3 class="text-center">Datos de registro</h3>

            <?php mostrarMensajes($errors); ?>

            <form class="row g-3 justify-content-center mt-4" action="registro.php" method="post" autocomplete="off">

                <div class="row w-100 justify-content-center">
                    <div class="col-md-3">
                        <label for="nombres"><span class="text-danger">*</span> Nombres</label>
                        <input type="text" name="nombres" id="nombres" class="form-control" value="<?php echo isset($_POST['nombres']) ? $_POST['nombres'] : ''; ?>" required>
                    </div>
                    <div class="col-md-3">
                        <label for="apellidos"><span class="text-danger">*</span> Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" class="form-control" value="<?php echo isset($_POST['apellidos']) ? $_POST['apellidos'] : ''; ?>" required>
                    </div>
                </div>

                <div class="row w-100 justify-content-center">
                    <div class="col-md-3">
                        <label for="email"><span class="text-danger">*</span> Correo electrónico</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
                        <span id="validaEmail" class="text-danger"></span>
                    </div>
                    <div class="col-md-3">
                        <label for="telefono"><span class="text-danger">*</span> Telefono</label>
                        <input type="tel" name="telefono" id="telefono" class="form-control" value="<?php echo isset($_POST['telefono']) ? $_POST['telefono'] : ''; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '');" pattern="^[1-9]{1}[0-9]{9}$" title="No es un numero valido. El telefono debe tener 10 dígitos y no comenzar con 0." required>
                    </div>
                </div>

                <div class="row w-100 justify-content-center">
                    <div class="col-md-3">
                        <label for="cedula"><span class="text-danger">*</span> Cedula</label>
                        <input type="text" name="cedula" id="cedula" class="form-control" value="<?php echo isset($_POST['cedula']) ? $_POST['cedula'] : ''; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '');" pattern="^[1-9]{1}[0-9]{5,9}$" title="No es un numero valido." required>
                    </div>
                    <div class="col-md-3">
                        <label for="usuario"><span class="text-danger">*</span> Usuario</label>
                        <input type="text" name="usuario" id="usuario" class="form-control" value="<?php echo isset($_POST['usuario']) ? $_POST['usuario'] : ''; ?>" required>
                        <span id="validaUsuario" class="text-danger"></span>
                    </div>
                </div>

                <div class="row w-100 justify-content-center">
                    <div class="col-md-3">
                        <label for="password"><span class="text-danger">*</span> Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="col-md-3">
                        <label for="repassword"><span class="text-danger">*</span> Repetir contraseña</label>
                        <input type="password" name="repassword" id="repassword" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-3 text-center">
                    <i><b>Nota:</b> Los campos con asterisco son obligatorios</i>
                    <hr>
                </div>
                <div class="row w-100 justify-content-center d-flex align-items-center">

                    <div class="col-md-3 text-center ">
                        <div class="g-recaptcha" data-sitekey="6LfofqcqAAAAACQ8aKiBzA9vzFCSEK1FcFwoJD2J"></div> <!--llave publica-->
                    </div>

                    <div class="col-md-3 text-center align-items-center ">
                        <button type="submit" class="btn btn-primary" style="width: 50%;">Registrar</button>
                    </div>
                </div>
            </form>

        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script src="<?php echo SITE_URL; ?>js/bootstrap.bundle.min.js"></script>

    <script>
        let txtUsuario = document.getElementById('usuario')
        txtUsuario.addEventListener("blur", function() {
            existeUsuario(txtUsuario.value)
        }, false)

        let txtEmail = document.getElementById('email')
        txtEmail.addEventListener("blur", function() {
            existeEmail(txtEmail.value)
        }, false)

        function existeEmail(email) {
            let url = "clases/clienteAjax.php"
            let formData = new FormData()
            formData.append("action", "existeEmail")
            formData.append("email", email)

            fetch(url, {
                    method: 'POST',
                    body: formData
                }).then(response => response.json())
                .then(data => {

                    if (data.ok) {
                        document.getElementById('email').value = ''
                        document.getElementById('validaEmail').innerHTML = 'Email no disponible'
                    } else {
                        document.getElementById('validaEmail').innerHTML = ''
                    }

                })
        }

        function existeUsuario(usuario) {
            let url = "clases/clienteAjax.php"
            let formData = new FormData()
            formData.append("action", "existeUsuario")
            formData.append("usuario", usuario)

            fetch(url, {
                    method: 'POST',
                    body: formData
                }).then(response => response.json())
                .then(data => {

                    if (data.ok) {
                        document.getElementById('usuario').value = ''
                        document.getElementById('validaUsuario').innerHTML = 'Usuario no disponible'
                    } else {
                        document.getElementById('validaUsuario').innerHTML = ''
                    }

                })
        }
    </script>

</body>

</html>