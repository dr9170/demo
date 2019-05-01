<?php

require_once "Sii2Controller.php";
/**
 * AccesoController
 *
 */

/**
 * AccesoController
 *
 * Controlador que valida el acceso a ciertos scripts, esta es una validacion
 * necesaria para controlar que un usuario logueado, tiene distintos accesos,
 * y asi evitar vulnerabilidades dentro del sistema
 *
 * @package   Controlador
 * @author    Entelgy
 * @copyright 2017
 * @version   1.0
 * @access    public
 */
class AccesoController extends Sii2Controller {

    /**
     * AccesoController::index()
     *
     * La funcion index define la logica de cada modulo y controla
     * el ordenamiento de las acciones, y asi garantizar que las acciones tengan
     * una ejecucion logica y consistente
     *
     * @return
     */
    public function index() {
        return Utilitarias::redireccionarMetodos($this, $this->getMetodo());
    }

    /**
     * AccesoController::validar()
     *
     * Se valida el acceso de manera de constatar que se ha logueado por los canales dispuestos para ello
     * ademas de construir el objeto usuario que se mantiene en session para ser expuesto en el cliente
     *
     * @param string Extrae los valores en session
     *
     * @return string[] $usuario Objecto usuario que es seteado a partir de la session
     */
    public function validar() {
        if (SessionController::extraerVariable("valido_user") == "true") {
            SessionController::guardarVariable('acceso', "true");
            $usuario = array();
            $usuario["nombre"] = SessionController::extraerVariable("nombreusuario");
            $usuario["email"] = SessionController::extraerVariable("identificacionnombre");
            $usuario["cod_camara"] = SessionController::extraerVariable("codigoempresa");
            $usuario["path_camara"] = SessionController::extraerVariable("path_camara");
            $usuario["nombre_camara"] = SessionController::extraerVariable("nombre_camara");
            $usuario["tipo_usuario"] = SessionController::extraerVariable("idtipousuario");
            $parametrosSistema = file_get_contents(realpath(__DIR__ . '') . "/../config/parametrosGenerales.json");
            $array = json_decode($parametrosSistema, true);
            foreach ($array as $clave => $valor) {
                if ($clave === "llave_recaptcha_publica" || $clave === "llave_google_analytics") {
                    $usuario[$clave] = $valor;
                }
            }
            return (json_encode($usuario, true));
        } else {
            $dataRespuesta = array(parent::TXTCODIGOERROR => "E9999", parent::TXTMENSAJEERROR => "Error de sesión");
            return json_encode($dataRespuesta);
        }
    }

    /**
     * AccesoController::diccionario()
     *
     * Se realiza la encriptacion del diccionario para tenerlo disponible en cliente
     * y hacer dinamico el uso de la llave privada
     *
     * @param mixed[] $diccionario Datos tipo JSON que se extraen los valores del archivo de parametrizacion general con las palabras necesarias para traducir
     *
     * @return mixed[] $diccinarioHash Datos tipo JSON con el diccionario que sera usado en el cliente, el diccinario esta encriptado con la llave privada
     */
    public function diccionario() {
        $diccionario = file_get_contents(realpath(__DIR__ . '/..') . "/config/parametrosDiccionario.json");
        $diccinarioHash = array();
        unset($_SESSION["contenidoDiccionario"]);
        foreach (json_decode($diccionario, true)["diccionario"] as $val) {
            foreach ($val as $key => $val2) {
                $diccinarioHash[$key] = Utilitarias::encriptarValor($val2);
            }
            $_SESSION["contenidoDiccionario"][] = $val2;
        }
        return (json_encode($diccinarioHash));
    }

}
