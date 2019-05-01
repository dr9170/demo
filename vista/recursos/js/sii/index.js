"use strict";

var recaptcha1;
var recaptcha2;
console.log();
window.onload = function () {
  recaptchas();
};

$(document).ready(function () {
  configPlantilla();
  if (getParameterByName("cod_camara") !== "") {
    sessionStorage.setItem("cod_camara", getParameterByName("cod_camara"));
  }
  if (sessionStorage.getItem("cod_camara") !== null) {
    $("#logoCamara1").attr("src", $("#camara_" + sessionStorage.getItem("cod_camara")).attr("src"));
    $("#logoCamara2").attr("src", $("#camara_" + sessionStorage.getItem("cod_camara")).attr("src"));
    $("#logoCamara3").attr("src", $("#camara_" + sessionStorage.getItem("cod_camara")).attr("src"));
    sessionStorage.setItem("nombre_camara", $("#camara_" + sessionStorage.getItem("cod_camara")).attr("alt"));
    $(".empresas").hide();
    muestralogin();
    $("#instrucciones1").hide("slide", {}, 0, muestraInstru2);
  } else {
    muestraCamara();
  }
  if (getParameterByName("conf") !== "") {
    if (getParameterByName("conf") == "S") {
      $("#ModalTitulo").html("Activación");
      $("#ModalCuerpo").html("Su registro ha sido activado.");
      $("#ModalInfo").modal("show");
      // console.log("Registro activado");
    } else {
      $("#ModalTitulo").html("Rechazo");
      $("#ModalCuerpo").html("Su registro ha sido rechazado.");
      $("#ModalInfo").modal("show");
      // console.log("Registro rechazado");
    }
  }
  $('[data-toggle="datepickerFechaExp"]').datepicker({
    language: "es-ES",
    autoHide: true,
    format: "yyyy-mm-dd",
    endDate: fechaExp()
  });
  $('[data-toggle="datepickerFechaNac"]').datepicker({
    language: "es-ES",
    autoHide: true,
    format: "yyyy-mm-dd",
    endDate: fechaNac()
  });
});

// Elementos

var ImagenCamara = function ImagenCamara(props) {
  return React.createElement(
    "div",
    { className: "col-12 col-sm-6 col-md-3 col-lg-2 placeholder empresas" },
    React.createElement(
      "div",
      {
        className: "card logoImagenI",
        style: {
          width: "100%"
        }
      },
      React.createElement(
        "a",
        {
          onClick: function onClick(data) {
            return login(props.lista.id, props.lista.path, props.lista.nombre);
          },
          href: "javascript:;"
        },
        React.createElement("img", {
          id: "camara_" + props.lista.id,
          src: props.lista.path !== "" ? "../recursos/images/camaras/" + props.lista.path : "../recursos/images/camaras/sin_imagen.jpg",
          alt: props.lista.nombre,
          height: "100",
          width: "100%"
          // alt={props.lista.nombre}
          // data-toggle="tooltip" data-placement="top" title={props.lista.nombre}
        })
      )
    )
  );
};

var TituloSuperior = function TituloSuperior(props) {
  return React.createElement(
    "h4",
    { "class": "text-white" },
    props.titulo
  );
};

var DescripSuperior = function DescripSuperior(props) {
  return React.createElement("p", {
    "class": "text-muted",
    dangerouslySetInnerHTML: {
      __html: props.descripcion
    }
  });
};

// Componentes

var CataloImagen = function CataloImagen(props) {
  var imagenes = props.lista.map(function (lista, i) {
    return React.createElement(ImagenCamara, { lista: lista, key: i });
  });
  return React.createElement(
    "div",
    { className: "row" },
    imagenes
  );
};

var InfoSuperior = function InfoSuperior(props) {
  return React.createElement(
    "div",
    null,
    React.createElement(TituloSuperior, { titulo: props.titulo }),
    React.createElement(DescripSuperior, { descripcion: props.descripcion })
  );
};

var RedesSociales = function RedesSociales(props) {
  return React.createElement(
    "ul",
    { "class": "list-unstyled" },
    React.createElement(
      "li",
      null,
      React.createElement(
        "a",
        { href: props.twitter, className: "text-white", target: "_blank" },
        React.createElement("i", {
          className: "fab fa-twitter-square",
          "aria-hidden": "true",
          style: {
            fontSize: "xx-large",
            marginRight: "10%"
          }
        })
      ),
      React.createElement(
        "a",
        { href: props.facebook, className: "text-white", target: "_blank" },
        React.createElement("i", {
          className: "fab fa-facebook-square",
          "aria-hidden": "true",
          style: {
            fontSize: "xx-large"
          }
        })
      )
    ),
    React.createElement(
      "li",
      null,
      React.createElement(
        "a",
        { href: props.mail, className: "text-white" },
        React.createElement("i", {
          className: "fas fa-envelope",
          "aria-hidden": "true",
          style: {
            fontSize: "xx-large",
            marginRight: "9%"
          }
        })
      ),
      React.createElement(
        "a",
        { href: props.instagram, className: "text-white", target: "_blank" },
        React.createElement("i", {
          className: "fab fa-instagram",
          "aria-hidden": "true",
          style: {
            fontSize: "xx-large"
          }
        })
      )
    )
  );
};

