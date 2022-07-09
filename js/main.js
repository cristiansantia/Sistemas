//Alerta Home
$(document).ready(function() {
  $("#alertHome").fadeOut(8000);
  $("#alertHome").click(function() {
    $("#alertHome").hide();
  });
});

//Guardando registro en Mobiliario
$(document).ready(function() {
    $("#GuardarMob").click(function() {
      var datos = $("#formMob").serialize();
      $.ajax({
        type: "POST",
        url: "programacion/nuevoRegistroMobiliario.php",
        data: datos,
        success: function(r) {
          if (r == 1) {
            $("#resMobGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-success alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Hecho!</strong> Nuevo registro guardado.</div>');
            $("#formMob")[0].reset();
            $("#codigost").load("programacion/capturartipo.php");
            $("#divalerta").fadeOut(8000);
          } else if (r == 2) {
            $("#resMobGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Error!</strong> El registro no fue guardado.</div>');
            $("#divalerta").fadeOut(8000);
          } else if (r == 3) {
            $("#resMobGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> Completa todos los campos obligatorios.</div>');
            $("#divalerta").fadeOut(8000);
          } else if (r == 4) {
            $("#resMobGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> El precio es inválido.</div>');
            $("#divalerta").fadeOut(8000);
          } else if (r == 5) {
            $("#resMobGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> El número de serie ya está registrado.</div>');
            $("#divalerta").fadeOut(8000);
          }
        }
      });
      return false;
    });
    $("#codigost").load("programacion/capturartipo.php");
    $("#resMobGuardado").click(function() {
      $("#divalerta").hide();
    });
});

//Editar registro en Mobiliario
$(document).ready(function() {
    $("#GuardarEditar").click(function() {
      $("#tipoEditar").attr("disabled", false);
      var datosEdit = $("#formMobEdit").serialize();

      $.ajax({
        type: "POST",
        url: "programacion/editarRegistroMobiliario.php",
        data: datosEdit,
        success: function(r) {
          if (r == 1) {
            $("#resMobEdit").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-success alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Hecho!</strong> Registro actualizado.</div>');
            
            $("#divalerta").fadeOut(8000);
          } else if (r == 2) {
            $("#resMobEdit").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Error!</strong> El registro no fue actualizado. El código ya siendo utilizado por otro artículo.</div>');
            $("#divalerta").fadeOut(8000);
          } else if (r == 3) {
            $("#resMobEdit").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> Completa todos los campos obligatorios.</div>');
            $("#divalerta").fadeOut(8000);
          } else if (r == 4) {
            $("#resMobEdit").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> El precio es inválido.</div>');
            $("#divalerta").fadeOut(8000);
          } else if (r == 5) {
            $("#resMobEdit").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> El número de serie ya está registrado.</div>');
            $("#divalerta").fadeOut(8000);
          } else if (r == 6) {
            $("#resMobEdit").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> El número de serie ya está registrado.</div>');
            $("#divalerta").fadeOut(8000);
          }
        }
      });
      $("#tipoEditar").attr("disabled", true);
      return false;
    });

    $("#resMobEdit").click(function() {
      $("#divalerta").hide();
    });
});

//Guardando Áreas, Calidades y Tipos
$(document).ready(function() {
  //Areas
  $("#GuardarArea").click(function() {
    var datosArea = $("#formAreas").serialize();
    $.ajax({
      type: "POST",
      url: "programacion/nuevaArea.php",
      data: datosArea,
      success: function(r) {
        if (r == 1) {
          $("#resAreaGuardada").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-success alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Hecho!</strong> Área guardada.</div>');
          $("#formAreas")[0].reset();
          $("#divalerta").fadeOut(8000);
          $("#tablaAreas").load("programacion/imprimirAreas.php");
        } else if (r == 2) {
          $("#resAreaGuardada").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Error!</strong> Área no guardada.</div>');
          $("#divalerta").fadeOut(8000);
        } else if (r == 3) {
          $("#resAreaGuardada").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> Completa todos los campos obligatorios.</div>');
          $("#divalerta").fadeOut(8000);
        } else if (r == 4) {
          $("#resAreaGuardada").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> Ya existe.</div>');
          $("#divalerta").fadeOut(8000);
        }
      }
    });
    return false;
  });

  $("#resAreaGuardada").click(function() {
    $("#divalerta").hide();
  });

  //Calidades
  $("#GuardarCalidad").click(function() {
    var datosCalidad = $("#formCalidades").serialize();
    $.ajax({
      type: "POST",
      url: "programacion/nuevaCalidad.php",
      data: datosCalidad,
      success: function(r) {
        if (r == 1) {
          $("#resCalidadGuardada").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-success alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Hecho!</strong> Calidad guardada.</div>');
          $("#formCalidades")[0].reset();
          $("#divalerta").fadeOut(8000);
          $("#tablaCalidades").load("programacion/imprimirCalidades.php");
        } else if (r == 2) {
          $("#resCalidadGuardada").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Error!</strong> Calidad no guardada.</div>');
          $("#divalerta").fadeOut(8000);
        } else if (r == 3) {
          $("#resCalidadGuardada").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> Completa todos los campos obligatorios.</div>');
          $("#divalerta").fadeOut(8000);
        } else if (r == 4) {
          $("#resCalidadGuardada").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> Ya existe.</div>');
          $("#divalerta").fadeOut(8000);
        }
      }
    });
    return false;
  });

  $("#resCalidadGuardada").click(function() {
    $("#divalerta").hide();
  });

  //Tipos
  $("#GuardarTipo").click(function() {
    var datosTipo = $("#formTipos").serialize();
    $.ajax({
      type: "POST",
      url: "programacion/nuevoTipo.php",
      data: datosTipo,
      success: function(r) {
        if (r == 1) {
          $("#resTipoGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-success alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Hecho!</strong> Tipo guardado.</div>');
          $("#formTipos")[0].reset();
          $("#divalerta").fadeOut(8000);
          $("#tablaTipos").load("programacion/imprimirTipos.php");
        } else if (r == 2) {
          $("#resTipoGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Error!</strong> Tipo no guardado.</div>');
          $("#divalerta").fadeOut(8000);
        } else if (r == 3) {
          $("#resTipoGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> Completa todos los campos obligatorios.</div>');
          $("#divalerta").fadeOut(8000);
        } else if (r == 4) {
          $("#resTipoGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> Ya existe.</div>');
          $("#divalerta").fadeOut(8000);
        }
      }
    });
    return false;
  });

  $("#resTipoGuardado").click(function() {
    $("#divalerta").hide();
  });
});

//Guardadndo datos de Institución, Director y Usuario Administrador
$(document).ready(function() {
  //Institución
  $("#GuardarDatosInstitucion").click(function() {
    var datosInstitucion = $("#formDatosInstitucion").serialize();
    $.ajax({
      type: "POST",
      url: "programacion/actualizarDatosInstitucion.php",
      data: datosInstitucion,
      success: function(r) {
        if (r == 1) {
          $("#resDatosGuardados").html('<div style="position: fixed; z-index: 1000; margin-left: 35px; width: 500px;" id="divalerta" class="alert alert-success alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Hecho!</strong> Datos de la Institución actualizados.</div>');
          $("#divalerta").fadeOut(8000);
        } else if (r == 2) {
          $("#resDatosGuardados").html('<div style="position: fixed; z-index: 1000; margin-left: 35px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Error!</strong> No se pudieron actualizar los datos.</div>');
          $("#divalerta").fadeOut(8000);
        } else if (r == 3) {
          $("#resDatosGuardados").html('<div style="position: fixed; z-index: 1000; margin-left: 35px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> Completa todos los campos obligatorios.</div>');
          $("#divalerta").fadeOut(8000);
        }
      }
    });
    return false;
  });

  $("#resDatosGuardados").click(function() {
    $("#divalerta").hide();
  });


   //Nuevo Director
  $("#GuardarDatosDirector").click(function() {
    var datosDirector = $("#formDatosDirector").serialize();
    $.ajax({
      type: "POST",
      url: "programacion/nuevoDirector.php",
      data: datosDirector,
      success: function(r) {
        if (r == 1) {
          $("#resDirectorGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 35px; width: 500px;" id="divalerta" class="alert alert-success alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Hecho!</strong> Nuevo director guardado.</div>');
          $("#divalerta").fadeOut(8000);
          $("#formDatosDirector")[0].reset();
          $("#tablaDirectores").load("programacion/imprimirDirectores.php");
        } else if (r == 2) {
          $("#resDirectorGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 130px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Error!</strong> No se pudo agregar el nuevo director. El N° de Escalafón ya existe.</div>');
          $("#divalerta").fadeOut(8000);
        } else if (r == 3) {
          $("#resDirectorGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 130px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> Completa todos los campos obligatorios.</div>');
          $("#divalerta").fadeOut(8000);
        } else if (r == 4) {
          $("#resDirectorGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 130px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> El DUI es inválido.</div>');
          $("#divalerta").fadeOut(8000);
        } else if (r == 5) {
          $("#resDirectorGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 130px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> El nombre es inválido.</div>');
          $("#divalerta").fadeOut(8000);
        }
      }
    });
    return false;
  });

  $("#resDirectorGuardado").click(function() {
    $("#divalerta").hide();
  });

  // Editar Director

  $("#ActualizarDatosDirector").click(function() {
    var datosNDirector = $("#formEditarDirector").serialize();
    $.ajax({
      type: "POST",
      url: "programacion/actualizarDatosDirector.php",
      data: datosNDirector,
      success: function(r) {
        if (r == 1) {
          $("#resDirectorEditado").html('<div style="position: fixed; z-index: 1000; margin-left: 130px; width: 500px;" id="divalerta" class="alert alert-success alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Hecho!</strong> Datos del director actualizados.</div>');
          $("#divalerta").fadeOut(8000);
          $("#formDatosDirector")[0].reset();
          $("#tablaDirectores").load("programacion/imprimirDirectores.php");
        } else if (r == 2) {
          $("#resDirectorEditado").html('<div style="position: fixed; z-index: 1000; margin-left: 130px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Error!</strong> No se pudo actualizar los datos del director. El N° de Escalafón ya existe.</div>');
          $("#divalerta").fadeOut(8000);
        } else if (r == 3) {
          $("#resDirectorEditado").html('<div style="position: fixed; z-index: 1000; margin-left: 130px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> Completa todos los campos obligatorios.</div>');
          $("#divalerta").fadeOut(8000);
        } else if (r == 4) {
          $("#resDirectorEditado").html('<div style="position: fixed; z-index: 1000; margin-left: 130px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> El nombre es inválido.</div>');
          $("#divalerta").fadeOut(8000);
        }
      }
    });
    return false;
  });


  //Usuario Administrador
  $("#GuardarDatosUsuario").click(function() {
    var datosUsuario = $("#formDatosUsuario").serialize();
    $.ajax({
      type: "POST",
      url: "programacion/actualizarDatosUsuario.php",
      data: datosUsuario,
      success: function(r) {
        if (r == 1) {
          $("#resUsuarioGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 120px; width: 500px;" id="divalerta" class="alert alert-success alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Hecho!</strong> Datos del Usuario Administrador actualizados. Úsalos la próxima vez que inicies sesión</div>');
          $("#divalerta").fadeOut(8000);
          $(".removePass").val("");
        } else if (r == 2) {
          $("#resUsuarioGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 120px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Error!</strong> No se pudieron actualizar los datos.</div>');
          $("#divalerta").fadeOut(8000);
        } else if (r == 3) {
          $("#resUsuarioGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 120px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> Completa todos los campos obligatorios.</div>');
          $("#divalerta").fadeOut(8000);
        } else if (r == 4) {
          $("#resUsuarioGuardado").html('<div style="position: fixed; z-index: 1000; margin-left: 120px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> La contraseña actual es incorrecta.</div>');
          $("#divalerta").fadeOut(8000);
          $("#passwordActual").focus();
        }
      }
    });
    return false;
  });

  $("#resUsuarioGuardado").click(function() {
    $("#divalerta").hide();
  });

  var i = 0;
  $("#mostrar").click(function() {
      if(i == 0) {
          i = 1;
          $('#contrasenaI').removeAttr("type", "password");
          $("#contrasenaI").prop("type", "text");
          $("#mostrarIcon").attr("class","fa fa-eye-slash");
          $("#mostrar").attr("title","Ocultar contraseña");
      } else { 
          i = 0;
          $('#contrasenaI').removeAttr("type", "text");
          $("#contrasenaI").prop("type", "password");
          $("#mostrarIcon").attr("class","fa fa-eye");
          $("#mostrar").attr("title","Mostrar contraseña");
      }
  });
});

//Comprobar que codigo mobiliario no exista en BD
  function buscarCodigo() {
    var textoBusqueda = $("input#codigoMobiliario").val();

    
    if (textoBusqueda != "") {
        $.post("programacion/comprobarCodigo.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
          if (mensaje == 1) {
            $('#GuardarMob').attr("disabled", true);
            $(".status").hide();
            $("#codigoBuscado").append("<span class='status' style='font-size: 13px; color: red;'> Ya existe</span>");
          } else if(mensaje == 2) {
            $('#GuardarMob').attr("disabled", false);
            $(".status").hide();
            $("#codigoBuscado").append("<span class='status' style='font-size: 13px; color: green;'> Disponible</span>");
          }
        });
    } else {
    };
  }

  //Comprobar que codigo tipo no exista en BD
   function buscarTipos() {
    var respuestabusqueda = $("input#tipoBusqueda").val();

    
    if (respuestabusqueda != "") {
        $.post("programacion/buscarcodigotipo.php", {codigotipo: respuestabusqueda}, function(mensaje) {
          if (mensaje == 1) {
            $('#GuardarTipo').attr("disabled", true);
            $(".status").hide();
            $("#disponibilidadcodigo").append("<span class='status' style='font-size: 13px; color: red;'> Ya existe</span>");
          } else if(mensaje == 2) {
            $('#GuardarTipo').attr("disabled", false);
            $(".status").hide();
            $("#disponibilidadcodigo").append("<span class='status' style='font-size: 13px; color: green;'> Disponible</span>");
          }
        });
    } else {
    };
  }

//Busqueda de Mobiliario
  $(document).ready(function() {
    $("#resultadoBusqueda").html("<br><br><br><h3 class='text-center'><i class='fa fa-clock-o' aria-hidden='true'></i>&nbsp;¡No hay búsquedas recientes!</h3>");
  });

  function buscarMobiliario() {
    var textoBusquedaMob = $("input#txtBusqueda").val();
    var buscarPor = $("#buscarPor option:selected").val();
    var areaBuscar = $("#areaBuscar option:selected").val();
    var activoBuscar = $("#activoBuscar option:selected").val();
    
    if (textoBusquedaMob != "") {
      $.post(
        "programacion/buscarMobiliario.php", 
        { 
          valorBusqueda: textoBusquedaMob,
          por: buscarPor,
          area: areaBuscar,
          activo: activoBuscar
        },
        function(mensaje) {
          $("#resultadoBusqueda").html(mensaje);
        }
      );
    } else {
      $("#resultadoBusqueda").html("<br><br><br><h3 class='text-center'><i class='fa fa-clock-o' aria-hidden='true'></i>&nbsp;¡No hay búsquedas recientes!</h3>");
    }
  }

//Busqueda de Préstamos
  function buscarPrestamo() {
    var textoBusquedaPres = $("input#txtBusqueda").val();
    var buscarPor = $("#buscarPor option:selected").val();
    
    
    if (textoBusquedaPres != "") {
      $.post(
        "programacion/buscarPrestamo.php", 
        { 
          valorBusqueda: textoBusquedaPres,
          por: buscarPor
        },
        function(mensaje) {
          $("#resultadoBusqueda").html(mensaje);
        }
      );
    }
  }



//Alerta del LogIn
$(document).ready(function() {
  $("#alertas").click(function() {
    $("#alertas").hide();
  });
});

// registrar prestamo
 $(document).ready(function() {
    $("#prestar").click(function() {
      var solituddatos = $("#solicitud").serialize();
      $.ajax({
        type: "POST",
        url: "programacion/guardarprestamo.php",
        data:solituddatos,
        success: function(respuesta) {
          if (respuesta == 1) {
            $("#respuestas").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-success alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Hecho!</strong> Nuevo préstamo guardado.</div>');
            $("#solicitud")[0].reset();
            $("#equipos").load("programacion/cargar_listaEquipos.php");
            $("#cambiarfecha").load("programacion/cambiarfechadevolucion.php");
            $("#divalerta").fadeOut(8000);
             selecciondocumento();
          } else if (respuesta == 2) {
            $("#respuestas").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Error!</strong> El préstamo no fue guardado.</div>');
            $("#divalerta").fadeOut(8000);
          } else if (respuesta == 3) {
            $("#respuestas").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> Completa todos los campos obligatorios.</div>');
            $("#divalerta").fadeOut(8000);
          } else if (respuesta == 4) {
            $("#respuestas").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> El equipo seleccionado ya ha sido prestado.</div>');
            $("#divalerta").fadeOut(8000);
          } 
          else if (respuesta == 6) {
            $("#respuestas").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> La hora seleccionada es errónea, solo puedes elegir entre 07:00 hasta las 16:45.</div>');
            $("#divalerta").fadeOut(8000);
          } else if (respuesta == 7) {
            $("#respuestas").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> El horario para préstamos y reservaciones es de 07:00 hasta las 16:45, de Lunes a Viernes.</div>');
            $("#divalerta").fadeOut(8000);
          }
          else if (respuesta == 8) {
            $("#respuestas").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> El Nombre y Apellido solo pueden contener letras</div>');
            $("#divalerta").fadeOut(8000);
          }else if (respuesta == 9) {
            $("#respuestas").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> Este equipo se encuentra actualmente reservado para éste horario.</div>');
            $("#divalerta").fadeOut(8000);
          }else if (respuesta == 5) {
            $("#respuestas").html('<div style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> La hora de préstamo no puede ser menor a la hora actual.</div>');
            $("#divalerta").fadeOut(8000);
          }
        }
      });
      return false;
    });
      
      $("#equipos").load("programacion/cargar_listaEquipos.php");
      $("#cambiarfecha").load("programacion/cambiarfechadevolucion.php");
      $("#respuestas").click(function() {
      $("#divalerta").hide();
    });
});


//recargar lista de equipos
$(document).ready(function(){
    $('#tipo').val();
    recargarLista();

    $('#tipo').change(function(){
      recargarLista(1);
    });
  })
function recargarLista(){

    $.ajax({
      type:"POST",
      url:"programacion/cargar_listaEquipos.php",
      data:"codigotipo=" + $('#tipo').val(),
      success:function(r){
        $('#equipos').html(r);
      }
    });
  }

//recargar codigo tipo al codigo de mobiliario
$(document).ready(function(){
    $('#selectiontipo').val();
    selecciontipo(1);

    $('#selectiontipo').change(function(){
      selecciontipo();
    });
  })
function selecciontipo(){
  $.ajax({
      type:"POST",
      url:"programacion/capturartipo.php",
      data:"codigotipo=" + $('#selectiontipo').val(),
      success:function(r){
        $('#codigost').html(r);
      }
    });
  }

// seleccionar tipo de identificación
$(document).ready(function(){
    $('#typedocumento').val();
    selecciondocumento();

    $('#typedocumento').change(function(){
      selecciondocumento();
    });
  })
function selecciondocumento(){
  $.ajax({
      type:"POST",
      url:"programacion/selecciondedocumento.php",
      data:"documentoseleccionado=" + $('#typedocumento').val(),
      success:function(r){
        $('#documentoselect').html(r);
      }
    });
  }




    function Descargo() {
    var busqueda = $("input#busquedescargo").val();
    var tipo = $("#opcionbuscar option:selected").val();
    //var areaBuscar = $("#areaBuscar option:selected").val();
    
    if (busqueda != "") {
      $.post(
        "programacion/busquedadescargo.php", 
        { 
          resultado: busqueda,
          portipo:tipo
        },
        function(mensaje) {
          $("#registros").html(mensaje);
        }
      );
    }
  }

  //Editando Áreas, Tipos y Calidades desde editarCategoria.php
$(document).ready(function() {
    $("#revisar").hide();
    $("#ActualizarCategoria").click(function() {
      var datosCategoria = $("#formEditarCategoria").serialize();
      $.ajax({
        type: "POST",
        url: "programacion/actualizarCategoria.php",
        data: datosCategoria,
        success: function(r) {
          if (r == 1) {
            $("#resEditarCategoria").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Error!</strong> La Categoría no se pudo actualizar porque faltan datos del sistema.</div>');
            $("#divalerta").fadeOut(8000);
          } else if(r == 2) {
            $("#resEditarCategoria").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-warning alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> Completa todos los campos obligatorios.</div>');
            $("#divalerta").fadeOut(8000);
          } else if(r == 3) {
            $("#resEditarCategoria").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-success alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Hecho!</strong> Categoria actualizada.</div>');
            $("#divalerta").fadeOut(8000);
            $("#revisar").show();
          } else if(r == 4) {
            $("#resEditarCategoria").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Error!</strong> La categoría no se pudo actualizar.</div>');
            $("#divalerta").fadeOut(8000);
          }
        }
      });
      return false;
    });

    $("#resEditarCategoria").click(function() {
      $("#divalerta").hide();
    });
});

//Descargando Mobiliario 
$(document).ready(function() {

  //Utilizamos el onclick para el contenido generado por el buscador AJAX
  $("body").on("click",".descargarMob", function(e){
    e.preventDefault();
    var codigoDescargo = $(this).attr("id");

    var confirmar = confirm("CONFIRMAR DESCARGO DE MOBILIARIO:\n\nCódigo: " + codigoDescargo + "\n\nNota: Al dar click en aceptar no podrás cancelar la acción.");
    if (confirmar) {
      $.ajax({
        type:"POST",
        url:"programacion/descargarMobiliario.php",
        data:{codigoDescargo: codigoDescargo},
        success:function(r){
          if (r == 1) {
            $("#d"+codigoDescargo+"").fadeOut(1000);
            $("#resDescargarMob").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-success alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Hecho!</strong> El artículo se movió a Descargo.</div>');
            $("#divalerta").fadeOut(8000);
           
          } else if(r == 2) {
            $("#resDescargarMob").html('<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Error!</strong> El artículo no se pudo mover a Descargo.</div>');
            $("#divalerta").fadeOut(8000);
          }
        }
      }); 

      $("#resEditarCategoria").click(function() {
        $("#divalerta").hide();

      }); 
    } else {
      return false;
    }   
  });
});

// Cambiar fecha devolucion
$(document).ready(function(){
    $('#fechap').val();
    cambiarfecha();

    $('#fechap').change(function(){
      cambiarfecha();
    });
  })
function cambiarfecha(){
  $.ajax({
      type:"POST",
      url:"programacion/cambiarfechadevolucion.php",
      data:"fechaselec=" + $('#fechap').val(),
      success:function(r){
        $('#cambiarfecha').html(r);
      }
    });
  }

function actualizarhora(){
  var tiempo = new Date();
  var hora = tiempo.getHours();
  var minutos = tiempo.getMinutes();
  var segundos= tiempo.getSeconds();

  if (hora < 10) {
    hora= "0"+hora;
  }

  if (minutos < 10) {
    minutos= "0"+minutos;
  }



  var actualhour = document.getElementById('horap').value = hora+":"+minutos;
  cambiarhora(actualhour);

};



// hora devolucion por defecto
$(document).ready(function(){
    $('#horap').val();
    cambiarhora(actualizarhora());
  })
function cambiarhora(){
  $.ajax({
      type:"POST",
      url:"programacion/horaxdefecto.php",
      data:"horapordefecto=" + $('#horap').val(),
      success:function(r){
        $('#horapordefecto').html(r);
      }
    });
  }


function permisosnoti(){

    Push.Permission.request();

}

function devolucionequipo(id){
  var codigomensaje=id;
  $.post("programacion/devolucionequipomob.php", {equipodevolu:codigomensaje},
        function(codee) {
          var message = codee;
          notificaciondevolucion(message);
          $("#tabla"+codigomensaje+"").fadeOut(1000);
          $("#notificacion"+codigomensaje+"").fadeOut(1000);
        }
  );
}

function notificaciondevolucion(message){
  var tiempo = new Date();
  var hora = tiempo.getHours();
  if (hora < 10) {
    hora= "0"+hora;
  }
  var minutos = tiempo.getMinutes();
  if (minutos < 10) {
    minutos= "0"+minutos;
  }

  var hactaual = hora+":"+minutos;
  var message = message;
   Push.create('Se ha devuelto el siguiente equipo', {
    body:message +'  Hoy a las '+ hactaual,
    icon: 'images/user.png',
    timeout: 5000,
  });
};


function cancelarequipo(id){
  var codigomensaje=id;
  $.post("programacion/devolucionequipomob.php", {equipodevolu:codigomensaje},
        function(codee) {
          var message = codee;
          notificacioncancelacion(message);
          $("#tabla"+codigomensaje+"").fadeOut(1000);
          $("#notificacion"+codigomensaje+"").fadeOut(1000);
        }
  );
}

function notificacioncancelacion(message){
  var tiempo = new Date();
  var hora = tiempo.getHours();
  if (hora < 10) {
    hora= "0"+hora;
  }
  var minutos = tiempo.getMinutes();
  if (minutos < 10) {
    minutos= "0"+minutos;
  }

  var hactaual = hora+":"+minutos;
  var message = message;
   Push.create('Se ha cancelado el siguiente equipo', {
    body:message,
    icon: 'images/user.png',
    timeout: 5000,
  });
};

function updateprestamo(){
  var hora = new Date();
  var h = hora.getHours();
  var m = hora.getMinutes();
  var s= hora.getSeconds();

  if (h < 10) {
    h= "0"+h;
  }

  if (m < 10) {
    m= "0"+m;
  }



  var actul = document.getElementById('enviarhora').value = h+":"+m;
  changeestado(actul);

};
// hora devolucion por defecto
function changeestado(){
  $.ajax({
      type:"POST",
      url:"programacion/cargardatosprestamo.php",
      data:"hora=" + $('#enviarhora').val(),
      success:function(r){
        $('#aquisecargandatosprestamo').html(r);
      }
    });
  }




