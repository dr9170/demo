<?php

/**
 * PlantillaController
 *
 */

/**
 * PlantillaController
 *
 * Controlador que configura y parametriza comportamiento
 * de la vista
 *
 * @package   Controlador
 * @author    Entelgy
 * @copyright 2017
 * @version   1.0
 * @access    public
 */
class PlantillaController extends Sii2Controller
{

    /**
     * PlantillaController::index()
     *
     * La funcion index define la logica de cada modulo y controla
     * el ordenamiento de las acciones, y asi garantizar que las acciones tengan
     * una ejecucion logica y consistente
     * Se realiza una validacion de la sesion que instancio la clase y el
     * id de ruta asociado a ella
     *
     * @return
     */
    public function index()
    {
        return Utilitarias::redireccionarMetodos($this, parent::getMetodo());
    }

    /**
     * PlantillaController::configuracion()
     *
     * Se consulta la parametria de la vista, para que sea renderizada segun el json de configuracion
     *
     * @return mixed[] $configuracion Datos Json de parametria del archivo de parametrosPlantilla.json
     */
    public function configuracion()
    {
        $configuracion = file_get_contents(realpath(__DIR__ . '') . "/../config/parametrosPlantilla.json");
        $parametrosSistema = file_get_contents(realpath(__DIR__ . '') . "/../config/parametrosGenerales.json");
        $configuracion1 = json_decode($configuracion, TRUE);
        $array = json_decode($parametrosSistema, true);
        foreach ($array as $clave => $valor) {
            if($clave === "llave_recaptcha_publica" || $clave === "llave_google_analytics"){
              $configuracion1[] = array($clave => $valor);
            }
        }
        return $configuracion1;
    }

}
