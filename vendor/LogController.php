<?php

/**
 * LogController
 *
 * Clase con metodo estaticos que ejercen control sobre la creacion de log
 *
 * @package   Vendor
 * @author    Entelgy
 * @copyright 2017
 * @version   1.0
 * @access    public
 */
class LogController
{

    const TXTPATHLOG = "pathLogs";
    const TXTACTIVALOG = "activaLogs";
    const TXTACTIVATRAZA = "trazaLogs";
    const TXTCAMARA = "codigoempresa";
    const TXTSINDATA = "SinData";
    const TXTSINMETODOSII2 = "SinMetodoSii2";
    const TXTLOG = "/log_";
    const TXTDATELOG = 'l jS \of F Y h:i:s A';

    /**
     * LogController::__construct()
     *
     * @return
     */
    public function __construct()
    {

    }

    /**
     * LogController::escribirLog()
     *
     * Metodo encargado de realizar la peticion al API de manera que se consuma
     * de manera satisfactoria y unificada en el sistema
     *
     * @param  mixed[] $data   Datos tipo Json que conforman los datos de peticion
     * @param  string  $metodoSii cadena de caracteres asociado al metodo del API que se desea acceder
     * @return mixed[] $result Datos tipo Json que conforman los datos de respuesta
     */
    public static function iniciarLog($data = self::TXTSINDATA, $metodoSii = self::TXTSINMETODOSII2)
    {
        if (SessionController::extraerVariable(self::TXTACTIVALOG) == "SI") {
            $metodoSii = strtolower($metodoSii);
            $logclase = new LogController;
            $dir = $logclase->construirRutaLog();
            $log = fopen($dir . self::TXTLOG . $metodoSii . "_" . date("Ymd") . ".log", "a+");
            fwrite($log, "================== INICIO ================== \n");
            fwrite($log, "---- Registro iniciado -> " . date(self::TXTDATELOG) . " (" . time() . ")\n");
            return fclose($log);
        } else {
            return false;
        }
    }

    /**
     * LogController::escribirLog()
     *
     * Metodo encargado de realizar la peticion al API de manera que se consuma
     * de manera satisfactoria y unificada en el sistema
     *
     * @param  mixed[] $data   Datos tipo Json que conforman los datos de peticion
     * @param  string  $metodo cadena de caracteres asociado al metodo del API que se desea acceder
     * @return mixed[] $result Datos tipo Json que conforman los datos de respuesta
     */
    public static function peticionLog($data = self::TXTSINDATA, $metodo = "SinMetodoApi", $metodoSii = self::TXTSINMETODOSII2)
    {
        if (SessionController::extraerVariable(self::TXTACTIVALOG) == "SI") {
            $metodoSii = strtolower($metodoSii);
            $logclase = new LogController;
            $dir = $logclase->construirRutaLog();
            $log = fopen($dir . self::TXTLOG . $metodoSii . "_" . date("Ymd") . ".log", "a+");
            fwrite($log, "###### Peticion: ###### \n");
            fwrite($log, $metodo . " -> " . date(self::TXTDATELOG) . " (" . time() . ")\n");
            fwrite($log, print_r(json_encode($data), true) . "\n");
            return fclose($log);
        } else {
            return false;
        }
    }

    /**
     * LogController::escribirLog()
     *
     * Metodo encargado de realizar la peticion al API de manera que se consuma
     * de manera satisfactoria y unificada en el sistema
     *
     * @param  mixed[] $data   Datos tipo Json que conforman los datos de peticion
     * @param  string  $metodo cadena de caracteres asociado al metodo del API que se desea acceder
     * @return mixed[] $result Datos tipo Json que conforman los datos de respuesta
     */
    public static function infoCurlLog($data = self::TXTSINDATA, $metodo = "SinMetodoApi", $metodoSii = self::TXTSINMETODOSII2)
    {
        if (SessionController::extraerVariable(self::TXTACTIVALOG) == "SI") {
            $metodoSii = strtolower($metodoSii);
            $logclase = new LogController;
            $dir = $logclase->construirRutaLog();
            $log = fopen($dir . self::TXTLOG . $metodoSii . "_" . date("Ymd") . ".log", "a+");
            fwrite($log, "###### Info Curl: ###### \n");
            fwrite($log, $metodo . " -> " . date(self::TXTDATELOG) . " (" . time() . ")\n");
            fwrite($log, print_r(json_encode($data), true) . "\n");
            return fclose($log);
        } else {
            return false;
        }
    }

