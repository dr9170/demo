<?php

/**
 * Autoload
 *
 * Script que realizar inclusiones automatica de los script que son instanciados
 * desde cualquier parte del sistema, a partir del llamado de funciones
 * anonimas
 *
 * @package   Vendor
 * @author    Entelgy
 * @copyright
 * @version   2017
 * @access    public
 */
date_default_timezone_set('America/Bogota');

spl_autoload_register(
        /**
         * @param $nombre
         * @return string|void
         */
        function ($nombre)
{
    $dir = realpath(__DIR__) . "/";
    if (file_exists($dir . '../controlador/' . $nombre . '.php')) {
        $dir = $dir . '../controlador/';
    } elseif (file_exists($dir . '../vendor/' . $nombre . '.php')) {
        $dir = $dir . '../vendor/';
    }
    try {
        if (file_exists($dir . '/' . $nombre . '.php')) {
            include_once $dir . '/' . $nombre . '.php';
            return;
        }
    } catch (Exception $e) {
        return json_encode(array("codigoerror" => "E9999", "mensajeerror" => "Imposible cargar: " . $e->getMessage()));
    }
}
);
