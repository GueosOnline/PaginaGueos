    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        /* ---------//----Barra de Navegación----//---------*/
        .navbar {

            background-color: black;
        }

        .nav-font {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: white;
            font-size: 17px;
            text-decoration: none;
        }

        .nav-font:hover {
            color: orange;
        }

        /* ---------//----Boton Carrito----//---------*/
        .btn-carrito {
            background-color: #0275b6;
            color: white;
        }

        .btn-carrito:hover {
            background-color: #04537d;
            color: white;
            transform: scale(0.95);
        }

        /* ---------//----Boton Ingresar y Boton Usuario----//---------*/

        .btn-ingresar,
        .btn-user {
            background-color: #f58021;
            color: white;
        }

        .btn-ingresar:hover,
        .btn-user:hover {
            background-color: #b16321;
            color: white;
            transform: scale(0.95);
        }

        .dropdown-toggle:focus,
        .dropdown-toggle:active {
            background-color: #e67e00;
            transform: scale(0.95);
        }

        /* ---------//----Boton dispotivos moviles----//---------*/

        .navbar-toggler {
            background-color: #0275b6;
        }

        /* ---------//----Caracteristicas para responsividad----//---------*/
        @media (max-width: 991px) {
            .d-flex.flex-column.align-items-center {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .btn-carrito,
            .btn-ingresar,
            .btn-user {
                width: 50%;
                max-width: 200px;
                margin: 10px 0;
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


    <!---------//----Menu de navegación----//--------->
    <header>
        <nav class="navbar navbar-expand-lg ">
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
                            <a class="nav-font" href="pagoFacturas.php">Pagos Facturas</a>
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

                    <a href="checkout.php" class="btn btn-carrito me-3">
                        <i class="fas fa-shopping-cart"></i> Carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
                    </a>

                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <div class="dropdown">
                            <button class="btn btn-user dropdown-toggle me-3" type="button" id="btn_session" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> &nbsp; <?php echo $_SESSION['user_name']; ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btn_session">
                                <li><a class="dropdown-item" href="compras.php">Mis compras</a></li>
                                <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <a href="login.php" class="btn btn-ingresar me-3">
                            <i class="fas fa-user"></i> Ingresar
                        </a>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </header>