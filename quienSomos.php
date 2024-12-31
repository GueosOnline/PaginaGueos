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
    <title>Quienes Somos</title>

    <link href="<?php echo SITE_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">


    <style>
        .uno,
        .tres,
        .cinco {
            background-color: #f58021;
        }

        .dos,
        .cuatro,
        .seis {
            background-color: #0275b6;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">


    <?php include 'header.php'; ?>

    <!-- Contenido -->
    <main>
        <div class="container">
            <div class="row">
                <img class="img" src="images/otros/quienSomos.png">

            </div>

        </div>


        <h3 class="mb-5 mt-2" style="text-align: center;">Somos distribuidores de empresas italianas como...</h3>


        <div class="container">
            <div class="row d-flex justify-content-between">
                <!-- Primer card -->
                <div class="col-10 mx-auto mb-3">
                    <div class="card">
                        <div class="row g-0 align-items-center">
                            <div class="col-2" style="background-color: #0275b6; max-width: 150px; max-height: 150px;">
                                <img src="images/iconos/gueos.png" style="max-width: 150px; max-height: 150px;">
                            </div>
                            <div class="col-10 mx-auto">
                                <div class="card-body">
                                    <h5 class="card-text">Fue fundada el 19 de Julio de 2010 en Bogotá, por un grupo de profesionales en áreas de la ingeniería electrónica, control electrónico y sistemas</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Segundo card -->
                <div class="col-10 mx-auto mb-3">
                    <div class="card">
                        <div class="row g-0 align-items-center">
                            <div class="col-2" style="background-color: #f58021; max-width: 150px; max-height: 150px;">
                                <img src="images/iconos/catalogo.png" style="max-width: 150px; max-height: 150px;">
                            </div>
                            <div class="col-10 mx-auto">
                                <div class="card-body">
                                    <h5 class="card-text">Manejamos casi 3000 referencias en productos industriales, abarcando una amplia gama de equipos y accesorios, desde herramientas de soldadura y corte hasta consumibles especializados.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Segundo card -->
                <div class="col-10 mx-auto mb-3">
                    <div class="card">
                        <div class="row g-0 align-items-center">
                            <div class="col-2" style="background-color: #0275b6; max-width: 150px; max-height: 150px;">
                                <img src="images/iconos/alianza.png" style="max-width: 150px; max-height: 150px;">
                            </div>
                            <div class="col-10 mx-auto">
                                <div class="card-body">
                                    <h5 class="card-text">Somos representantes oficiales de marcas internacionales de prestigio, como Cebora, Trafimet, Sacit, entre otras, lo que nos permite ofrecer productos de alta calidad y tecnología avanzada.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Segundo card -->
                <div class="col-10 mx-auto mb-3">
                    <div class="card">
                        <div class="row g-0 align-items-center">
                            <div class="col-2" style="background-color: #f58021; max-width: 150px; max-height: 150px;">
                                <img src="images/iconos/exp.png" style="max-width: 150px; max-height: 150px;">
                            </div>
                            <div class="col-10 mx-auto">
                                <div class="card-body">
                                    <h5 class="card-text">Con más de 14 años en el mercado, hemos consolidado una sólida reputación por nuestra confiabilidad, eficiencia y la calidad de los productos que ofrecemos.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Segundo card -->
                <div class="col-10 mx-auto mb-3">
                    <div class="card">
                        <div class="row g-0 align-items-center">
                            <div class="col-2" style="background-color: #0275b6; max-width: 150px; max-height: 150px;">
                                <img src="images/iconos/telefono.png" style="max-width: 150px; max-height: 150px;">
                            </div>
                            <div class="col-10 mx-auto">
                                <div class="card-body">
                                    <h5 class="card-text">Nos enfocamos en brindar un servicio cercano y eficiente, adaptándonos a las necesidades específicas de cada cliente, con asesoramiento profesional para garantizar las mejores soluciones.</h5>
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