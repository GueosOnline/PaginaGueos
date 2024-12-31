<?php

require 'config/config.php';
require_once 'config/database.php';
require 'vendor/autoload.php';


$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;


$lista_carrito = array();

if ($productos != null) {
    foreach ($productos as $clave => $cantidad) {

        $sql = $con->prepare("SELECT id, nombre, precio, descuento, $cantidad AS cantidad FROM productos WHERE id=? AND activo=1");
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
    }
} else {
    header("Location: index.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IEwedge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>

    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body>
    <!--Barra de Navegación-->
    <?php include 'header.php'; ?>

    <main>
        <div class="container ">

            <div class="row">
                <div class="col-6">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($lista_carrito == null) {
                                    echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
                                } else {

                                    $total = 0;
                                    foreach ($lista_carrito as $producto) {
                                        $_id = $producto['id'];
                                        $nombre = $producto['nombre'];
                                        $precio = $producto['precio'];
                                        $descuento = $producto['descuento'];
                                        $cantidad = $producto['cantidad'];
                                        $precio_desc = $precio - (($precio * $descuento) / 100);
                                        $subtotal = $cantidad * $precio_desc;
                                        $total += $subtotal;

                                ?>

                                        <tr>
                                            <td><?php echo $nombre; ?> </td>
                                            <td> <?php echo $cantidad . ' x ' . MONEDA . '<b>' . number_format($subtotal, 2, '.', ',') . '</b>'; ?> </td>
                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td>
                                            <h4>Pagas</h4>
                                        </td>
                                        <td>
                                            <p class="h3" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                                        </td>
                                    </tr>


                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-6">

                    <?php
                    $reference = uniqid('gueos_', true);
                    $totalwompi = $total * 100;
                    $data = $reference . '' . $totalwompi . 'COP' . INTEGRITY_WP;

                    // Generar la firma
                    $signature = hash('sha256', $data);

                    ?>

                    <form action="https://checkout.wompi.co/p/" method="GET">

                        <input type="hidden" name="public-key" value="<?php echo PUBLIC_KEY_WP; ?>" />
                        <input type="hidden" name="currency" value="COP" />
                        <input type="hidden" name="amount-in-cents" value=<?php echo $totalwompi; ?> />
                        <input type="hidden" name="reference" value="<?php echo $reference; ?>" />
                        <input type="hidden" name="signature:integrity" value="<?php echo $signature; ?>" />
                        <input type="hidden" name="redirect-url" value="<?php echo SITE_URL; ?>clases/captura_wp.php?status=approved" />
                        <input type="hidden" name="failure-redirect-url" value="<?php echo SITE_URL; ?>clases/fallo.php?status=rejected" />

                        <button type="submit">Pagar con Wompi</button>
                    </form>

                </div>

            </div>
        </div>
    </main>

    <?php

    $_SESSION['carrito']['total'] = $total;


    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>

    </script>

</body>

</html>