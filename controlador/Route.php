<?php

require_once realpath(__DIR__) . '/../vendor/Autoload.php';
SessionController::index();

/**
 * Route
 *
 * Controlador encargado de redireccionar todas las peticiones del servidor, de manera que se
 * segmente la logica de acceso y centralizar a su vez las peticiones
 *
 * @package   Controlador
 * @author    Entelgy
 * @copyright 2017
 * @version   1.0
 * @access    public
 */
class Route
{

    private $controlador;
    private $metodo;
    private $id_ruta;
    private $mErrSession = array('codigoerror' => "E0000", 'mensajeerror' => "<p>El usuario no se encuentra autenticado en el sistema.</p> <p>Por favor incie sesión haciendo clic <a class='h5' href=\"javascript:location.href = 'index.php'\"> aquí</a>.</p>");

    /**
     * Route::__construct()
     *
     * Asignar un numero unico para cada peticion y asi identificar y controlar todos las peticion
     * captura y setea la peticion encriptada de controlador (x_c) y metodo (y_c)
     * Setear el id de la ruta con el cual se instancio la clase y el metodo
     * requerido
     *
     * @return
     */
    public function __construct()
    {
        $this->id_ruta = mt_rand(0, 10000000);
        SessionController::guardarVariable('id_ruta', $this->id_ruta);
        SessionController::guardarVariable("info", '');

        if (isset($_POST['x_c']) && isset($_POST['y_c'])) {
            $this->controlador = $_POST['x_c'];
            $this->metodo = $_POST['y_c'];
            Route::index();
        } else {
            if (isset($_GET['x_c']) && isset($_GET['y_c'])) {
                $this->controlador = $_GET['x_c'];
                $this->metodo = $_GET['y_c'];
                Route::index();
            } else {
                $msj = array("tipo_mensaje" => "E9999", "mensaje" => "No se recibieron las variables!", "codigoerror" => "9999", "mensajeerror" => "No se recibieron las variables!");
                return $this->setResponse(json_encode($msj));
            }
        }
    }

    /**
     * Route::index()
     *
     * La funcion index sera el punto de partida para definir la logica de cada uno de los controladores
     * de manera que cada controlador ejerza una unidad minima de control sobre si mismo y los procesos
     * a los cuales esta sirviendo.
     * Utilizamos un diccionario de traducciones HASH para comparar y redirigir correctamente
     * El metodo acceso se llama desde el validar.js para verificar que se tiene acceso a esa
     * plantilla
     *
     * @return
     */
    public function index()
    {
        if (($this->controlador === SessionController::extraerVariable("llave_publica")) && ($this->metodo === SessionController::extraerVariable("llave_publica"))) {
            $obj = new AccesoController($this->id_ruta, "diccionario");
            LogController::iniciarLog("", "diccionario");
            return $this->setResponse($obj->index(), "diccionario");
        } else {
            $contr = Utilitarias::traducir($this->controlador);
            $met = Utilitarias::traducir($this->metodo);
        }
        LogController::iniciarLog("", Utilitarias::traducir($this->metodo));
        if ($contr == 'Plantilla' || $contr == 'Acceso' || $contr == 'Login' || $contr == 'Lanzador') {
            return Route::direccionarControlador($contr, $met, $this->id_ruta);
        } else {
            return Route::validarDireccionamientoControlador($contr, $met, $this->id_ruta);
        }
    }

    /**
     * Route::validarDireccionamientoControlador()
     *
     * Valida y direcciona el controlador validando el acceso al API
     *
     * @return string $controlador cadena con el controlador al que sera pasado la peticion
     */
    public function validarDireccionamientoControlador($controlador, $m)
    {
        if ($this->getUsuValido() == "true") {
            return Route::direccionarControlador($controlador, $m);
        } else {
            return Route::setResponse(json_encode($this->mErrSession), $m);
        }
    }

    /**
     * Route::direccionarControlador()
     *
     * Direcciona el controlador validando el acceso al API
     *
     * @return string $controlador cadena con el controlador al que sera pasado la peticion
     */
    public function direccionarControlador($controlador, $m)
    {
        $name = $controlador . "Controller";
        if (is_callable(array($name, $m))) {
          // echo $name . " -> " . $m. " -> " .$this->id_ruta;
            return $this->setResponse(@call_user_func_array(array($name, $m), array($this->getId_ruta(), $m)), $m);
        } else {
            $dataRespuesta = array('codigoerror' => "E9998", 'mensajeerror' => "No se encuentra -> Controlador: " . $this->getControlador() . " Método: " . $m);
            return $this->setResponse(json_encode($dataRespuesta), $m);
        }
    }

    /**
     * Route::getControlador()
     *
     * Extraer el controlador asociado a la peticion de ruteo
     *
     * @return string $controlador cadena con el controlador al que sera pasado la peticion
     */
    public function getControlador()
    {
        return $this->controlador;
    }

    /**
     * Route::setControlador()
     *
     * Modificar el controlador asociado a la peticion de ruteo
     *
     * @param string $controlador cadena con el controlador al que sera pasado la peticion
     */
    public function setControlador($controlador)
    {
        $this->controlador = $controlador;
    }

    /**
     * Route::getMetodo()
     *
     * Extraer el metodo asociado a la peticion de ruteo
     *
     * @return string $metodo Metodo que se encuentra en el objeto
     */
    public function getMetodo()
    {
        return $this->metodo;
    }

    /**
     * Route::setMetodo()
     *
     * Modificar el metodo asociado a la peticion de ruteo
     *
     * @param string $metodo El metodo que se utilizara en el controlador
     */
    public function setMetodo($metodo)
    {
        $this->metodo = $metodo;
    }

    /**
     * Route::setRespuestas()
     *
     * Envía los mensajes retornados en formato JSON
     * Los tipos de mensajes (tipo_mensaje) para ser renderizados con boostrap son: success, info, warning, danger
     *
     * @param  mixed $param Array asociativo que contiene los mensajes en caso de que exista un error en la peticion al route
     * @return mixed $msj Datos en json de errores en la peticion al route
     */
    public function setRespuestas($param)
    {
        if (is_array($param)) {
            print_r($param);
        } else {
            echo $param;
        }
    }

    /**
     * Route::setResponse()
     *
     * Envía los mensajes retornados en formato JSON y encabezados JSON con las respuestas del API
     *
     * @param  mixed $param Datos en json de los métodos
     * @return mixed $param Datos en json de los métodos
     */
    public function setResponse($param, $metodo = "SinMetodo")
    {
        LogController::trazaLog(LogController::log_trace(), $metodo);
        LogController::respuestaLog($param, $metodo);
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        if (is_array($param)) {
            print_r(json_encode($param));
        } else {
            echo $param;
        }
        LogController::finLog($metodo);
    }

    /**
     * Route::getUsuValido()
     *
     * Responde si el usuario está identificado y es válido en el sistema
     *
     * @return string con el valor de la variable "valido_user"
     */
    public function getUsuValido()
    {
        return SessionController::extraerVariable("valido_user");
    }

    function getId_ruta()
    {
        return $this->id_ruta;
    }

}

$peticion = new Route();
