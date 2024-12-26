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
    <title>Ayuda</title>

    <link href="<?php echo SITE_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
    <style>
        details {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: white;
            padding: 10px;
        }

        /* Estilo para el título (summary) de la pregunta */
        summary {
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
            /* Texto naranja */
            padding: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: none;
        }

        /* Estilo para el contenido de la respuesta */
        .fade-in-top {
            font-size: 16px;
            padding: 15px;
            color: #333;
            display: none;
            /* Ocultar respuesta por defecto */
        }

        /* Mostrar contenido cuando se abre el <details> */
        details[open] .fade-in-top {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }

        /* Animación de desvanecimiento para el contenido */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Estilo de los elementos de la lista */
        .fade-in-top ul {
            padding-left: 50px;
        }

        .fade-in-top li {
            margin-bottom: 10px;
        }

        /* Estilos para los íconos de las flechas */
        .control-icon {
            font-size: 40px;
            /* Tamaño de las flechas */
            transition: opacity 0.3s ease;

            color: orange;
        }

        .control-icon-expand {
            display: inline-block;
            /* Flecha hacia abajo visible por defecto */
        }

        .control-icon-close {
            display: none;
            /* Flecha hacia arriba oculta por defecto */
        }

        details[open] summary .control-icon-expand {
            display: none;
        }

        details[open] summary .control-icon-close {
            display: inline-block;
        }
    </style>
</head>

