<?php

define("TXTLLAVEPRIVADA", "llave_privada");

define("TXTCODIGOERROR", "codigoerror");

define("TXTMENSAJEERROR", "mensajeerror");

define("ERRROUTE", json_encode(array(TXTCODIGOERROR => "E9999", TXTMENSAJEERROR => "Acceder por el route / Peticion negada")));

define("ERRSESION", json_encode(array(TXTCODIGOERROR => "E9998", TXTMENSAJEERROR => "Error de sesión")));

define("ERRMETODO", json_encode(array(TXTCODIGOERROR => "E9997", TXTMENSAJEERROR => "HTTP/1. 404 Not Found")));

define("ERRINCOMPLETO", json_encode(array(TXTCODIGOERROR => "E9996", TXTMENSAJEERROR => "Parámetros incompletos")));

define("ERRCOMUNICACIONAPI", json_encode(array(TXTCODIGOERROR => "E9995", TXTMENSAJEERROR => "Ocurrió un error de comunicación con el API, por favor intente más tarde.")));

/**
 * Utilitarias
 *
 * Clase con metodo estaticos que ofrecen metodos transversales entre todos
 * controladores y clases
 *
 * @package   Vendor
 * @author    Entelgy
 * @copyright 2017
 * @version   1.0
 * @access    public
 */
class Utilitarias
{

    /**
     * Utilitarias::__construct()
     *
     * @return
     */
    public function __construct()
    {

    }

