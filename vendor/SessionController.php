<?php

/**
 * SessionController
 */

/**
 * SessionController
 *
 * Controlador que maneja y contiene las acciones necesarias para
 * llevar acabo un manejo efectivo de sesiones y ofrecer una interfaz
 * que sea estandar
 *
 * @package   vendor
 * @author    Entelgy
 * @copyright
 * @version   2017
 * @access    public
 */
class SessionController
{

    /**
     * Constante con el texto cod_camara
     */
    const TXTCODCAMARA = "cod_camara";

    /**
     * SessionController::index()
     *
     * Iniciar la session en caso de que no este iniciada, cargar los parametros
     * globales y los particulares de cada camara, en la sesion
     *
     * @return
     */
    public static function index()
    {
        $dir = dirname(realpath(__DIR__ . ''));
        if (empty($_SESSION)) {
            @session_start();
            $parametrosSistema = file_get_contents($dir . "/config/parametrosGenerales.json");
            $array = json_decode($parametrosSistema, true);
            foreach ($array as $clave => $valor) {
                SessionController::guardarVariable($clave, $valor);
            }
            $parametrosDiccionario = file_get_contents($dir . "/config/parametrosDiccionario.json");
            $array = json_decode($parametrosDiccionario, true);
            foreach ($array as $clave => $valor) {
                SessionController::guardarVariable($clave, $valor);
            }
            SessionController::get_client_ip();
        }
        if(isset($_POST["z_c"]) && $_POST["z_c"] != ""){
          $parametros = Utilitarias::valorEncriptado($_POST["z_c"]);
          if (isset($parametros[3]) && !SessionController::extraerVariable("valido_user")) {
              if (file_exists(realpath($dir . "/config/parametrosConfigCamara_" . $parametros[3] . ".json"))) {
                  $parametrosSistema = file_get_contents(realpath($dir . "/config/parametrosConfigCamara_" . $parametros[3] . ".json"));
              } else {
                  $msj = array("codigoerror" => "E9999", "mensajeerror" => "No se encuentra configurada la camara seleccionada");
                  die(print_r(json_encode($msj), true));
              }
              $array = json_decode($parametrosSistema, true);
              SessionController::guardarVariable("codigoempresa", $parametros[3]);
              foreach ($array as $clave => $valor) {
                  SessionController::guardarVariable($clave, $valor);
              }
              SessionController::construirLocalPeticion();
          }
        }else{
          if (isset($_GET[self::TXTCODCAMARA]) && !SessionController::extraerVariable("valido_user")) {
            if (file_exists(realpath($dir . "/config/parametrosConfigCamara_" . $_GET[self::TXTCODCAMARA] . ".json"))) {
              $parametrosSistema = file_get_contents(realpath($dir . "/config/parametrosConfigCamara_" . $_GET[self::TXTCODCAMARA] . ".json"));
            } else {
              $msj = array("codigoerror" => "E9999", "mensajeerror" => "No se encuentra configurada la camara seleccionada");
              die(print_r(json_encode($msj), true));
            }
            $array = json_decode($parametrosSistema, true);
            SessionController::guardarVariable("codigoempresa", $_GET[self::TXTCODCAMARA]);
            foreach ($array as $clave => $valor) {
              SessionController::guardarVariable($clave, $valor);
            }
            SessionController::construirLocalPeticion();
          }
        }
    }

    /**
     * SessionController::guardarVariable()
     *
     * Metodo encargador de setear una variable en la session
     *
     * @param  string $nombre Nombre de la variable que sera asignada en la session
     * @param  mixed  $valor  Valor que estara asociado al nombre de la variable
     * @return
     */
    public static function guardarVariable($nombre, $valor)
    {
        $_SESSION[$nombre] = $valor;
        return;
    }

    /**
     * SessionController::extraerVariable()
     *
     * Metodo encargado de recuperar una variable de sesion
     *
     * @param  string $nombre Nombre de la variable que se desea extraer de la session
     * @return mixed $_SESSION['nombre'] Retornara el valor que se encuentra asociado al nombre solicitado
     * en caso de que no exista la variable, retorna false
     */
    public static function extraerVariable($nombre)
    {
        if (isset($_SESSION[$nombre])) {
            return $_SESSION[$nombre];
        } else {
            return false;
        }
    }

    /**
     * SessionController::construirLocalPeticion()
     *
     * Metodo encargado de construir la peticion al API a partir de las configuraciones
     * descritas en el archivo de configuracion
     */
    public static function construirLocalPeticion()
    {
        $url = SessionController::extraerVariable("protocolo_api") . "://" . SessionController::extraerVariable("host_api");
        SessionController::guardarVariable("url_api", $url);
    }

    /**
     * SessionController::eliminarVariable()
     *
     * @param  string $nombre Nombre de la variable que se desea eliminar de la session
     *
     * Metodo que libera una variable en sesssion
     */
    public static function eliminarVariable($nombre)
    {
        if (isset($_SESSION[$nombre])) {
            unset($_SESSION[$nombre]);
        }
    }

    /**
     * SessionController::get_client_ip()
     *
     * Metodo para identificar el ip desde donde se conecta la app
     *
     * @return string[] $ipaddress Ip del cliente
     */
    public static function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP')) {
            $ipaddress = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ipaddress = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ipaddress = getenv('HTTP_FORWARDED');
        } elseif (getenv('REMOTE_ADDR')) {
            $ipaddress = getenv('REMOTE_ADDR');
        } else {
            $ipaddress = 'UNKNOWN';
        }
        $_SESSION["ip_cliente"] = $ipaddress;
    }

}
