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
    <title>Nuestras Marcas</title>

    <link href="<?php echo SITE_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">

    <style>
        /* Banner responsivo */
        .banner {
            background: linear-gradient(rgb(223, 153, 96), #f58021, #f58021, rgb(223, 153, 96));
            padding: 20px;
        }

        /* Contenedor redondeado para las imágenes */
        .round-container {
            width: 300px;
            height: 300px;
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

        @media (max-width: 1024px) {

            .banner .col-4 {
                text-align: center;
                margin-top: 20px;
            }

            .round-container {
                width: 210px;
                height: 210px;
            }

            .col-8 {
                text-align: center;
                margin-bottom: 15px;
            }
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
                    <h1>Nuestras Marcas</h1>
                    <h5>Trabajamos con las marcas más confiables de la industria de la soldadura</h5>

                </div>
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <img src="images/otros/marcas.png">
                </div>
            </div>
        </div>
    </div>
    <h2 class="mb-5 mt-5" style="text-align: center;">Conoce todas nuestras marcas</h2>

    <hr>

    <!-- Primer Marca -->
    <div class="container mt-2">
        <div class="row text-center">

            <h3 class="col-12">CEBORA</h3>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                <div class="round-container">
                    <img src="images/logos/LogoCebora.jpg" alt="Imagen redonda">
                </div>
            </div>
            <div class="col-12 col-md-7 d-flex flex-column align-items-center justify-content-center">
                <p style=" text-align: justify;">Cebora es una marca italiana con más de 40 años de experiencia en el desarrollo y fabricación de equipos de soldadura. Es conocida pr incipalmente por sus soldadoras de alto rendimiento, tanto para aplicaciones profesionales como industriales. Cebora ofrece soluciones para una amplia gama de procesos de soldadura, como MIG, TIG, MMA y plasma.</p><br><br>
                <ul>
                    <li>Productos destacados: Soldadoras MIG/MAG, TIG, equipos inverter, máquinas multiproceso.</li>
                    <li>Características: Equipos de alta durabilidad, tecnología innovadora, fácil mantenimiento y eficiencia energética.</li>
                </ul>
            </div>
        </div>

    </div>



    <hr>

    <!-- Segunda Marca -->
    <div class="container mt-2">
        <div class="row text-center">

            <h3 class="col-12">TRAFIMET</h3>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                <div class="round-container">
                    <img src="images/logos/LogoTrafimet.jpg" alt="Imagen redonda">
                </div>
            </div>
            <div class="col-12 col-md-7 d-flex flex-column align-items-center justify-content-center">
                <p style=" text-align: justify;">Trafimet es una marca italiana especializada en la fabricación de consumibles para equipos de soldadura. Es reconocida en el mercado por ofrecer productos como boquillas, electrodos, puntas y pistolas de soldadura, enfocados en ofrecer alta precisión y rendimiento en los procesos de soldadura. </p><br><br>
                <ul>
                    <li><strong>Productos destacados:</strong> Consumibles para soldadura, pistolas MIG/MAG, electrodos y boquillas.</li>
                    <li><strong>Características: </strong>Alta calidad en los materiales, gran precisión y fiabilidad en los consumibles, amplia durabilidad.</li>
                </ul>
            </div>
        </div>

    </div>

    <hr>

    <!-- Tercer Marca -->
    <div class="container mt-2">
        <div class="row text-center">

            <h3 class="col-12">OWELD</h3>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                <div class="round-container">
                    <img src="images/logos/LogoOweld.jpg" alt="Imagen redonda">
                </div>
            </div>
            <div class="col-12 col-md-7 d-flex flex-column align-items-center justify-content-center">
                <p style=" text-align: justify;">Oweld es una marca que fabrica equipos de soldadura avanzados, destacándose especialmente en soluciones para soldadura profesional y equipos de corte. Ofrecen productos versátiles y resistentes que se adaptan tanto a aplicaciones industriales como a trabajos más especializados. </p><br><br>
                <ul>
                    <li><strong>Productos destacados:</strong> Soldadoras Inverter, máquinas de corte por plasma, accesorios.</li>
                    <li><strong>Características: </strong> Equipos robustos, tecnología de última generación, alta eficiencia y control preciso del proceso de soldadura.</li>
                </ul>
            </div>
        </div>

    </div>

    <hr>
    <!-- Cuarta Marca -->
    <div class="container mt-2">
        <div class="row text-center">

            <h3 class="col-12">ELETTRO</h3>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                <div class="round-container">
                    <img src="images/logos/LogoElecttro.jpg" alt="Imagen redonda">
                </div>
            </div>
            <div class="col-12 col-md-7 d-flex flex-column align-items-center justify-content-center">
                <p style=" text-align: justify;">Elettro es otra marca italiana reconocida en la fabricación de equipos de soldadura, con un enfoque en la creación de soluciones económicas sin sacrificar la calidad. Es ideal para quienes buscan productos de soldadura confiables a un costo accesible.</p><br><br>
                <ul>
                    <li><strong>Productos destacados:</strong> Equipos de soldadura TIG, MIG, MMA, Máquinas Multiproceso: y accesorios de soldadura.</li>
                    <li><strong>Características: </strong> Diseño compacto, eficiencia energética, Fácil mantenimiento, facilidad de uso.</li>
                </ul>
            </div>
        </div>

    </div>
    <hr>
    <!--Quinta Marca -->
    <div class="container mt-2">
        <div class="row text-center">

            <h3 class="col-12">SACIT</h3>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                <div class="round-container">
                    <img src="images/logos/LogoSacit.jpg" alt="Imagen redonda">
                </div>
            </div>
            <div class="col-12 col-md-7 d-flex flex-column align-items-center justify-content-center">
                <p style=" text-align: justify;">Sacit es una marca italiana con más de 50 años de trayectoria en el desarrollo y fabricación de equipos de soldadura. Reconocida por su fiabilidad y calidad, Sacit se especializa en ofrecer soluciones avanzadas para procesos de soldadura MIG, TIG y MMA. Sus productos están diseñados para satisfacer las necesidades tanto de profesionales como de industrias, brindando equipos de alto rendimiento y durabilidad. </p><br><br>
                <ul>
                    <li><strong>Productos destacados:</strong> Soldadoras MIG/MAG, TIG, equipos inverter, generadores de corriente y máquinas multiproceso.</li>
                    <li><strong>Características: </strong>Alta precisión, robustez, tecnología avanzada, facilidad de uso y mantenimiento, eficiencia energética</li>
                </ul>
            </div>
        </div>

    </div>
    <!--Quinta Marca -->
    <div class="container mt-2">
        <div class="row text-center">

            <h3 class="col-12">ARCTECH</h3>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                <div class="round-container">
                    <img src="images/logos/LogoArctech.jpg" alt="Imagen redonda">
                </div>
            </div>
            <div class="col-12 col-md-7 d-flex flex-column align-items-center justify-content-center">
                <p style=" text-align: justify;">Arcech es una marca española con una sólida experiencia en la fabricación de equipos de soldadura y corte. Con más de 30 años en el mercado, Arcech se ha consolidado como un referente en el diseño de soluciones para soldadores profesionales e industriales. La empresa es conocida por sus máquinas de soldadura multiproceso, cortadoras por plasma y sistemas inverter, ideales para tareas que requieren alta precisión y fiabilidad.</p><br><br>
                <ul>
                    <li><strong>Productos destacados:</strong> Soldadoras MIG, TIG, MMA, cortadoras de plasma, equipos inverter.</li>
                    <li><strong>Características: </strong> Alta eficiencia, diseño ergonómico, robustez, facilidad de mantenimiento y tecnología de vanguardia.</li>
                </ul>
            </div>
        </div>

    </div>
    </main>

    <?php include 'footer.php'; ?>

    <script src="<?php echo SITE_URL; ?>js/bootstrap.bundle.min.js"></script>

</body>

</html>