function login(id, src, alt) {
  $("#logoCamara1").attr("src", "../recursos/images/camaras/" + src);
  $("#logoCamara2").attr("src", "../recursos/images/camaras/" + src);
  $("#logoCamara3").attr("src", "../recursos/images/camaras/" + src);
  sessionStorage.setItem("nombre_camara", alt);
  sessionStorage.setItem("cod_camara", id);
  $(".empresas").hide("slide", {}, 500, muestralogin);
  $("#instrucciones1").hide("slide", {}, 500, muestraInstru2);
}

function selectCamara() {
  sessionStorage.removeItem("cod_camara");
  sessionStorage.removeItem("nombre_camara");
  $("#vistaSegunda").hide("slide", {}, 500, muestraCamara);
  $("#instrucciones2").hide("slide", {}, 500, muestraInstru1);
  $("#volverLogueo").hide("slide", {}, 500);
  $("#volverLogueo2").hide("slide", {}, 500);
}

function muestralogin() {
  $("#registro").hide();
  $("#olvidar").hide();
  $("#vistaSegunda").show();
  $("#logueo").show("slide", {}, 300);
  $("#camaraSelect").show("slide", {}, 500);
}

function muestraInstru1() {
  $("#instrucciones1").show("slide", {}, 500);
}

function muestraInstru2() {
  $("#instrucciones2").show("slide", {}, 500);
}

function muestraCamara() {
  $(".empresas").show("slide", {}, 300);
  $("#camaraSelect").hide("slide", {}, 500);
}

(function () {
  "use strict";

  if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement("style");
    msViewportStyle.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}"));
    document.head.appendChild(msViewportStyle);
  }
})();

(function () {
  "use strict";

  window.addEventListener("load", function () {
    var form = document.getElementById("formLogin");
    form.addEventListener("submit", function (event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add("was-validated");
    }, false);
  }, false);
})();

(function () {
  "use strict";

  window.addEventListener("load", function () {
    var form = document.getElementById("formRegistro");
    form.addEventListener("submit", function (event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add("was-validated");
    }, false);
  }, false);
})();

(function () {
  "use strict";

  window.addEventListener("load", function () {
    var form = document.getElementById("formOlvidar");
    form.addEventListener("submit", function (event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add("was-validated");
    }, false);
  }, false);
})();

function acceso() {
  var formData = $("#formLogin").serialize() + "&cod_camara=" + sessionStorage.getItem("cod_camara") + "&path_camara=" + $("#camara_" + sessionStorage.getItem("cod_camara")).attr("src") + "&nombre_camara=" + sessionStorage.getItem("nombre_camara");
  formData = "z_c=" + window.btoa(formData) + "&x_c=" + aa + "&y_c=" + bb;
  $.ajax({
    url: "../../controlador/Route.php",
    type: "POST",
    data: formData
  }).done(function (result) {
    var responseRegistro = result;
    console.log(responseRegistro);
    if (responseRegistro.codigoerror === "0000") {
      sessionStorage.setItem("idtipousuario", responseRegistro.idtipousuario);
      location.href = "home.php";
    } else {
      $("#ModalTitulo").html("Acceso denegado");
      if (typeof result.codigoerror === 'undefined') {
        var parseResult = JSON.parse(result);
        $("#ModalCuerpo").html(parseResult.mensajeerror);
      } else {
        $("#ModalCuerpo").html(result.mensajeerror);
      }
      $("#ModalInfo").modal("show");
      // console.log("No se puede acceder al sistema");
    }
  });
}

