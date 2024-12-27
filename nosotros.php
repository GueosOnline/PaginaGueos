<?php

//Pantalla para informacion empresa

require 'config/config.php';

?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>

    <link href="<?php echo SITE_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">

    <style>
        .card-header {
            background-color: black;
            /* Fondo negro para los encabezados */
            color: orange;
            /* Color naranja para el texto */
            font-weight: bold;
        }

        .contact-info i {
            margin-right: 10px;
            color: #007bff;
        }

        .info-section {
            margin-bottom: 30px;
        }

        .info-section h3 {
            color: orange;
        }

        .card {
            margin-bottom: 20px;
        }

        .social-icons a {
            color: #007bff;
            font-size: 30px;
            padding: 30px 15px;
        }

        .social-icons a:hover {
            color: #0056b3;
        }

        .link {
            text-decoration: none;
            color: black;
        }
    </style>

</head>

<body class="body-nosotros d-flex flex-column h-100">

    <?php include 'header.php'; ?>

    <!-- Contenido -->
    <main class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <!-- Sede e Información -->
                <div class="card">
                    <div class="card-header">
                        Datos Generales y Sede
                    </div>
                    <div class="card-body">
                        <p>Dirección: <a class="link" href="https://www.google.com/maps/place/Representaciones+Gueos+Ltda/@4.6160733,-74.1080304,17z/data=!3m1!4b1!4m6!3m5!1s0x8e3f9979801b52d1:0x6d9a760097676969!8m2!3d4.6160733!4d-74.1080304!16s%2Fg%2F11f40qswbc?entry=ttu&g_ep=EgoyMDI0MTIxMS4wIKXMDSoJLDEwMjExMjM0SAFQAw%3D%3D">arrera 41B # 5-11, Barrio Primavera, Bogotá, Colombia</a></p>
                        <p>Teléfono: +57 316 5814009</p>
                        <p>Email: info@gueos.com.co</p>
                        <p>Horario de atención: Lunes a Viernes, 7:30 AM - 5:40 PM</p>
                    </div>
                </div>

                <!-- Proveedores -->
                <div class="card">
                    <div class="card-header">
                        Nuestros Proveedores
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Proveedor 1 -->
                            <div class="col-6 col-md-4">
                                <div class="provider-item">
                                    <img src="images/logos/LogoCebora.jpg" alt="Cebora" class="img-fluid">
                                </div>
                            </div>
                            <!-- Proveedor 2 -->
                            <div class="col-6 col-md-4">
                                <div class="provider-item">
                                    <img src="images/logos/LogoTrafimet.jpg" alt="Proveedor 5" class="img-fluid">
                                </div>
                            </div>
                            <!-- Proveedor 2 -->
                            <div class="col-6 col-md-4">
                                <div class="provider-item">
                                    <img src="images/logos/LogoOweld.jpg" alt="Proveedor 2" class="img-fluid">
                                </div>
                            </div>
                            <!-- Proveedor 3 -->
                            <div class="col-6 col-md-4">
                                <div class="provider-item">
                                    <img src="images/logos/LogoSacit.jpg" alt="Proveedor 3" class="img-fluid">
                                </div>
                            </div>
                            <!-- Proveedor 5 -->
                            <div class="col-6 col-md-4">
                                <div class="provider-item">
                                    <img src="images/logos/LogoArctech.jpg" alt="Proveedor 5" class="img-fluid">
                                </div>
                            </div>
                            <!-- Proveedor 4 -->
                            <div class="col-6 col-md-4">
                                <div class="provider-item">
                                    <img src="images/logos/LogoElecttro.jpg" alt="Proveedor 4" class="img-fluid">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Información sobre la empresa -->
                <div class="card">
                    <div class="card-header">
                        Sobre Nosotros
                    </div>
                    <div class="card-body">
                        <p>Fue fundada el 19 de Julio de 2010 en Bogotá, por un grupo de profesionales en áreas de la ingeniería electrónica, control electrónico, sistemas; quienes se asociaron con la idea de mantener un compromiso de calidad a los mejores precios. Importamos, distribuimos y brindamos servicio técnico, Actualmente, enfocamos nuestras actividades en:</p>
                    </div>
                </div>

                <!-- Contacto -->
                <div class="card">
                    <div class="card-header">
                        Información de Contacto
                    </div>
                    <div class="card-body contact-info">
                        <p><i class="fas fa-phone-alt"></i> +123 456 789</p>
                        <p><i class="fas fa-envelope"></i> contacto@empresa.com</p>
                        <p><i class="fas fa-map-marker-alt"></i><a class="link" href="https://www.google.com/maps/place/Representaciones+Gueos+Ltda/@4.6160733,-74.1080304,17z/data=!3m1!4b1!4m6!3m5!1s0x8e3f9979801b52d1:0x6d9a760097676969!8m2!3d4.6160733!4d-74.1080304!16s%2Fg%2F11f40qswbc?entry=ttu&g_ep=EgoyMDI0MTIxMS4wIKXMDSoJLDEwMjExMjM0SAFQAw%3D%3D"> carrera 41B # 5-11, Barrio Primavera, Bogotá, Colombia</a></p>
                    </div>
                </div>

                <!-- Redes Sociales -->
                <div class="card">
                    <div class="card-header">
                        Redes Sociales
                    </div>
                    <div class="card-body">
                        <div class="social-icons">
                            <a href="https://www.facebook.com/RepGueos" target="_blank" title="Facebook" class="facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://x.com/RepGueosLtda" target="_blank" title="Twitter" class="twitter"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/representaciones.gueos/  " target="_blank" title="Instagram" class="instagram"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.youtube.com/@gueos-RG" target="_blank" title="youtube" class="youtube"><i class="fab fa-youtube"></i></a>
                            <a href="https://www.linkedin.com/company/representacionesgueosltda" target="_blank" title="LinkedIn" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
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