    /**
     * Utilitarias::traducir()
     *
     * Diccionario de traducciones HASH para comparar
     *
     * @param  string $hash Cadena de caracteres encriptada para buscar su traduccion en el metodo
     * @return string $string Nombre natural de la traduccion, hallada en el diccinario
     */
    public static function traducir($hash)
    {
        $respuesta = "Nada para traducir!";
        $txtCrypt = array();
        $valoresDiccionario = array(
            'LoginController' => 'Login',
            'validar' => 'validar',
            'recuperarPass' => 'recuperarPass',
            'registro' => 'registro',
            'menu' => 'menu',
            'ConsultaRegistroPublicosController' => 'ConsultaRegistroPublicos',
            'consultaExpedientes' => 'consultaExpedientes',
            'liquidacion' => 'liquidacion',
            'solicitudRegistro' => 'solicitudRegistro',
            'noticias' => 'noticias',
            'relaRenovados' => 'relaRenovados',
            'relaMatriculados' => 'relaMatriculados',
            'propoActivo' => 'propoActivo',
            'rutaDoc' => 'rutaDoc',
            'expGraf' => 'expGraf',
            'RenovacionController' => 'Renovacion',
            'renovarMatri' => 'renovarMatri',
            'certificado' => 'certificado',
            'salir' => 'salir',
            'AccesoController' => 'Acceso',
            'PlantillaController' => 'Plantilla',
            'configuracion' => 'configuracion',
            'HomeController' => 'Home',
            'inforDiaria' => 'inforDiaria',
            'verificar' => 'verificar',
            'mistramites' => 'mistramites',
            'renovarCancelarMatricula' => 'renovarCancelarMatricula',
            'listaMatriculasRenovar' => 'listaMatriculasRenovar',
            'recupLiq' => 'recuperarLiquidacion',
            'verAnexo' => 'verAnexo',
            'eliminarAnexo' => 'eliminarAnexo',
            'cargarAnexo' => 'cargarAnexo',
            'almacenarFormulario' => 'almacenarFormulario',
            'cargarFormulario' => 'cargarFormulario',
            'buscarCiiu' => 'buscarCiiu',
            'cargarBalance' => 'cargarBalance',
            'imprimirFormulario' => 'imprimirFormulario',
            'buscaBarrio' => 'buscaBarrio',
            'generarVolante' => 'generarVolante',
            'marcarPagarCaja' => 'marcarPagarCaja',
            'verMultas' => 'verMultas',
            'historialTransacciones' => 'historialTransacciones',
            'realizarCambioClaveAfiliado' => 'realizarCambioClaveAfiliado',
            'relRenovados' => 'relRenovados',
            'generarCambioClavePrepago' => 'generarCambioClavePrepago',
            'consMatriculados' => 'consMatriculados',
            'getListadoLibros' => 'getListadoLibros',
            'obtenerFormulariosEnBlanco' => 'obtenerFormulariosEnBlanco',
            'noticiasRegistrosPublicos' => 'noticiasRegistrosPublicos',
            'expedienteGrafico' => 'expedienteGrafico',
            'rutaDocumentos' => 'rutaDocumentos',
            'camposFormExpGraf' => 'camposFormExpGraf',
            'listadoMunicipios' => 'listadoMunicipios',
            'traerReportesEE' => 'traerReportesEE',
            'consGeoreferenciado' => 'consGeoreferenciado',
            'borrarAnexoExpGraf' => 'borrarAnexoExpGraf',
            'desistimientosDecretados' => 'desistimientosDecretados',
            'cytresultadoRecibos' => 'cytresultadoRecibos',
            'consSolicitudesRegistro' => 'consSolicitudesRegistro',
            'vinculosIdentificacion' => 'vinculosIdentificacion',
            'ruesContraMultaSancion' => 'ruesContraMultaSancion',
            'recibirCambioEstadoRadicado' => 'recibirCambioEstadoRadicado',
            'listadoMunicipiosCamara' => 'listadoMunicipiosCamara',
            'detalleExpediente' => 'detalleExpediente',
            'guardarLibro' => 'guardarLibro',
            'verSello' => 'verSello',
            'PDFSipref' => 'PDFSipref',
            'visualizacionFormularioEnBlanco' => 'visualizacionFormularioEnBlanco',
            'anexosRutaDoc' => 'anexosRutaDoc',
            'imprFormConsultaDetallada' => 'imprFormConsultaDetallada',
            'verCertificadoSiiLibros' => 'verCertificadoSiiLibros',
            'mostrarCertificadoSii' => 'mostrarCertificadoSii',
            'ProponenteController' => 'Proponente',
            'tipoDocumentoUsuario' => 'tipoDocumentoUsuario',
            'exportarXmlProponente' => 'exportarXmlProponente',
            'MercantilController' => 'Mercantil',
            'generarXmlMercantil' => 'generarXmlMercantil',
            'accionesBusquedaExp' => 'accionesBusquedaExp',
            'importarXml' => 'importarXml',
            'ActualizarProponente' => 'ActualizarProponente',
            'actualizarProponenteInicio' => 'pantallaActualizarProponenteInicio',
            'IPC_Controller' => 'InscripcionProponente',
            'IPC_Inicio' => 'pantallasInscripcionProponenteInicio',
            'Utilitarias' => 'Utilitarias',
            'CambioDomicilio' => 'CambioDomicilio',
            'pantallaCambioDomicilioInicio' => 'pantallaCambioDomicilioInicio',
            'detalleProponente' => 'detalleProponente',
            'SolicitudCertificadosController' => 'SolicitudCertificados',
            'IPC_selExpediente' => 'seleccionExpedienteProponente',
            'IPC_cKardex' => 'consultaKardexProponente',
            'IPC_consultaLiquidacion' => 'formularioLiquidacionInscripcionProponente',
            'tipoSolicitudedCertificados' => 'traerDatosSolicitudCertificado',
            'IPC_capturaFormularioProponente' => 'capturaFormularioProponente',
            'generarLiquidacionCertificados' => 'generarLiquidacionCertificados',
            'IPC_cargarAnexoProponentes' => 'cargarAnexoProponentes',
            'IPC_generarDeclaracionProponente' => 'generarDeclaracionProponente',
            'IPC_grbAnxProponente' => 'grabarAnexoProponente',
            'IPC_guardarFormInscProp' => 'grabarDatosProponentes',
            'IPC_PropFormAux' => 'formulariosAuxiliaresProponente',
            'IPC_formularioCamposContratos' => 'IPC_formularioCamposContratos',
            'CYT_camposFormularioContratoPro' => 'camposFormularioContratoPro',
            'IPC_formSitContrProp' => 'formularioSituacionControlProponente',
            'IPC_borrarFormularioInscripcionProponente' => 'borrarSoporteProponente',
            'IPC_busUnspsc' => 'buscarUnspsc',
            'IPC_pantallasPredisenadas' => 'pantallasPredisenadas',
            'IPC_grabarLiquidacion' => 'grabarFormularioLiquidacion',
            'IPC_consultarPath' => 'consultarPath',
            'IPC_recuperarTramite' => 'recuperarTramiteInscripcionProponente',
            'IPC_verAnexoProponentes' => 'verAnexoProponentes',
            'IPC_impFormProp' => 'imprimirFormulariosProponentes',
            'IPC_validarFormProp' => 'validarFormularioProponentes',
            'IPC_vdrSoportresProp' => 'validarSoportesProponentes',
            'erlProp' => 'eliminarRepresentantoLegalProponentes',
            'escProp' => 'eliminarSituacionControlProponentes',
            'IPC_ifbProp' => 'impresionFormularioBorrador',
            'IPC_PdfClasificacion' => 'recuperarPdfClasificacion',
            'IPC_ImRlegal' => 'imprimirRepresetanteLegal',
            'IPC_crgRgstrProp' => 'cargarRegistroProponente',
            'SC_verPantallaSolcitudC' => 'verPantallaSolcitudC',
            'AP_RecTramProp' => 'recuperarTramiteActualizacionProponente',
            'SC_recuperarTramiteSolcitudC' => 'recuperarTramiteSolcitudC',
            'CP_SeleccionIdentificacionCancelacionproponente' => 'seleccionIdentificacionCancelacion',
            'SC_firmaDigital' => 'validarFirmaDigital',
            'CP_Controller' => 'CancelacionProponente',
            'CP_cargarRegistroCancelacionProp' => 'cargarRegistroCancelacionProponente',
            'APC_vldrSlccnNv' => 'validarSeleccionNuevaActualizacionProponente',
            'SC_pagarCargoAfiliados' => 'pagarCargoAfiliados',
            'CP_recTramCancelacionProponentes' => 'recuperarTramiteCancelacionProponente',
            'APC_clclrVlrCntrt' => 'calcularValorContratoExperiencia',
            'RNP_Controller' => 'RenovacionProponente',
            'RNP_seleccionidentificacionRenovacionproponente' => 'seleccionIdentificacionRenovacion',
            'RNP_renovacionProponenteInicio' => 'pantallasRenovacionProponenteInicio',
            'RNP_cargarRegistroRenovacionProp' => 'cargarRegistroRenovacionProponente',
            'RNP_rEnoGrabarLiquidacion' => 'grabarFormularioLiquidacionRenovacionProponentes',
            'RNP_recUPTramRenovaProponente' => 'recuperarTramiteRenovacionProponente',
            'RNP_validSeleccionNuevaRenovaProponente' => 'seleccionExpedienteRenovacionProponente',
            'L_enviarPeticion' => 'consultarOpcionMenu',
            'LanzadorController' => 'Lanzador',
            'C_detalleAfiliado' => 'detalleAfiliado',
            'cyt_RutDoc_cambioEstadoRutaDocumentos' => 'cambioEstadoRutaDocumentos'
        );
        $txtNames = array_keys($valoresDiccionario);
        $txtReturn = array_values($valoresDiccionario);

        foreach ($txtNames as $key => $value) {
            $txtCrypt[$key] = Utilitarias::encriptarValor($value);
        }
        foreach ($txtCrypt as $key => $value) {
            if (Utilitarias::hash_equals($hash, $value)) {
                $respuesta = $txtReturn[$key];
            }
        }
        return $respuesta;
    }

