<style>
    .nav-font {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        color: white;
        /* Cambia el color del texto */
        font-size: 17px;
        /* Cambia el tamaño de la fuente */
        text-decoration: none;
        /* Elimina el subrayado */
    }

    .nav-font:hover {
        color: orange;
        /* Cambia el color a naranja cuando el cursor está sobre el enlace */
    }

    .btn-ingresar {
        background-color: orange;
        color: white;
    }

    .btn-ingresar:hover {
        background-color: #e67e00;
        color: white;
        transform: scale(0.95);
    }

    .btn-carrito {
        background-color: #1919e6;
        color: white;
    }

    .btn-carrito:hover {
        background-color: #00088f;
        color: white;
        transform: scale(0.95);
    }

    /* Estilos para los botones flotantes */
    .social-buttons {
        position: fixed;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
        /* Centra los botones verticalmente */
        z-index: 1000;
        /* Asegura que los botones estén sobre otros elementos */
    }

    .social-buttons a {
        display: block;
        margin-bottom: 10px;
        background-color: #333;
        color: white;
        padding: 10px;
        border-radius: 50%;
        font-size: 20px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .social-buttons a.facebook {
        background-color: #3b5998;
        /* Facebook color azul */
    }

    .social-buttons a.twitter {
        background-color: #1da1f2;
        /* Twitter color azul claro */
    }

    .social-buttons a.instagram {
        background: linear-gradient(45deg, #f58529, #e4405f, #9b4d96, #4c68d7, #00d2a3);
        /* Gradiente arcoíris */
        color: white;
        /* Texto blanco */
        padding: 10px;
        border-radius: 50%;
        /* Bordes redondeados */
        font-size: 20px;
        /* Tamaño del icono */
        text-align: center;
        transition: background-color 0.3s, transform 0.3s;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        /* Sombra para el botón */
    }

    .social-buttons a.instagram:hover {
        transform: scale(1.1);
        /* Efecto de aumento */
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.3);
        /* Sombra al pasar el cursor */
    }

    .social-buttons a.youtube {
        background-color: #ff0000;
        /* YouTube color rojo */
    }

    .social-buttons a.linkedin {
        background-color: #0077b5;
        /* LinkedIn color azul */
    }

    .social-buttons a.whatsapp {
        background-color: #25d366;
        /* YouTube color rojo */
    }

    .social-buttons a:hover {
        transform: scale(1.2);
        /* Efecto de aumento */
    }

    @media (max-width: 768px) {
        .social-buttons a {
            font-size: 20px;
            padding: 8px;
        }
    }

    @media (max-width: 380px) {
        .social-buttons a {
            font-size: 18px;
            padding: 6px;
        }
    }

    @media (max-width: 768px) {
        .social-buttons a {
            font-size: 20px;
            padding: 8px;
        }
    }

    @media (max-width: 380px) {
        .social-buttons a {
            font-size: 18px;
            padding: 6px;
        }
    }

    @media (max-width: 991px) {
        .d-flex.flex-column.align-items-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-carrito,
        .btn-ingresar {
            width: 50%;
            max-width: 200px;
            margin: 5px 0;
        }
    }

    /* Ajustes para el navbar en pantallas pequeñas */
    @media (max-width: 767px) {
        .navbar-brand img {
            max-height: 60px;
        }

        /* Asegura que los botones de carrito y login se alineen centrados en móviles */
        .navbar .d-flex {
            justify-content: center;
            flex-wrap: wrap;
            align-items: center;
        }

        .navbar-nav {
            text-align: center;
        }

        /* Asegura que el menú de navegación esté centrado en móviles */
        .navbar-collapse {
            text-align: center;
        }

        .navbar-nav .nav-item {
            margin-bottom: 10px;
        }
    }
</style>

<!-- Menu de navegación -->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container my-1">
            <a href="index.php" class=""><img src="images/logos/LogoGueos.jpg" alt="Logo" class="img-fluid" style="max-height: 80px; margin-right: 10px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarTop" aria-controls="navBarTop" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navBarTop">
                <ul class="navbar-nav mx-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-font" href="index.php">Catalogo</a>
                    </li>
                </ul>

                <ul class="navbar-nav mx-auto mr-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-font" href="index.php">Pagos Facturas</a>
                    </li>
                </ul>

                <ul class="navbar-nav mx-auto mr-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-font" href="nosotros.php">Sobre nosotros</a>
                    </li>
                </ul>

                <ul class="navbar-nav mx-auto mr-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-font" href="ayuda.php">Ayuda</a>
                    </li>
                </ul>


                <a href="checkout.php" class="btn btn-carrito me-2">
                    <i class="fas fa-shopping-cart"></i> Carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
                </a>

                <?php if (isset($_SESSION['user_id'])) { ?>
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="btn_session" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> &nbsp; <?php echo $_SESSION['user_name']; ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btn_session">
                            <li><a class="dropdown-item" href="compras.php">Mis compras</a></li>
                            <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                        </ul>
                    </div>
                <?php } else { ?>
                    <a href="login.php" class="btn btn-ingresar">
                        <i class="fas fa-user"></i> Ingresar
                    </a>
                <?php } ?>
            </div>
        </div>
    </nav>
</header>

<div class="social-buttons">
    <a href="https://www.facebook.com" target="_blank" title="Facebook" class="facebook"><i class="fab fa-facebook-f"></i></a>
    <a href="https://twitter.com" target="_blank" title="Twitter" class="twitter"><i class="fab fa-twitter"></i></a>
    <a href="https://www.instagram.com" target="_blank" title="Instagram" class="instagram"><i class="fab fa-instagram"></i></a>
    <a href="https://www.youtube.com" target="_blank" title="youtube" class="youtube"><i class="fab fa-youtube"></i></a>
    <a href="https://www.linkedin.com" target="_blank" title="LinkedIn" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
    <a href="https://www.whatsapp.com" target="_blank" title="WhatsApp" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
</div>