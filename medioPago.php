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
    <title>Medios de Pago</title>

    <link href="<?php echo SITE_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">

    <style>
        /* Banner responsivo */
        .banner {
            background: linear-gradient(#87cefa, rgb(69, 164, 223), rgb(22, 144, 220), #87cefa);
            padding: 20px;
        }

        /* Contenedor redondeado para las imágenes */
        .round-container {
            width: 150px;
            height: 150px;
            overflow: hidden;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            border: 8px solid rgb(246, 245, 245);
            box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .round-container img {
            width: 80%;
            height: auto;
            object-fit: contain;
        }

        .banner img {
            width: 100%;
            height: auto;
            max-width: 250px;
            margin: 0 auto;
        }

        .container h5 {
            font-size: 1.25rem;
        }

        @media (max-width: 768px) {

            .banner .col-4 {
                text-align: center;
                margin-top: 20px;
            }

            .round-container {
                width: 120px;
                height: 120px;
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
                <div class="col-6 mt-5 mb-5 mx-auto">
                    <h1>Medios de Pago</h1>
                    <h5>Realiza tus compras de forma fácil, segura y sin costo adicional</h5>

                </div>
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <img src="images/otros/medioPago.jpg">
                </div>
            </div>
        </div>
    </div>
    <h3 class="mb-5 mt-5" style="text-align: center;">Conoce todos nuestros medios de pago</h3>

    <hr>

    <!-- Primer Medio de Pago -->
    <div class="container mt-2">
        <div class="row">
            <div class="col-1"></div>
            <h5 class="col-6"><i class="fas fa-money-bill-wave"></i> Pago en efectivo</h5>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-12 col-md-7 d-flex flex-column align-items-center justify-content-center">
                <ul>
                    <li>
                        En el proceso de pago podrás imprimir un formato para consignar en efectivo en cualquier sucursal del Banco de Bogotá, Bancolombia o Davivienda.
                    </li>
                    <li>
                        También te puedes acercar a cualquier Baloto o Efecty con el número de referencia.
                    </li>
                </ul>
            </div>

            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                <div class="round-container">
                    <img src="images/otros/efectivo.png" alt="Imagen redonda">
                </div>
            </div>
        </div>
    </div>



    <hr>

    <!-- Segundo Medio de Pago -->
    <div class="container mt-2">
        <div class="row">
            <div class="col-1"></div>
            <h5 class="col-6"><i class="far fa-credit-card"></i> Tarjetas de credito y debito</h5>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-12 col-md-7 d-flex flex-column align-items-center justify-content-center">
                <ul>
                    <li>
                        En el proceso de pago podrás imprimir un formato para consignar en efectivo en cualquier sucursal del Banco de Bogotá, Bancolombia o Davivienda.
                    </li>
                    <li>
                        También te puedes acercar a cualquier Baloto o Efecty con el número de referencia.
                    </li>
                </ul>
            </div>

            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                <div class="round-container">
                    <img src="images/otros/tarjetas.png" alt="Imagen redonda">
                </div>
            </div>
        </div>
    </div>

    <hr>
    <!-- Tercer Medio de Pago -->

    <div class="container mt-2">
        <div class="row">
            <div class="col-1"></div>
            <h5 class="col-6"><i class="fas fa-laptop"></i> Pasarela Wompi</h5>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-12 col-md-7 d-flex flex-column align-items-center justify-content-center">
                <ul>
                    <li>
                        En el proceso de pago podrás imprimir un formato para consignar en efectivo en cualquier sucursal del Banco de Bogotá, Bancolombia o Davivienda.
                    </li>
                    <li>
                        También te puedes acercar a cualquier Baloto o Efecty con el número de referencia.
                    </li>
                </ul>
            </div>

            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                <div class="round-container">
                    <img src="images/otros/wompi.jpg" alt="Imagen redonda">
                </div>
            </div>
        </div>
    </div>


    </main>

    <?php include 'footer.php'; ?>

    <script src="<?php echo SITE_URL; ?>js/bootstrap.bundle.min.js"></script>

</body>

</html>