    /**
     * Utilitarias::encriptarMenu()
     *
     * Algoritmo recursivo que se encarga de codificar el menu multidimensional
     *
     * @param  string[] $matriz Menu en forma de array asociativo que seran encriptados
     * @return string[] $matriz Mismo menu con las mismas caracteristicas asociativas pero encriptando los metodos y controladores
     */
    public static function encriptarMenu($matriz)
    {
        if (SessionController::extraerVariable("valido_user") == 'true') {
            if (SessionController::extraerVariable(TXTLLAVEPRIVADA)) {
                return Utilitarias::construirMatriz($matriz);
            }
        } else {
            return Utilitarias::getErrRoute();
        }
    }

    /**
     * Utilitarias::construirMatriz()
     *
     * Algoritmo recursivo que se encarga de generar la matriz codificada, es usado por encriptarMenu
     *
     * @param  string[] $matriz Menu en forma de array asociativo que seran encriptados
     * @return string[] $matriz Mismo menu con las mismas caracteristicas asociativas pero encriptando los metodos y controladores
     */
    public static function construirMatriz($matriz)
    {
        foreach ($matriz as $key => $value) {
            if (is_array($value)) {
                //si es un array sigo recorriendo
                $matriz[$key] = Utilitarias::encriptarMenu($value);
            } else {
                //si es un elemento lo muestro
                if ($key == "x") {
                    $matriz[$key] = Utilitarias::encriptarValor($value);
                }
                if ($key == "y") {
                    $matriz[$key] = Utilitarias::encriptarValor($value);
                }
            }
        }
        return $matriz;
    }

