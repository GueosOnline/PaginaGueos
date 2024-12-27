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
    <title>Metodos Envio</title>

    <link href="<?php echo SITE_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">

    <style>
        /* Banner responsivo */
        .banner {
            background: linear-gradient(#87cefa, rgb(69, 164, 223), rgb(22, 144, 220), #87cefa);
            padding: 20px;
        }

        /* Responsividad de la imagen del banner */
        .banner img {
            width: 100%;
            /* Asegura que la imagen ocupe el 100% del ancho en dispositivos pequeños */
            height: auto;
            /* Mantiene la relación de aspecto */
            max-width: 250px;
            /* Limita el ancho máximo de la imagen a 600px en pantallas grandes */
            margin: 0 auto;
            /* Centra la imagen */
        }

        /* Ajustes de contenedor y columnas */
        .container h5 {
            font-size: 1.25rem;
            /* Ajuste de tamaño de fuente en móviles */
        }

        @media (max-width: 768px) {

            /* Ajustes para pantallas pequeñas */
            .banner .col-4 {
                text-align: center;
                margin-top: 20px;
            }

            .round-container {
                width: 120px;
                height: 120px;
                /* Reducir el tamaño en pantallas pequeñas */
            }

            .col-8 {
                text-align: center;
                margin-bottom: 15px;
            }
        }
    </style>


</head>

<body class="d-flex flex-column h-100">

    <?php include 'header.php'; ?>

    <!-- Contenido -->
    <div class="banner">
        <div class="container mt-5 mb-5">
            <div class="row ">
                <div class="col-5 mt-5 mb-5 mx-auto">
                    <h1>Metodos de envio</h1>
                    <h5>Conoce nuestros métodos de entrega</h5>
                </div>
                <div class="col-5 d-flex justify-content-center align-items-center">
                    <img src="images/otros/carritoEnvios.png">
                </div>
            </div>
        </div>
    </div>
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card mb-3 ">
                        <div class="row g-0">
                            <div class="col-md-3 text-center">
                                <img src="images/iconos/shop.png" class="img-fluid rounded-start" style="max-width: 100px;">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title">????</h5>
                                    <p class="card-text">Puedes seleccionar esta opción y dirigirte a una de nuestras tiendas más cercanas. Te notificaremos a través de mensaje de texto o correo electrónico cuando tu compra esté lista para que la puedas retirar de manera gratuita.<br> Recuerda presentar tu documento de identidad registrado en la compra y el número del pedido.</p>
                                    <p class="card-text"><small class="text-body-secondary"><a href="#">Conoce más ></a></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card mb-3 ">
                        <div class="row g-0">
                            <div class="col-md-3 text-center">
                                <img src="images/iconos/shop.png" class="img-fluid rounded-start" style="max-width: 100px;">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title">Recoge en tienda gratis</h5>
                                    <p class="card-text">Puedes seleccionar esta opción y dirigirte a una de nuestras tiendas más cercanas. Te notificaremos a través de mensaje de texto o correo electrónico cuando tu compra esté lista para que la puedas retirar de manera gratuita.<br> Recuerda presentar tu documento de identidad registrado en la compra y el número del pedido.</p>
                                    <p class="card-text"><small class="text-body-secondary"><a href="#">Conoce más ></a></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5"> <!-- Haciendo la columna más estrecha (33%) -->
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-3 text-center">
                                <img src="images/iconos/reloj.png" class="img-fluid rounded-start" style="max-width: 100px;">
                            </div>
                            <div class=" col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title">Entrega el mismo día</h5>
                                    <p class="card-text text-justify    ">
                                        Para ciudades principales tienes la posibilidad de que tus productos sean entregados el mismo día con un costo adicional de envío de $10.000 pesos. <br> Recuerda que estos pedidos deben ser con facturas generadas antes de las 04:00 pm</p>
                                    <p class="card-text"><small class="text-body-secondary"><a href="#">Conoce más ></a></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5"> <!-- Haciendo la columna más estrecha (33%) -->
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-3 text-center">
                                <img src="images/iconos/reloj.png" class="img-fluid rounded-start" style="max-width: 100px;">
                            </div>
                            <div class=" col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title">????</h5>
                                    <p class="card-text text-justify    ">
                                        Para ciudades principales tienes la posibilidad de que tus productos sean entregados el mismo día con un costo adicional de envío de $10.000 pesos. <br> Recuerda que estos pedidos deben ser con facturas generadas antes de las 04:00 pm</p>
                                    <p class="card-text"><small class="text-body-secondary"><a href="#">Conoce más ></a></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <?php include 'footer.php'; ?>

    <script src="<?php echo SITE_URL; ?>js/bootstrap.bundle.min.js"></script>

</body>

</html>