    /**
     * LogController::escribirLog()
     *
     * Metodo encargado de realizar la peticion al API de manera que se consuma
     * de manera satisfactoria y unificada en el sistema
     *
     * @param  mixed[] $data   Datos tipo Json que conforman los datos de peticion
     * @param  string  $metodo cadena de caracteres asociado al metodo del API que se desea acceder
     * @return mixed[] $result Datos tipo Json que conforman los datos de respuesta
     */
    public static function trazaLog($data = self::TXTSINDATA, $metodoSii = self::TXTSINMETODOSII2)
    {
        if (SessionController::extraerVariable(self::TXTACTIVALOG) == "SI") {
            $metodoSii = strtolower($metodoSii);
            $logclase = new LogController;
            $dir = $logclase->construirRutaLog();
            $log = fopen($dir . self::TXTLOG . $metodoSii . "_" . date("Ymd") . ".log", "a+");
            fwrite($log, "###### Traza: ###### \n");
            if (SessionController::extraerVariable(self::TXTACTIVATRAZA) == "SI") {
                fwrite($log, print_r($data, true) . "\n");
            } else {
                fwrite($log, "Ha sido desactivado el seguimiento de la traza de peticion. \n");
            }
            return fclose($log);
        } else {
            return false;
        }
    }

    /**
     * LogController::escribirLog()
     *
     * Metodo encargado de realizar la peticion al API de manera que se consuma
     * de manera satisfactoria y unificada en el sistema
     *
     * @param  mixed[] $data   Datos tipo Json que conforman los datos de peticion
     * @param  string  $metodo cadena de caracteres asociado al metodo del API que se desea acceder
     * @return mixed[] $result Datos tipo Json que conforman los datos de respuesta
     */
    public static function respuestaLog($data = self::TXTSINDATA, $metodoSii = self::TXTSINMETODOSII2)
    {
        if (SessionController::extraerVariable(self::TXTACTIVALOG) == "SI") {
            $metodoSii = strtolower($metodoSii);
            $logclase = new LogController;
            $dir = $logclase->construirRutaLog();
            $log = fopen($dir . self::TXTLOG . $metodoSii . "_" . date("Ymd") . ".log", "a+");
            fwrite($log, "###### Respuesta: ###### \n");
            fwrite($log, print_r($data, true) . "\n");
            return fclose($log);
        } else {
            return false;
        }
    }

    /**
     * LogController::escribirLog()
     *
     * Metodo encargado de realizar la peticion al API de manera que se consuma
     * de manera satisfactoria y unificada en el sistema
     *
     * @param  mixed[] $data   Datos tipo Json que conforman los datos de peticion
     * @param  string  $metodo cadena de caracteres asociado al metodo del API que se desea acceder
     * @return mixed[] $result Datos tipo Json que conforman los datos de respuesta
     */
    public static function finLog($metodoSii = self::TXTSINMETODOSII2)
    {
        if (SessionController::extraerVariable(self::TXTACTIVALOG) == "SI") {
            $metodoSii = strtolower($metodoSii);
            $logclase = new LogController;
            $dir = $logclase->construirRutaLog();
            $log = fopen($dir . self::TXTLOG . $metodoSii . "_" . date("Ymd") . ".log", "a+");
            fwrite($log, "---- Registro culminado -> " . date(self::TXTDATELOG) . " (" . time() . ")\n");
            fwrite($log, "================== FIN ================== \n");
            return fclose($log);
        } else {
            return false;
        }
    }

    /**
     * LogController::escribirLog()
     *
     * Metodo encargado de realizar la peticion al API de manera que se consuma
     * de manera satisfactoria y unificada en el sistema
     *
     * @param  mixed[] $data   Datos tipo Json que conforman los datos de peticion
     * @param  string  $metodo cadena de caracteres asociado al metodo del API que se desea acceder
     * @return mixed[] $result Datos tipo Json que conforman los datos de respuesta
     */
    public static function log_trace($message = '')
    {
        $trace = debug_backtrace();
        $caller = array_shift($trace);
        $txtFunction = "function";
        $function_name = $caller[$txtFunction];
        $message .= sprintf('%s: Called from %s:%s', $function_name, $caller['file'], $caller['line']) . "\n";
        foreach ($trace as $entry_id => $entry) {
            $entry['file'] = $entry['file'] ?: '-';
            $entry['line'] = $entry['line'] ?: '-';
            if (empty($entry['class'])) {
                $message .= sprintf('%s %3s. %s() %s:%s', $function_name, $entry_id + 1, $entry[$txtFunction], $entry['file'], $entry['line']) . "\n";
            } else {
                $message .= sprintf('%s %3s. %s->%s() %s:%s', $function_name, $entry_id + 1, $entry['class'], $entry[$txtFunction], $entry['file'], $entry['line']) . "\n";
            }
        }
        return $message;
    }