    /**
     * Utilitarias::hash_equals()
     *
     * Metodo encargado de comparar dos HASH
     *
     * @param  string $str1 cadena de caracteres asociado a uno de los hash a comparar
     * @param  string $str2 cadena de caracteres asociado a uno de los hash a comparar
     * @return mixed $ret respuesta de comparacion, false en caso de no encontrar coincidencia en el tamano
     */
    public static function hash_equals($str1, $str2)
    {
        if (strlen($str1) != strlen($str2)) {
            return false;
        } else {
            $res = $str1 ^ $str2;
            $ret = 0;
            for ($i = strlen($res) - 1; $i >= 0; $i--) {
                $ret |= ord($res[$i]);
            }
            return !$ret;
        }
    }

    /**
     * Utilitarias::cUrl()
     *
     * Metodo encargado de realizar la peticion al API de manera que se consuma
     * de manera satisfactoria y unificada en el sistema
     *
     * @param  mixed[] $data   Datos tipo Json que conforman los datos de peticion
     * @param  string  $metodo cadena de caracteres asociado al metodo del API que se desea acceder
     * @return mixed[] $result Datos tipo Json que conforman los datos de respuesta
     */
    public static function cUrl($data, $metodo, $metodoSii = "SinMetodoSii")
    {
        $url = SessionController::extraerVariable("url_api");
        LogController::peticionLog($data, $metodo, $metodoSii);
        if ($url) {
            $json_data = json_encode($data);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url . "/" . $metodo);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_COOKIESESSION, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            $result = curl_exec($ch);
            $info = curl_getinfo($ch);
            LogController::infoCurlLog($info, $metodo, $metodoSii);
            curl_close($ch);
            if (($result) == false || ($result) == null) {
                return Utilitarias::getErrComunicacionApi($info);
            } else {
                return json_decode($result, true);
            }
        } else {
            return Utilitarias::getErrIncompleto();
        }
    }

    /**
     * Utilitarias::getDataBasica()
     *
     * Metodo que construye los datos bó¡sicos que se envó­an siempre como petició³n al API
     *
     * @return string $dataBasica Datos tipo Json que conforman los datos del usuario que se encuentra logueado
     */
    public static function getDataBasica()
    {
        if (SessionController::extraerVariable("valido_user") == 'true') {
            return array(
                "codigoempresa" => SessionController::extraerVariable("codigoempresa"),
                "usuariows" => SessionController::extraerVariable("usuariows"),
                "token" => SessionController::extraerVariable("tokenApi"),
                "idusuario" => SessionController::extraerVariable("idusuario"),
                "tipousuario" => SessionController::extraerVariable("tipousuario"),
                "emailcontrol" => SessionController::extraerVariable("emailcontrol"),
                "identificacioncontrol" => SessionController::extraerVariable("identificacioncontrol"),
                "celularcontrol" => SessionController::extraerVariable("celularcontrol"),
                "ip" => SessionController::extraerVariable("ip_cliente"),
                "sistemaorigen" => SessionController::extraerVariable("ApiSistemaorigen"),
            );
        } else {
            return Utilitarias::getErrSesion();
        }
    }

    /**
     * Utilitarias::limpiarEntrada()
     *
     * Limpia las entradas de los formularios obtenidas por $_GET y $_POST
     *
     * @param  string $nombreVar   Cadena de texto que contiene el nombre de la variable
     * @param  string $tipoEntrada Cadena de texto que define si es GET o POST
     * @return string $string Cadena filtrada
     */
    public static function limpiarEntrada($nombreVar, $tipoEntrada)
    {
        switch ($tipoEntrada) {
            case 'GET':
                return filter_var(@$_GET[$nombreVar], FILTER_SANITIZE_SPECIAL_CHARS);
            case 'POST':
                return filter_var(@$_POST[$nombreVar], FILTER_SANITIZE_SPECIAL_CHARS);
            default:
                return filter_var(@$_REQUEST[$nombreVar], FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }

    /**
     * Utilitarias::getErrRoute()
     *
     * Retorna el mensaje de error de acceder por el Route
     *
     * @return array ERRROUTE con el error
     */
    public static function getErrRoute()
    {
        return json_decode(ERRROUTE, true);
    }

    /**
     * Utilitarias::getErrSesion()
     *
     * Retorna el mensaje de error al no tener una sesiÃ³n activa en el sistema
     *
     * @return array $errSesion con el error
     */
    public static function getErrSesion()
    {
        return json_decode(ERRSESION, true);
    }

    /**
     * Utilitarias::getErrMetodo()
     *
     * Retorna el mensaje de error cuando no encuentra el metodo en la clase
     *
     * @return array $errMetodo con el error
     */
    public static function getErrMetodo()
    {
        return json_decode(ERRMETODO, true);
    }

    /**
     * Utilitarias::getErrIncompleto()
     *
     * Retorna el mensaje de error de parámetros incompletos de la petición
     *
     * @return array $errIncompleto con el error
     */
    public static function getErrIncompleto()
    {
        return json_decode(ERRINCOMPLETO, true);
    }

    /**
     * Utilitarias::getErrComunicacionApi()
     *
     * Retorna el mensaje de error de comunicación con el API
     *
     * @return array $errComunicacionApi con el error
     */
    public static function getErrComunicacionApi($info = '')
    {
        $respuesta = json_decode(ERRCOMUNICACIONAPI, true);
        $respuesta["info"] = $info;
        return $respuesta;
    }

    /**
     * Utilitarias::redireccionarMetodos()
     *
     * Redirecciona al controlador y metodo que se solicita
     *
     * @return array $errComunicacionApi con el error
     */
    public static function redireccionarMetodos($c, $m)
    {
        if ($c->getIdRuta() === SessionController::extraerVariable("id_ruta")) {
            if (is_callable(array($c, $m))) {
                return call_user_func(array($c, $m));
            } else {
                return Utilitarias::getErrMetodo();
            }
        } else {
            return Utilitarias::getErrRoute();
        }
    }

    /**
     * Utilitarias::redireccionarMetodos()
     *
     * Redirecciona al controlador y metodo que se solicita
     *
     * @return array $errComunicacionApi con el error
     */
    public static function encriptarValor($value)
    {
        return crypt($value, SessionController::extraerVariable(TXTLLAVEPRIVADA));
    }

    /**
     * Utilitarias::valorEncriptado()
     *
     * Metodo que desencripta en base 64 un array dado
     *
     * @return array $parametros array numerico con los valores
     */
    public static function valorEncriptado($encriptado)
    {
        $parametros = explode("&", base64_decode($encriptado));
        foreach ($parametros as &$key) {
            $valor = explode("=", $key);
            $key = $valor[1];
        }
        return $parametros;
    }

}
