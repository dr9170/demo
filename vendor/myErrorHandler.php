<?php

/**
 * MyErrorHandler
 *
 * Clase con metodo estaticos que ejercen control sobre los errores para ser registrados por el log
 *
 * @package   Vendor
 * @author    Entelgy
 * @copyright 2017
 * @version   1.0
 * @access    public
 */
class MyErrorHandler
{

    const DATEHIS = "H:i:s";
    const DATEYMD = "Y-m-d";
    const TXTERRLINE = 'Error en linea ';
    const TXTSCRIPT = ' en script ';

    /**
     * LogController::__construct()
     *
     * @return
     */
    public function __construct()
    {
        set_error_handler(array('MyErrorHandler', "log_error"), E_ALL);
        ini_set("display_errors", "off");
        error_reporting(E_ALL);
    }

    function log_error($errno, $errstr, $errfile, $errline)
    {
        switch ($errno) {
            case E_USER_ERROR:

                $txt = date(DATEYMD) . ' - ' . date(DATEHIS) . ' - ERROR: [' . $errno . '] - ' . $errstr . chr(13) . chr(10);
                $txt .= self::TXTERRLINE . $errline . self::TXTSCRIPT . $errfile . chr(13) . chr(10);
                $txt .= "proceso abortado" . chr(13) . chr(10);
                LogController::errorLog(utf8_encode($txt));
                echo "Se presento un error que bloqueo la ejecucion del script";
                exit(1);
                break;

            case E_USER_WARNING:
                $txt = date(DATEYMD) . ' - ' . date(DATEHIS) . ' - WARNING: [' . $errno . '] - ' . $errstr . chr(13) . chr(10);
                $txt .= self::TXTERRLINE . $errline . self::TXTSCRIPT . $errfile . chr(13) . chr(10);
                LogController::errorLog(utf8_encode($txt));
                break;

            case E_USER_NOTICE:
                $txt = date(DATEYMD) . ' - ' . date(DATEHIS) . ' - NOTICE: [' . $errno . '] - ' . $errstr . chr(13) . chr(10);
                $txt .= self::TXTERRLINE . $errline . self::TXTSCRIPT . $errfile . chr(13) . chr(10);
                LogController::errorLog(utf8_encode($txt));
                break;

            case E_ERROR:
                $txt = date(DATEYMD) . ' - ' . date(DATEHIS) . ' - ERROR FATAL: [' . $errno . '] - ' . $errstr . chr(13) . chr(10);
                $txt .= self::TXTERRLINE . $errline . self::TXTSCRIPT . $errfile . chr(13) . chr(10);
                LogController::errorLog(utf8_encode($txt));
                break;

            default:
                $txt = date(DATEYMD) . ' - ' . date(DATEHIS) . ' - ERROR DESCONOCIDO [' . $errno . '] - ' . $errstr . chr(13) . chr(10);
                $txt .= self::TXTERRLINE . $errline . self::TXTSCRIPT . $errfile . chr(13) . chr(10);
                LogController::errorLog(utf8_encode($txt));
                break;
        }
        return true;
    }

}