<body>


    <?php include 'header.php'; ?>

    <div class="container faq-container">
        <h2 class="mb-4 mt-4">Preguntas Frecuentes</h2>

        <div class="accordion" id="faqAccordion">
            <!-- Card 1 -->

            <details>
                <summary>
                    <h4> ¿Puedo comprar directamente con ustedes?</h4>
                    <i class="fas fa-angle-down control-icon control-icon-expand" style="font-size: 40px;"></i>
                    <i class="fas fa-angle-up control-icon control-icon-close" style="font-size: 40px;"></i>
                </summary>
                <div class="fade-in-top">
                    <p>Sí, claro, puedes realizar tus compras directamente en nuestra sede física en Bogotá, donde estaremos encantados de atenderte. La direccion es : Carrera 41B # 5-11, Barrio Primavera, Bogotá, Colombia</p>
                </div>
            </details>
            <details>
                <summary>
                    <h4>¿Cuál es el costo de envío?</h4>
                    <i class="fas fa-angle-down control-icon control-icon-expand" style="font-size: 40px;"></i>
                    <i class="fas fa-angle-up control-icon control-icon-close" style="font-size: 40px;"></i>
                </summary>
                <div class="fade-in-top">
                    El costo de envío depende de la ubicación y la cantidad de productos que compres. Puedes consultar el costo exacto del envío directamente en tu carrito de compras este incluye el iva, en el proceso de pago, donde se calculará el costo dependiendo de la dirección de entrega. Ofrecemos opciones de envío rápido y seguro, y si tienes alguna duda sobre los costos de envío, no dudes en contactarnos para más detalles.
                </div>
            </details>
            <details>
                <summary>
                    <h4>¿Cuánto tarda en llegar mi producto?</h4>
                    <i class="fas fa-angle-down control-icon control-icon-expand" style="font-size: 40px;"></i>
                    <i class="fas fa-angle-up control-icon control-icon-close" style="font-size: 40px;"></i>
                </summary>
                <div class="fade-in-top">
                    El tiempo de entrega depende de tu ubicación. Para los pedidos dentro de Bogotá, la entrega es generalmente de 2 días hábiles como máximo. Si realizas tu compra desde otras ciudades, el tiempo de envío variará según la transportadora seleccionada, pero te enviaremos actualizaciones constantes sobre el estado de tu pedido. Podrás consultar el progreso de tu entrega en la sección de "Mis Compras" dentro de tu cuenta en nuestra página web.
                </div>
            </details>
            </details>
            <details>
                <summary>
                    <h4>¿Qué medios de pago aceptan?</h4>
                    <i class="fas fa-angle-down control-icon control-icon-expand" style="font-size: 40px;"></i>
                    <i class="fas fa-angle-up control-icon control-icon-close" style="font-size: 40px;"></i>
                </summary>
                <div class="fade-in-top">
                    En nuestra página web aceptamos una amplia gama de métodos de pago para tu comodidad. Puedes pagar utilizando Mercado Pago (tarjetas de crédito y débito), PSE, Nequi, Daviplata, entre otros. Todos los pagos son procesados de manera segura, para que puedas realizar tu compra con confianza. Si tienes alguna preferencia por otro método de pago, no dudes en contactarnos para ver las opciones disponibles.
                </div>
            </details>
            </details>
            <details>
                <summary>
                    <h4>¿Puedo pagar contraentrega?</h4>
                    <i class="fas fa-angle-down control-icon control-icon-expand" style="font-size: 40px;"></i>
                    <i class="fas fa-angle-up control-icon control-icon-close" style="font-size: 40px;"></i>
                </summary>
                <div class="fade-in-top">
                    Sí, ofrecemos la opción de pagar contraentrega, pero esta opción solo está disponible para compras realizadas en nuestra sede física en Bogotá. Podrás hacer tu pedido en línea y luego elegir recogerlo directamente en nuestra tienda, donde podrás pagar en efectivo o con tarjeta al momento de retirar tu pedido.
                </div>
            </details>
            <details>
                <summary>
                    <h4>¿Puedo recibir varios productos en un solo paquete?</h4>
                    <i class="fas fa-angle-down control-icon control-icon-expand" style="font-size: 40px;"></i>
                    <i class="fas fa-angle-up control-icon control-icon-close" style="font-size: 40px;"></i>
                </summary>
                <div class="fade-in-top">
                    Sí, si compras varios productos a través de nuestra página web, puedes optar por recibir todos los productos en un solo paquete. Si prefieres ahorrar en costos de envío, también tienes la opción de "Retirar en persona", lo que te permitirá recoger todos los productos en nuestra sede física, sin gastos adicionales de envío.
                </div>
            </details>
            <details>
                <summary>
                    <h4>¿Puedo usar mi transportadora?</h4>
                    <i class="fas fa-angle-down control-icon control-icon-expand" style="font-size: 40px;"></i>
                    <i class="fas fa-angle-up control-icon control-icon-close" style="font-size: 40px;"></i>
                </summary>
                <div class="fade-in-top">
                    Sí, si prefieres usar tu propia transportadora para el envío, podemos despachar los productos a través de la empresa de tu elección. Sin embargo, ten en cuenta que el costo y seguro del envío serán responsabilidad del comprador. Si decides usar tu transportadora, por favor contáctanos previamente para coordinar los detalles y asegurarnos de que todo esté listo para el despacho.
                </div>
            </details>
            <details>
                <summary>
                    <h4>¿Por qué elegir Representaciones Gueos Ltda.?</h4>
                    <i class="fas fa-angle-down control-icon control-icon-expand" style="font-size: 40px;"></i>
                    <i class="fas fa-angle-up control-icon control-icon-close" style="font-size: 40px;"></i>
                </summary>
                <div class="fade-in-top">
                    <ol>
                        <li>CALIDAD GARANTIZADA: Todos nuestros productos cuentan con una excelente calidad. Nos aseguramos de ofrecerte solo lo mejor, con productos duraderos y confiables.</li>
                        <li>ATENCIÓN PERSONALIZADA: Nos esforzamos por brindarte una atención de calidad, adaptada a tus necesidades. Cada cliente es especial, y estamos aquí para ayudarte en todo momento, resolviendo cualquier duda o inquietud que puedas tener.
                        </li>
                        <li>ENVÍOS SEGUROS Y RÁPIDOS: Realizamos envíos a nivel nacional, con opciones de envío seguro y rápido. Nos aseguramos de que tus productos lleguen a tiempo y en perfectas condiciones, para que disfrutes de tu compra sin preocupaciones.</li>
                    </ol>
                </div>
            </details>
        </div>
    </div>


    <?php include 'footer.php'; ?>

    <script src="<?php echo SITE_URL; ?>js/bootstrap.bundle.min.js"></script>

</body>

</html>

<script>
    const details = document.querySelector('#question1');

    // Función para manejar el cambio de iconos
    details.addEventListener('toggle', function() {
        const expandIcon = this.querySelector('.control-icon-expand');
        const closeIcon = this.querySelector('.control-icon-close');

        if (this.open) {
            expandIcon.style.display = 'none'; // Ocultar la flecha hacia abajo
            closeIcon.style.display = 'block'; // Mostrar la flecha hacia arriba
        } else {
            expandIcon.style.display = 'block'; // Mostrar la flecha hacia abajo
            closeIcon.style.display = 'none'; // Ocultar la flecha hacia arriba
        }
    });
</script>