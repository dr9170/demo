<!DOCTYPE html>
<html lang="es">

    <head>

        <!--Cambio de Etiqueta para acentos en las palabras del texto:
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />

        <!-- Styles -->
        <!--<link href="../recursos/css/lib/bootstrap.min.css" rel="stylesheet">-->
        <!--Styles-->
        <link href="../recursos/js/lib/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="../recursos/css/lib/datepicker.min.css" rel="stylesheet"/>
        <link href="../recursos/js/lib/bootstrap/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css"/>
        <link href="../recursos/js/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Icons-->
        <link href="../recursos/css/lib/CoreUItemplateFiles/coreui-icons.min.css" rel="stylesheet">
        <link href="../recursos/css/lib/CoreUItemplateFiles/flag-icon.min.css" rel="stylesheet">
        <link href="../recursos/css/lib/CoreUItemplateFiles/simple-line-icons.css" rel="stylesheet">
        <!-- Main styles for this application-->
        <link href="../recursos/css/lib/CoreUItemplateFiles/style.css" rel="stylesheet" type="text/css"/>
        <link href="../recursos/css/lib/CoreUItemplateFiles/pace.min.css" rel="stylesheet" type="text/css"/>

        <link href="../recursos/css/font-awesome/css/all.min.css" rel="stylesheet" type="text/css"/>
        <link href="../recursos/css/sii/index.css" rel="stylesheet">

        <!-- Scripts -->
        <!--<script src="../recursos/js/lib/jquery-3.2.1.min.js"></script>-->

        <title>.:: SII ::.</title>
    </head>

    <body class="bg-faded">
        <div class="collapse bg-inverse" id="navbarHeader" style="background-color:#292b2c;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 py-4" id="infoSuperior">
                    </div>
                    <div class="col-sm-4 py-4">
                        <h4 class="text-white">Contacto</h4>
                        <div id="redesSociales">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-inverse bg-dark">
            <div class="container d-flex justify-content-between">
                <a id="tituloSistema" href="javascript:;" class="navbar-brand text-white">Sistema Integrado de Información</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation" style="border-color: white;">
                    <i class="fa fa-bars" aria-hidden="true" style="color: white;"></i>
                </button>
            </div>
        </div>

        <section class="text-center bg-white" style="padding-bottom:1rem !important;">
            <div class="container">
                <img id="logoconfe" class="rounded mx-auto" src="../recursos/images/camaras/confecamaras.jpg" width="231" height="120">
                <h1 class="jumbotron-heading">Esto es una prueba</h1>
                <p class="lead text-muted" id="instrucciones1">Seleccione la Cámara a la cual desea Acceder.</p>
            </div>
        </section>

        <div class="album text-muted">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-2">
                    </div>
                    <div id="vistaSegunda" class="col-md-6">
                        <div id="logueo" style="display: none;">
                            <form class="container" id="formLogin" action="javascript:acceso();" novalidate>
                                <div class="row">
                                    <div class="col-md-12 mb-12 text-center">
                                        <img id="logoCamara1" src="" width="231" height="120">
                                    </div>
                                </div><div>&nbsp;</div>
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <label for="mail">Correo Electrónico / Usuario  <span class="colorLetraRoja">(*)</span></label>
                                        <input class="form-control" id="mail" name="mail" placeholder="Correo electrónico / Usuario" required>
                                        <div class="invalid-feedback">
                                            Introduzca Correo Electrónico  o Usuario
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <label for="identificacion">Identificación  <span class="colorLetraRoja">(*)</span></label>
                                        <input type="text" class="form-control pegarnumeros" name="identificacion" id="identificacion" placeholder="Identificación" required maxlength="13" pattern="[0-9]{5,13}" onkeypress="return soloNumeros(event);">
                                        <div class="invalid-feedback">
                                            Introduzca Identificación
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <label for="pass">Clave  <span class="colorLetraRoja">(*)</span></label>
                                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Clave" required>
                                        <div class="invalid-feedback">
                                            Introduzca su Clave
                                        </div>
                                    </div>
                                </div>
                                <div class="row margin-top-3">
                                    <div class="col-md-6 offset-lg-6 text-center">
                                        <label for="validationCustom03"><a href="javascript:;" onclick="mostrarOlvidar()">¿Olvidó la contraseña?</a></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit" style="margin-top: 5%;">Ingresar</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-12"><br>
                                        <p align="center">
                                            Si aún no está inscrito (registrado), por favor oprima el botón "REGISTRARSE" para realizar su solicitud de registro.
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button onclick="mostrarRegistrar()" class="btn btn-info btn-lg btn-block" type="button" style="margin-top: 5%;">Registrarse</button>
                                </div>
                                <div class="col-md-12 mb-12"><br>
                                    <p align="justify">
                                        Dado que accederá a la información contenida en los registros que administra nuestra organización, se hace necesario tener la información básica de la persona que realiza las consultas, y/o que tramita solicitudes, por este motivo es necesario que realice
                                        su registro. Así mismo podremos brindarle una experiencia más personalizada.
                                    </p>
                                </div>
                            </form>
                        </div>
                        <div id="registro" style="display: none;">
                            <form class="container" id="formRegistro" action="javascript:registrarse();" novalidate autocomplete="off">
                                <div class="row">
                                    <div class="col-md-12 mb-12 text-center">
                                        <img id="logoCamara2" src="" width="231" height="120">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-12"><br>
                                    <p align="justify">
                                        <b>Recuerde que su registro será realizado en la Cámara de Comercio Seleccionada. Para completar su solicitud de registro, por favor digite la información que se solicita a continuación:</b>
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <label for="Rmail">Correo Electrónico (*)</label>
                                        <input type="email" class="form-control" id="Rmail" name="Rmail" placeholder="Correo Electrónico" required>
                                        <div class="invalid-feedback">
                                            Introduzca Correo Electrónico
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 mb-12">
                                        <label for="Ridentificaciontipo">Tipo identificación(*)</label>
                                        <select class="form-control" name="Ridentificaciontipo" id="Ridentificaciontipo" placeholder="Tipo" required>
                                            <option value="1">Cédula Ciudadanía</option>
                                            <option value="3">Cédula Extranjería</option>
                                            <option value="4">Tarjeta de Identidad</option>
                                            <option value="5">Pasaporte</option>
                                            <option value="E">Documento Extranjero</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Introduzca Tipo de Identificación
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        <label for="Ridentificacion">Identificación (*)</label>
                                        <input type="text" class="form-control pegarnumeros" name="Ridentificacion" id="Ridentificacion" placeholder="Identificación" required maxlength="13" pattern="[0-9]{4,13}" onkeypress="return soloNumeros(event);">
                                        <div class="invalid-feedback">
                                            Introduzca Identificación
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <label for="RfechaExp">Fecha de Expedición (*)</label>
                                        <input class="form-control" name="RfechaExp" id="RfechaExp" placeholder="Fecha de expedición del documento" required data-toggle="datepickerFechaExp" onfocus="this.blur()">
                                        <div data-toggle="datepickerFechaExp"></div>
                                        <div class="invalid-feedback">
                                            Introduzca Fecha de Expedición
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <label for="Pnombre">Primer Nombre(*)</label>
                                        <input type="text" class="form-control letras text-primera-mayuscula pegarletras" onkeyup="minus(this);" name="Pnombre" id="Pnombre" placeholder="Primer Nombre" required maxlength="30" minlength="1">
                                        <div class="invalid-feedback">
                                            Introduzca su Primer Nombre
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <label for="Snombre">Segundo Nombre</label>
                                        <input type="text" class="form-control letras2 text-primera-mayuscula pegarletras2" onkeyup="minus(this);" name="Snombre" id="Snombre" placeholder="Segundo Nombre" maxlength="30" minlength="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <label for="Papellido">Primer Apellido (*)</label>
                                        <input type="text" class="form-control letras text-primera-mayuscula pegarletras" onkeyup="minus(this);" name="Papellido" id="Papellido" placeholder="Primer Apellido" required maxlength="30" minlength="1">
                                        <div class="invalid-feedback">
                                            Introduzca su Primer Apellido
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <label for="Sapellido">Segundo Apellido</label>
                                        <input type="text" class="form-control letras2 text-primera-mayuscula pegarletras2" onkeyup="minus(this);" name="Sapellido" id="Sapellido" placeholder="Segundo Apellido" maxlength="30" minlength="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <label for="RfechaNac">Fecha de Nacimiento (*)</label>
                                        <input class="form-control" name="RfechaNac" id="RfechaNac" placeholder="Fecha de Nacimiento" required data-toggle="datepickerFechaNac" onfocus="this.blur()">
                                        <div data-toggle="datepickerFechaNac"></div>
                                        <div class="invalid-feedback">
                                            Introduzca Fecha de Nacimiento
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-12 mb-2">
                                        <label for="Rcelular">Número Celular (*)</label>
                                        <input type="text" class="form-control pegarnumeros" name="Rcelular" id="Rcelular" maxlength="10" pattern="[0-9]{10,10}" placeholder="Número Celular" required onkeypress="return soloNumeros(event);">
                                        <div class="invalid-feedback">
                                            Introduzca su Número Celular
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 offset-md-2 mt-3">
                                        <div id="recaptcha2"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <button class="btn btn-info btn-lg btn-block" type="submit" style="margin-top: 5%;">Registrarse</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="olvidar" style="display: none;">
                            <form class="container" id="formOlvidar" action="javascript:olvido();" novalidate>
                                <div class="row">
                                    <div class="col-md-12 mb-12 text-center">
                                        <img id="logoCamara3" src="" width="231" height="120">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <label for="Oidentificacion">Número de Identificación(*)</label>
                                        <input type="text" class="form-control pegarnumeros" id="Oidentificacion" name="Oidentificacion" placeholder="Numero de identificacion" required maxlength="13" pattern="[0-9]{7,13}" onkeypress="return soloNumeros(event);">
                                        <div class="invalid-feedback">
                                            Introduzca Número de Identificacion
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <label for="Omail">Correo electrónico / Usuario(*)</label>
                                        <input class="form-control" id="Omail" name="Omail" placeholder="Correo electrónico / Usuario" required>
                                        <div class="invalid-feedback">
                                            Introduzca Correo Electrónico o Usuario
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 offset-md-2 mt-3">
                                        <div id="recaptcha1"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <button class="btn btn-info btn-lg btn-block" type="submit" style="margin-top: 5%;">Recuperar Contraseña</button>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-12"><br>
                                    <p align="justify">
                                        Dado que accederá a la información contenida en los registros que administra nuestra organización, se hace necesario tener la información básica de la persona que realiza las consultas, y/o que tramita solicitudes, por este motivo es necesario que realice
                                        su registro. Así mismo podremos brindarle una experiencia más personalizada.
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col col-lg-2">
                    </div>
                </div>
                <div id="catalogoLogos"></div>
            </div>
        </div>

        <footer class="text-muted bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <p>Sistema Integrado de Información &copy; <a href="http://www.confecamaras.org.co/" target="_blank">Confecámaras</a></p>
                        <p class="d-none">&nu; SII.2.3.2 20190426</p>
                    </div>
                    <div class="col-md-3">
                        <nav class="nav flex-column">
                            <a id="camaraSelect" href="javascript:selectCamara();" style="display: none;" class="btn btn-outline-primary mt-1"><i class="fa fa-reply" aria-hidden="true"></i> Seleccionar Cámara</a>
                            <a id="volverLogueo" href="javascript:mostrarLogueo();" style="display: none;" class="btn btn-outline-primary mt-1"><i class="fa fa-reply" aria-hidden="true"></i> Iniciar Sesión </a>
                            <a id="volverLogueo2" href="javascript:mostrarLogueo2();" style="display: none;" class="btn btn-outline-primary mt-1"><i class="fa fa-reply" aria-hidden="true"></i> Iniciar Sesión </a>
                        </nav>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Zona modal -->
        <div class="modal fade" id="ModalInfo" tabindex="-1" role="dialog" aria-labelledby="ModalTitulo" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-secondary border-secondary text-white">
                        <h5 class="modal-title" id="ModalTitulo"></h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="ModalCuerpo"></p>
                    </div>
                </div>
            </div>
        </div>

        <!--/container-->


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <script src="../recursos/js/lib/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="../recursos/js/lib/jquery-ui.min.js"></script>
        <script src="../recursos/js/lib/popper.min.js" type="text/javascript"></script>
        <script src="../recursos/js/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="../recursos/js/lib/bootbox.min.js"></script>
        <script src="../recursos/js/lib/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <!--llave_publica-->
        <input type="hidden" id="key_public" value="d6cb90aaa161e97ae1e0339ead68ff14">
        <script src="../recursos/js/sii/key_public.js"></script>
        <script src='https://www.google.com/recaptcha/api.js?hl=es' async defer></script>
        <script src="../recursos/js/lib/holder.min.js"></script>
        <script src="../recursos/js/lib/react.min.js"></script>
        <script src="../recursos/js/lib/react-dom.min.js"></script>
        <script src="../recursos/js/lib/datepicker.min.js"></script>
        <script src="../recursos/js/lib/datepicker.es-ES.js"></script>
        <script src="../recursos/js/sii/index.js"></script>
    </body>

</html>
