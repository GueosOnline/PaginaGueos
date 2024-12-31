<?php

//Parametros para configuración

$path = dirname(__FILE__) . DIRECTORY_SEPARATOR;

require_once $path . 'database.php';
require_once $path . '../clases/cifrado.php';

$db = new Database();
$con = $db->conectar();

$sql = "SELECT nombre, valor FROM configuracion";
$resultado = $con->query($sql);
$datosConfig = $resultado->fetchAll(PDO::FETCH_ASSOC);

$config = [];

foreach ($datosConfig as $datoConfig) {
    $config[$datoConfig['nombre']] = $datoConfig['valor'];
}

#--------------------------------------------------------------------
# Configuración del sistema
#--------------------------------------------------------------------

/**
 * URL de la tienda
 *
 * Agregar / al final
 */
define('SITE_URL', 'http://localhost:8080/tienda_online/');

/**
 * Clave o contraseña para cifrado.
 */
define("KEY_CIFRADO", "ABCD.1234-");

/**
 * Metodo de cifrado OpenSSL.
 *
 * https://www.php.net/manual/es/function.openssl-get-cipher-methods.php
 */
define("METODO_CIFRADO", "aes-128-cbc");

/**
 * Simbolo de moneda
 */
define("MONEDA", $config['tienda_moneda']);


#--------------------------------------------------------------------
# Configuración para Wompi
#--------------------------------------------------------------------
define("PUBLIC_KEY_WP", $config['wp_public']);
define("PRIVATE_KEY_WP", $config['wp_private']);
define("EVENTS_WP", $config['wp_events']);
define("INTEGRITY_WP", $config['wp_integrity']);

#--------------------------------------------------------------------
# Configuración para Mercado Pago
#--------------------------------------------------------------------
define("TOKEN_MP", $config['mp_token']);
define("PUBLIC_KEY_MP", $config['mp_clave']);
define("LOCALE_MP", "es-MX");


#--------------------------------------------------------------------
# Datos para envio de correo electronico
#--------------------------------------------------------------------
define("MAIL_HOST", $config['correo_smtp']);
define("MAIL_USER", $config['correo_email']);
define("MAIL_PASS", descifrar($config['correo_password'], ['key' => KEY_CIFRADO, 'method' => METODO_CIFRADO]));
define("MAIL_PORT", $config['correo_puerto']);



// Destruir variable
unset($config);

// Sesión para tienda
session_name('ecommerce_session');
session_start();

$num_cart = 0;
if (isset($_SESSION['carrito']['productos'])) {
    $num_cart = count($_SESSION['carrito']['productos']);
}
