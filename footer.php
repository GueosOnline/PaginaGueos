<style>
    /* Estilo para el footer */
    html,
    body {
        height: 100%;
        margin: 0;
    }

    /* El contenido principal debe ocupar el espacio disponible */
    main {
        flex: 1;
    }

    .footer {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        background-color: black;
        color: white;
        text-align: center;
        margin-top: 100px;
    }

    .footer-link {
        color: white;
        text-decoration: none;
        font-size: 12px;
    }

    .footer-title {
        color: #e67e00;
        font-size: 20px;
        margin-bottom: 5px;
    }

    /* Alinear las columnas */
    .footer .container {
        display: flex;
        justify-content: center;
        /* Centra las columnas */
        flex-wrap: wrap;
        /* Permite que las columnas se ajusten en pantallas pequeñas */
        gap: 20px;
        /* Reducción de espacio entre las columnas */
    }

    .footer .row {
        display: flex;
        justify-content: center;
        gap: 20px;
        width: 100%;
        /* Asegura que las columnas estén distribuidas correctamente */
        max-width: 1200px;
        /* Ancho máximo para el footer */
    }

    .footer-list {
        list-style-type: none;
        padding-left: 0;
    }

    /* Estilo para las columnas */
    .footer .col-sm-4,
    .footer .col-md-3 {
        text-align: center;
        flex: 1;
        /* Asegura que las columnas no sean demasiado estrechas */
    }
</style>


<!-- Fotter para todas las pantallas -->

<footer class="footer">
    <div class="container py-4 py-lg-5 ">
        <div class="row justify-content-center">

            <!-- Informacion de la empresa -->
            <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                <h1 class="footer-title">Nuestra Compañia</h1>

                <ul class="footer-list">
                    <li>
                        <a href="quienSomos.php" class="footer-link">Quiénes somos</a>
                    </li>
                    <li>
                        <a href="marcas.php" class="footer-link">Nuestras Marcas</a>
                    </li>
                    <li>
                        <a href="index.php" class="footer-link">Contáctenos</a>
                    </li>
                    <li>
                        <a href="index.php" class="footer-link">Trabaja con nosotros</a>
                    </li>
                </ul>
            </div>

            <!-- Potilitcas que maneja la empresa -->
            <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                <h1 class="footer-title">Políticas</h1>

                <ul class="footer-list">
                    <li>
                        <a href="index.php" class="footer-link">Términos y condiciones del canal digital</a>
                    </li>
                    <li>
                        <a href="index.php" class="footer-link">Contrato de compraventa en línea </a>
                    </li>
                    <li>
                        <a href="politicaPrivacidad.php" class="footer-link">Politíca de privacidad</a>
                    </li>
                    <li>
                        <a href="index.php" class="footer-link">Solicitud tratamiento de datos personales</a>
                    </li>
                    <li>
                        <a href="index.php" class="footer-link">Poltica de cambios y devoluciones </a>
                    </li>
                </ul>
            </div>

            <!-- Informacion de compras en linea -->
            <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                <h1 class="footer-title">Compras en linea</h1>

                <ul class="footer-list">
                    <li>
                        <a href="ayuda.php" class="footer-link">Preguntas frecuentes</a>
                    </li>
                    <li>
                        <a href="pagoSeguro.php" class="footer-link">Pago seguro</a>
                    </li>
                    <li>
                        <a href="metodoEnvio.php" class="footer-link">Métodos de envío</a>
                    </li>
                    <li>
                        <a href="medioPago.php" class="footer-link">Medios de pago</a>
                    </li>
                </ul>
            </div>



            <!-- Redes Sociales -->
            <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                <h1 class="footer-title">Redes Sociales</h1>

                <ul class="footer-list">
                    <li>
                        <a href="https://www.facebook.com/RepGueos" class="footer-link">Facebook</a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/representacionesgueosltda" class="footer-link">LinkedIn</a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/@gueos-RG" class="footer-link">YouTube</a>
                    </li>
                    <li>
                        <a href="https://x.com/RepGueosLtda" class="footer-link">Twitter</a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/representaciones.gueos/" class="footer-link">Instagram</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</footer>