    /**
     * LogController::escribirLog()
     *
     * Metodo encargado de realizar la peticion al API de manera que se consuma
     * de manera satisfactoria y unificada en el sistema
     *
     * @param  mixed[] $data   Datos tipo Json que conforman los datos de peticion
     * @param  string  $metodo cadena de caracteres asociado al metodo del API que se desea acceder
     * @return mixed[] $result Datos tipo Json que conforman los datos de respuesta
     */
    function construirRutaLog()
    {
        $camara = SessionController::extraerVariable(self::TXTCAMARA);
        if (isset($camara) != false && $camara != "") {
            $dir = SessionController::extraerVariable(self::TXTPATHLOG) . "/" . $camara . "/" . date("Ymd");
            if (!file_exists($dir)) {
                mkdir($dir, 0775, true);
            }
        } else {
            $dir = SessionController::extraerVariable(self::TXTPATHLOG) . "/general/" . date("Ymd");
            if (!file_exists($dir)) {
                mkdir($dir, 0775, true);
            }
        }
        return $dir;
    }

    /**
     * LogController::escribirLog()
     *
     * Metodo encargado de realizar la peticion al API de manera que se consuma
     * de manera satisfactoria y unificada en el sistema
     *
     * @param  mixed[] $data   Datos tipo Json que conforman los datos de peticion
     * @param  string  $metodo cadena de caracteres asociado al metodo del API que se desea acceder
     * @return mixed[] $result Datos tipo Json que conforman los datos de respuesta
     */
    public static function errorLog($data = self::TXTSINDATA)
    {
        if (SessionController::extraerVariable(self::TXTACTIVALOG) == "SI") {
            $logclase = new LogController;
            $dir = $logclase->construirRutaLog();
            $log = fopen($dir . "/log_myErrorHandler_" . date("Ymd") . ".log", "a+");
            fwrite($log, "================== INICIO ================== \n");
            fwrite($log, "---- Registro iniciado -> " . date(self::TXTDATELOG) . " (" . time() . ")\n");
            fwrite($log, "###### Error: ###### \n");
            fwrite($log, print_r($data, true) . "\n");
            fwrite($log, "================== FIN ================== \n");
            return fclose($log);
        } else {
            return false;
        }
    }

    /**
     * LogController::logUsuarios()
     *
     * Metodo encargado de realizar la peticion al API de manera que se consuma
     * de manera satisfactoria y unificada en el sistema
     *
     * @param  mixed[] $data   Datos tipo Json que conforman los datos de peticion
     * @param  string  $metodo cadena de caracteres asociado al metodo del API que se desea acceder
     * @return mixed[] $result Datos tipo Json que conforman los datos de respuesta
     */
    public static function logUsuarios($data = self::TXTSINDATA)
    {
        if (SessionController::extraerVariable(self::TXTACTIVALOG) == "SI") {
            $logclase = new LogController;
            $dir = $logclase->construirRutaLog();
            $pathCompleto = $dir . self::TXTLOG . "USUARIOSCONECTADOS_" . date("Ymd") . ".log";
            if(!file_exists($pathCompleto)){
              $log = fopen($pathCompleto, "a+");
              fwrite($log, "Usuario;Hora;Camara;Tipo de usuario;Nombre\n");
              fwrite($log, $data["emailusuario"].";".date("Ymd")."-".date("H:i:s").";".SessionController::extraerVariable(self::TXTCAMARA).";".$data["idtipousuario"].";".$data["nombreusuario"]."\n");
            }else{
              $log = fopen($pathCompleto, "a+");
              fwrite($log, $data["emailusuario"].";".date("Ymd")."-".date("H:i:s").";".SessionController::extraerVariable(self::TXTCAMARA).";".$data["idtipousuario"].";".$data["nombreusuario"]."\n");
            }
            return fclose($log);
        } else {
            return false;
        }
    }

}