function getParameterByName(name) {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
      results = regex.exec(location.search);
  return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function mostrarRegistrar() {
  $("#logueo").hide("slide", {}, 500, verRegistro);
  ocultarVolverLogueo();
  $("#volverLogueo").show("slide", {}, 500);
}
function mostrarOlvidar() {
  $("#logueo").hide("slide", {}, 500, verOlvido);
  ocultarVolverLogueo2();
  $("#volverLogueo2").show("slide", {}, 500);
}
function mostrarLogueo() {
  $("#registro").hide("slide", {}, 500, muestralogin);
  $("#instrucciones1").hide("slide", {}, 500, muestraInstru2);
  $("#volverLogueo").hide("slide", {}, 500);
}
function mostrarLogueo2() {
  $("#olvidar").hide("slide", {}, 500, muestralogin);
  $("#instrucciones1").hide("slide", {}, 500, muestraInstru2);
  $("#volverLogueo2").hide("slide", {}, 500);
}
function verRegistro() {
  $("#registro").show("slide", {}, 300);
}
function verOlvido() {
  $("#olvidar").show("slide", {}, 300);
}
function ocultarVolverLogueo() {
  $("#volverLogueo").show("slide", {}, 300);
}
function ocultarVolverLogueo2() {
  $("#volverLogueo2").show("slide", {}, 300);
}

function registrarse() {
  var formData = $("#formRegistro").serialize();
  formData = formData + "&cod_camara=" + sessionStorage.getItem("cod_camara") + "&x_c=" + aa + "&y_c=" + dd;
  $.ajax({
    url: "../../controlador/Route.php",
    type: "GET",
    data: formData
  }).done(function (result) {
    var responseRegistro = result;
    if (responseRegistro.codigoerror === "0000") {
      $("#ModalTitulo").html("Registro satisfactorio");
      $("#ModalCuerpo").html("Se ha enviado un correo electronico para validar el registro, con su clave de acesso.");
      $("#ModalInfo").modal("show");
      $("#ModalInfo").on("hidden.bs.modal", function (e) {
        location.reload();
      });
      // console.log("Registrado en el sistema");
    } else {
      grecaptcha.reset(recaptcha2);
      $("#ModalTitulo").html("Registro inválido");
      if (responseRegistro == 0) {
        $("#ModalCuerpo").html("Validar el captcha.");
      } else {
        $("#ModalCuerpo").html(responseRegistro.mensajeerror);
      }
      $("#ModalInfo").modal("show");
      // console.log("No se puede registrar en el sistema");
    }
  });
}

function olvido() {
  var formData = $("#formOlvidar").serialize();
  formData = formData + "&cod_camara=" + sessionStorage.getItem("cod_camara") + "&x_c=" + aa + "&y_c=" + cc;
  $.ajax({
    url: "../../controlador/Route.php",
    type: "GET",
    data: formData
  }).done(function (result) {
    var responseRegistro = result;
    if (responseRegistro.codigoerror === "0000") {
      $("#ModalTitulo").html("Registro satisfactorio");
      $("#ModalCuerpo").html("Se ha enviado un correo electrónico su nueva clave de acceso.");
      $("#ModalInfo").modal("show");
      // console.log("Recuperando contraseña");
    } else {
      grecaptcha.reset(recaptcha1);
      $("#ModalTitulo").html("Recuperación fallida");
      if (responseRegistro == 0) {
        $("#ModalCuerpo").html("Validar el captcha.");
      } else {
        $("#ModalCuerpo").html(responseRegistro.mensajeerror);
      }
      $("#ModalInfo").modal("show");
      // console.log("No se puede recuperar contraseña");
    }
  });
}

function configPlantilla() {
  $.ajax({
    url: "../../controlador/Route.php",
    type: "GET",
    async: false,
    data: {
      x_c: vv,
      y_c: ww
    }
  }).done(function (result) {
    var infoPlantilla = result;
    $.each(infoPlantilla, function (k, v) {
      for (var k2 in v) {
        if (k2 === "camaras") {
          ReactDOM.render(React.createElement(CataloImagen, { lista: v.camaras }), document.getElementById("catalogoLogos"));
        }
        if (k2 === "infosuperior") {
          ReactDOM.render(React.createElement(InfoSuperior, {
            titulo: v.infosuperior["titulo"],
            descripcion: v.infosuperior["descripcion"]
          }), document.getElementById("infoSuperior"));
        }
        if (k2 === "redessociales") {
          ReactDOM.render(React.createElement(RedesSociales, {
            instagram: v.redessociales["instagram"],
            facebook: v.redessociales["facebook"],
            twitter: v.redessociales["twitter"],
            mail: v.redessociales["mail"]
          }), document.getElementById("redesSociales"));
        }
        if (k2 === "llave_recaptcha_publica") {
          sessionStorage.setItem("llave_recaptcha_publica", v.llave_recaptcha_publica);
        }
        if (k2 === "llave_google_analytics") {
          sessionStorage.setItem("llave_google_analytics", v.llave_google_analytics);
        }
      }
    });
  }).fail(function (result) {
    console.log(result);
  });
}
function recaptchas() {
  recaptcha1 = grecaptcha.render("recaptcha1", {
    sitekey: sessionStorage.getItem("llave_recaptcha_publica"),
    theme: "light"
  });
  recaptcha2 = grecaptcha.render("recaptcha2", {
    sitekey: sessionStorage.getItem("llave_recaptcha_publica"),
    theme: "light"
  });
}

function fechaExp() {
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth() + 1;
  var yyyy = today.getFullYear();

  if (dd < 10) {
    dd = "0" + dd;
  }
  if (mm < 10) {
    mm = "0" + mm;
  }
  today = yyyy + "/" + mm + "/" + dd;
  return today;
}
function fechaNac() {
  var nac = new Date();
  var dd = nac.getDate();
  var mm = nac.getMonth() + 1;
  var yyyy = nac.getFullYear();

  if (dd < 10) {
    dd = "0" + dd;
  }
  if (mm < 10) {
    mm = "0" + mm;
  }
  nac = yyyy - 12 + "/" + mm + "/" + dd;
  return nac;
}
function soloNumeros(e) {
  if (e.keyCode == 9 || e.keyCode == 13) {
    var key = Event ? e.keyCode : e.which;
    return key == 9 || key == 13;
  } else {
    var key = Event ? e.which : e.keyCode;
    return key >= 48 && key <= 57 || key == 8;
  }
}

$(document).ready(function () {
  $(".pegarnumeros").keypress(function (event) {
    /* Act on the event */
  });
  (function () {
    $(this).val($(this).val().replace(/[^0-9]/g));
    // console.log($(this).val());
  });
  $(".pegarletras").on("keyup", function (key) {
    if ((key.charCode < 97 || key.charCode > 122) && ( //letras  minusculas
    key.charCode < 65 || key.charCode > 90) && //letras mayusculas
    key.charCode != 0 && key.charCode != 46 && //retroceso
    key.charCode != 241 && //ñ
    key.charCode != 209 && //Ñ
    //&& (key.charCode != 32) espacio
    key.charCode != 225 && //á
    key.charCode != 233 && //é
    key.charCode != 237 && //í
    key.charCode != 243 && //ó
    key.charCode != 250 && //ú
    key.charCode != 193 && //Á
    key.charCode != 201 && //É
    key.charCode != 205 && //Í
    key.charCode != 211 && //Ó
    key.charCode != 218 /* Ú */
    ) return false;
  });

  $(".pegarnumeros").on("keyup", function () {
    $(this).val($(this).val().replace(/[^0-9]/g, ""));
    // console.log($(this).val());
  });

  $(".pegarletras").on("keyup", function () {
    $(this).val($(this).val().replace(/[^a-zA-Záéíóúüñ]+/g, ""));
  });
  $(".pegarletras2").on("keyup", function () {
    $(this).val($(this).val().replace(/[^a-zA-Záéíóúüñ/ /]+/g, ""));
  });
  $('[data-toggle="tooltip"]').tooltip("dispose");
  $('[data-toggle="tooltip"]').tooltip();
});
$(".letras").keypress(function (key) {
  //window.console.log(key.charCode)
  if ((key.charCode < 97 || key.charCode > 122) && ( //letras  minusculas
  key.charCode < 65 || key.charCode > 90) && //letras mayusculas
  key.charCode != 0 && key.charCode != 46 && //retroceso
  key.charCode != 241 && //ñ
  key.charCode != 209 && //Ñ
  //&& (key.charCode != 32) espacio
  key.charCode != 225 && //á
  key.charCode != 233 && //é
  key.charCode != 237 && //í
  key.charCode != 243 && //ó
  key.charCode != 250 && //ú
  key.charCode != 193 && //Á
  key.charCode != 201 && //É
  key.charCode != 205 && //Í
  key.charCode != 211 && //Ó
  key.charCode != 218 /* Ú */
  ) return false;
});
$(".letras2").keypress(function (key) {
  //window.console.log(key.charCode)
  if ((key.charCode < 97 || key.charCode > 122) && ( //letras  minusculas
  key.charCode < 65 || key.charCode > 90) && //letras mayusculas
  key.charCode != 0 && key.charCode != 46 && //retroceso
  key.charCode != 241 && //ñ
  key.charCode != 209 && //Ñ
  key.charCode != 32 && //espacio
  key.charCode != 225 && //á
  key.charCode != 233 && //é
  key.charCode != 237 && //í
  key.charCode != 243 && //ó
  key.charCode != 250 && //ú
  key.charCode != 193 && //Á
  key.charCode != 201 && //É
  key.charCode != 205 && //Í
  key.charCode != 211 && //Ó
  key.charCode != 218 /* Ú */
  ) return false;
});

function minus(e) {
  e.value = e.value.toLowerCase();
}