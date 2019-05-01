<?php

/**
 * Sii2Controller
 *
 */

/**
 * Sii2Controller
 *
 * Controlador que maneja y contiene las acciones que usan los otros controladores
 *
 * @package   controlador
 * @author    Entelgy
 * @copyright 2018
 * @version   1
 * @access    public
 */
class Sii2Controller
{

    /**
     * @var Id de la ruta asignada por el route
     */
    private $id_ruta;

    /**
     * @var Metodo al que se desea acceder
     */
    private $metodo;

    const TXTMATRICULA = "matricula";
    const TXTCODIGOERROR = "codigoerror";
    const TXTMENSAJEERROR = "mensajeerror";
    const TXTFECHAINICIAL = "fechaInicial";
    const TXTFECHAFINAL = "fechaFinal";
    const TXTIDENTIFICACION = "identificacion";
    const TXTNUMPAG = "numPag";
    const TXTCODBARRAS = "codBarras";
    const TXTPROPONENTE = "proponente";
    const TXTNOMBRE = "nombre";
    const TXTEXPEDIENTE = "expediente";
    const TXTCANTREGPAGINA = "cantRegPagina";
    const TXTTABLA = "tabla";
    const TXTQUERY = "query";
    const TXTSEMILLA = "semilla";
    const TXTACCION = "accion";
    const TXTCAMPOS = "campos";
    const TXTORDEN = "orden";
    const TXTOFFSET = "offset";
    const TXTLIMIT = "limit";
    const TXTSELECTED = "selected";
    const TXTSELECCIONE = "Seleccione";
    const TXTLABEL = "label";
    const TXTRETORNARREGISTROS = "retornarRegistros";
    const TXTREGISTROS = "registros";
    const TXTPANTALLA = "pantalla";
    const TXTRECIBO = "recibo";
    const TXTOPERACION = "operacion";
    const TXTCODIGOBARRAS = "codigo_barras";
    const TXTMOSTRARELIMINADOS = "mostrarEliminados";
    const TXTMOSTRARRECIBOS = "mostrarRecibos";
    const TXTMOSTRARSELLOS = "mostrarSellos";
    const TXTSIMULADOR = "simulador";
    const TXTCAMARAS = "camaras";
    const TXTINPUT = "input";
    const TXTBANDEJAS = "bandejas";
    const TXTASC = "ASC";
    const TXTDESC = "DESC";
    const TXTTIPOSDOCUMENTO = "tiposDocumento";
    const TXTDATA = "data";
    const TXTIDLIQUIDACION = "idliquidacion";
    const TXTFECHANACIMIENTO = "fechanacimiento";
    const TXTCUMPLOREQUISITOSBENLEY1780 = "cumplorequisitosbenley1780";
    const TXTMANTENGOREQUISITOSBENLEY1780 = "mantengorequisitosbenley1780";
    const TXTRENUNCIOBENEFICIOSLEY1780 = "renunciobeneficiosley1780";
    const TXTNUEVOSACTIVOS = "nuevosactivos";
    const TXTINCLUIRAFILIACION = "incluirafiliacion";
    const TXTINCLUIRFORMULARIOS = "incluirformularios";
    const TXTINCLUIRDIPLOMA = "incluirdiploma";
    const TXTINCLUIRCARTULINA = "incluircartulina";
    const TXTINCLUIRFLETES = "incluirfletes";
    const TXTINCLUIRCERTIFICADOS = "incluircertificados";
    const TXTANORENOVAR = "anorenovar";
    const TXTANORENOVARPRI = "anorenovarpri";
    const TXTIDANEXO = "idanexo";
    const TXTDESCRIPCION = "descripcion";
    const TXTTMPNAME = "tmp_name";
    const TXTCATEGORIA = "categoria";
    const TXTINCLUYE = "incluye";
    const TXTEXCLUYE = "excluye";
    const TXTIDENTIFICACIONNUM = "numIdentificacion";
    const TXTTIPOPROPONENTE = "tipoProponente";
    const TXTDOCUMENTO = "documento";
    const TXTTIPOIDENTIFICACION = "tipoIdentificacion";
    const TXTFORMULARIO = "formulario";
    const TXTCRITERIO = "criterio";
    const TXTRANGOLIBROS = "rangoLibros";
    const TXTCLAVEAFILIADO = "claveafiliado";
    const TXTEMPRESA = "empresa";
    const TXTTIPOCONSULTA = "tipoconsulta";
    const TXTNUM_RECUPERACION = "numerorecuperacion";

    /**
     * Sii2Controller::__construct()
     *
     * Setear el id de la ruta con el cual se instancio la clase y el metodo
     * requerido
     *
     * @param  integer $id_ruta Id de ruta utilizado como mecanismo de control al intanciar el objeto a partir del route
     * @param  string  $metodo  Metodo al que accedera el controlador
     * @return
     */
    public function __construct($id_ruta, $metodo)
    {
        $this->setIdRuta($id_ruta);
        $this->setMetodo($metodo);
    }

    /**
     * Sii2Controller::getIdRuta()
     *
     * Extraer el id de ruta asociado a la peticion de ruteo
     *
     * @return integer $id_ruta Entero asignado a la peticion de route al controlador para ser atendido
     */
    public function getIdRuta()
    {
        return $this->id_ruta;
    }

    /**
     * Sii2Controller::setIdRuta()
     *
     * Modificar el id de ruta asociado a la peticion de ruteo
     *
     * @param integer $id_ruta Entero asignado a la peticion de route al controlador para ser atendido
     */
    public function setIdRuta($id_ruta)
    {
        $this->id_ruta = $id_ruta;
    }

    /**
     * Sii2Controller::getMetodo()
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
     * Sii2Controller::setMetodo()
     *
     * Modificar el metodo asociado a la peticion de ruteo
     *
     * @param string $metodo El metodo que se utilizara en el controlador
     */
    public function setMetodo($metodo)
    {
        $this->metodo = $metodo;
    }

}
