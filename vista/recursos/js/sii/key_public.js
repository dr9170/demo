"use strict";

$(document).ready(function () {
  $.ajax({
    url: "../../controlador/Route.php",
    type: "POST",
    async: false,
    data: {
      x_c: $("#key_public").val(),
      y_c: $("#key_public").val()
    }
  }).done(function (result) {
    if (result !== null) {
      var diccHash = result;
      $.each(diccHash, function (k, v) {
        window[k + k.charAt(0)] = v;
      });
    }
  }).fail(function (jqXHR, textStatus, errorThrown) {
    bootbox.alert({
      message: "Ups!, no se ha podido procesar su solicitud, por favor intente más tarde."
    });
    console.log("Code error: " + jqXHR.status);
  });
});