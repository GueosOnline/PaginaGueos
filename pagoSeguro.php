<?php

//Pantalla para politica de Privacidad de la empresa

require 'config/config.php';

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
        .banner {
            background: linear-gradient(#87cefa, rgb(69, 164, 223), rgb(22, 144, 220), #87cefa);
            padding: 20px;
        }
    </style>

</head>

<body class="d-flex flex-column h-100">

    <?php include 'header.php'; ?>

    <!-- Contenido -->
    <div class="banner">
        <div class="container mt-5 mb-5">
            <div class="row ">
                <div class="col-6 mt-5 mb-5 mx-auto">
                    <h1>Pago seguro</h1>
                    <h5>En Representaciones Gueos nos preocupamos por los pagos que realizan nuestros clientes a través de nuestra tienda virtual y por eso queremos contarte que aqui compras seguro.</h5>

                </div>
                <div class="col-4">
                    <img src="images/otros/candado.png" style="max-height: 200px;">
                </div>
            </div>
        </div>
    </div>

    <main class="container mt-5">
        <div class="row mb-5">
            <h3 class="mb-5" style="text-align: center;">¿Cómo puedo saber si el pago es seguro?</h3>
            <div class="col-10 mx-auto" style="text-align: justify;">
                <p> Asegúrate que aparezca un pequeño candado cerrado, generalmente junto a la barra de direcciones ó en la parte inferior derecha, y que la dirección de la pagina de pago comienza por <strong> https:// (terminado en s) lo cuál indica que la página se encuentra en un ambiente seguro.</strong><br><br>
                    Eso hace que la información bancaria ingresada en el momento del pago viaje a las entidades financieras encargadas de autorizar el pago de manera cifrada, evitando así que pueda ser leída por terceros. Este es el método que permite garantizar una alta seguridad en el comercio electrónico.</p>
            </div>
        </div>

        <h3>Tips de seguridad</h3>
        <hr>

        <div class="row mt-5 justify-content-center">
            <div class="col-9 col-md-3 d-flex justify-content-center align-items-center mb-4">
                <div class="d-flex flex-column align-items-center"> <!-- Contenedor centrado con Flexbox -->
                    <img src="images/iconos/window.png" class="img-fluid" style="max-width: 120px; height: auto;"> <!-- Imagen centrada -->
                    <p class="text-center mt-3">Sistema operativo <strong>actualizado</strong></p> <!-- Descripción centrada -->
                </div>
            </div>

            <div class="col-12 col-md-3 d-flex justify-content-center align-items-center mb-4">
                <div class="d-flex flex-column align-items-center"> <!-- Contenedor centrado con Flexbox -->
                    <img src="images/iconos/antivirus.png" class="img-fluid" style="max-width: 120px; height: auto;"> <!-- Imagen centrada -->
                    <p class="text-center mt-3">Usa un antivirus y un <strong>antispyware de confianza</strong></p> <!-- Descripción centrada -->
                </div>
            </div>

            <div class="col-12 col-md-3 d-flex justify-content-center align-items-center mb-4">
                <div class="d-flex flex-column align-items-center"> <!-- Contenedor centrado con Flexbox -->
                    <img src="images/iconos/mail.png" class="img-fluid" style="max-width: 120px; height: auto;"> <!-- Imagen centrada -->
                    <p class="text-center mt-3"><strong>Desconfía de los emails</strong> que no vienen de la empresa autorizada</p> <!-- Descripción centrada -->
                </div>
            </div>



        </div>
        <div class="row container justify-content-center">
            <div class="col-12 col-md-3 d-flex justify-content-center align-items-center mb-4">
                <div class="d-flex flex-column align-items-center"> <!-- Contenedor centrado con Flexbox -->
                    <img src="images/iconos/wifi.png" class="img-fluid" style="max-width: 120px; height: auto;"> <!-- Imagen centrada -->
                    <p class="text-center mt-3"><strong>NO realices compras online desde un PC ajeno</strong> o desde una red de WIFI abierta</p> <!-- Descripción centrada -->
                </div>
            </div>

            <div class="col-12 col-md-3 d-flex justify-content-center align-items-center mb-4">
                <div class="d-flex flex-column align-items-center"> <!-- Contenedor centrado con Flexbox -->
                    <img src="images/iconos/shop.png" class="img-fluid" style="max-width: 120px; height: auto;"> <!-- Imagen centrada -->
                    <p class="text-center mt-3"><strong>Compra solo en tiendas virtuales seguras</strong> y de confianza</p> <!-- Descripción centrada -->
                </div>
            </div>
            <div class="col-12 col-md-3 d-flex justify-content-center align-items-center mb-4">
            </div>
        </div>
    </main>

    <p style="font-family: Georgia, 'Times New Roman', Times, serif;">Ejemplo de la letra este es el numero 1. y este <strong>negrita</strong> </p>

    <?php include 'footer.php'; ?>

    <script src="<?php echo SITE_URL; ?>js/bootstrap.bundle.min.js"></script>

</body>

</html>