<?php

/**
 * Elimina imagen del producto
 * Autor: Marco Robles
 * Web: https://github.com/mroblesdev
 */

require '../config/config.php';

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header('Location: ../index.php');
    exit;
}

$urlImagen = $_POST['urlImagen'] ?? '';

if ($urlImagen !== '' && file_exists($urlImagen)) {
    unlink($urlImagen);
}
