function validarRut(rut) {
    var mult = 3;
    var tope = 10;
    var unMillon = false;
    if (rut.length == 11) {
        mult = 2;
        tope = 9;
        unMillon = true;

    }
    var suma = 0;
    var soloNum = new String();
    for (var i = 0; i < tope; i++) {
        var x = rut.substring(i, i + 1);
        if (x != ".") {
            suma = suma + (x * mult);
            mult--;
            soloNum += x.toString();
            if (mult == 1) {
                mult = 7;
            }
            //alert("Numero:"+x+" , Suma:"+suma);    
        }
    }
    var resto = suma % 11;
    var dv = 11 - resto;
    if (dv == 10) {
        dv = 'K';
    } else if (dv == 11) {
        dv = 0;
    }
    if (unMillon == true) {
        var digito = rut.substring(10, 11);
    } else {
        var digito = rut.substring(11, 12);
    }
    if (dv != digito) {
        alertify.error("rut incorrecto");
        return false;
    }
    $("#txtRut2").val(soloNum);
    return soloNum;

}
$(document).ready(function () {
    $.ajax({
        url: 'proceso.php',
        type: 'POST',
        data: $("#frmAnularAtencion").serialize()
    });
    var URLactual = window.location;
    if (URLactual == "http://localhost:8080/ExamenFinal/listado-abogados.php") {
        $("#txtAccion").val("listarAbo");
        $.ajax({
            url: 'proceso.php',
            type: 'POST',
            data: $("#frmListarAbo").serialize(),
            success: function (data) {
                $("#respuesta").html(data);
            }
        });
    }
    if (URLactual == "http://localhost:8080/ExamenFinal/listado-clientes.php") {
        $("#txtAccion").val("listarCli");
        $.ajax({
            url: 'proceso.php',
            type: 'POST',
            data: $("#frmListarCli").serialize(),
            success: function (data) {
                $("#respuesta").html(data);
            }
        });
    }
    if (URLactual == "http://localhost:8080/ExamenFinal/listado-atenciones.php") {
        $("#txtAccion").val("listarAte");
        $.ajax({
            url: 'proceso.php',
            type: 'POST',
            data: $("#frmListarAte").serialize(),
            success: function (data) {
                $("#respuesta").html(data);
            }
        });
    }
    $("#btnRegistrarCli").click(function () {
        $("#txtAccion").val("registrarCli");
        var rut = document.getElementById("txtRut").value;
        if (rut == "") {
            alertify.error("El campo rut no puede estar vacio");
            return;
        } else {
            if (validarRut(rut) == false) {
                return;
            }
        }
        var nombre = document.getElementById("txtNombre").value;
        var apellidoP = document.getElementById("txtApellidoP").value;
        var apellidoM = document.getElementById("txtApellidoM").value;
        if (nombre == "") {
            return alertify.error("El nombre no puede estar vacio");
        }
        if (apellidoP == "") {
            return alertify.error("El apellido paterno no puede estar vacio");
        }
        if (apellidoM == "") {
            return alertify.error("El apellido materno no puede estar vacio");
        }
        if (nombre.length < 4) {
            return alertify.error("El nombre debe tener por lo menos 3 caracteres");
        }
        if (apellidoP.length < 4) {
            return alertify.error("El apellido paterno debe tener por lo menos 4 caracteres");
        }
        if (apellidoM.length < 4) {
            return alertify.error("El apellido materno debe tener por lo menos 4 caracteres");
        }
        var telefono = document.getElementById("txtTelefono").value;
        if (telefono == "") {
            return alertify.error("El telefono no puede estar vacio");
        } else {
            if (isNaN(telefono)) {
                return alertify.error("El telefono debe ser un numero");
            } else {
                if (telefono.length != 9) {
                    return alertify.error("El numero de telefono deben ser 9 numeros")
                } else {
                    var iTel = telefono.substring(0, 1);
                    if (iTel != "2" && iTel != "9") {
                        return alertify.error("El telefono debe empezar por 2 o 9");
                    }
                }
            }
        }
        $.ajax({
            url: 'proceso.php',
            type: 'POST',
            data: $("#frmRegCli").serialize(),
            success: function (data) {
                $("#respuestaReg").html(data);
            }
        });
    });
    $("#btnRegistrarAbo").click(function () {
        $("#txtAccion").val("registrarAbo");
        var rut = document.getElementById("txtRut").value;
        if (rut == "") {
            alertify.error("El campo rut no puede estar vacio");
            return;
        } else {
            if (validarRut(rut) == false) {
                return;
            }
        }
        var nombre = document.getElementById("txtNombre").value;
        var apellidoP = document.getElementById("txtApellidoP").value;
        var apellidoM = document.getElementById("txtApellidoM").value;
        if (nombre == "") {
            return alertify.error("El nombre no puede estar vacio");
        }
        if (apellidoP == "") {
            return alertify.error("El apellido paterno no puede estar vacio");
        }
        if (apellidoM == "") {
            return alertify.error("El apellido materno no puede estar vacio");
        }
        if (nombre.length < 4) {
            return alertify.error("El nombre debe tener por lo menos 3 caracteres");
        }
        if (apellidoP.length < 4) {
            return alertify.error("El apellido paterno debe tener por lo menos 4 caracteres");
        }
        if (apellidoM.length < 4) {
            return alertify.error("El apellido materno debe tener por lo menos 4 caracteres");
        }
        var valorHora = document.getElementById("numValor").value;
        if (valorHora.length == "") {
            return alertify.error("El valor de la hora no puede estar vacio");
        } else {
            if (valorHora < 1000) {
                return alertify.error("El valor de la Hora debe ser mayor a 1000");
            }
        }
        $.ajax({
            url: 'proceso.php',
            type: 'POST',
            data: $("#frmRegAbo").serialize(),
            success: function (data) {
                $("#respuestaReg").html(data);
            }
        });
    })
    $("#btnValidar").click(function () {
        $("#txtAccion").val("ingresar");
        $.ajax({
            url: 'proceso.php',
            type: 'POST',
            data: $("#frmLogin").serialize(),
            success: function (data) {
                $("#respuesta").html(data);
            }
        });
    });
    $("#btnIngresarAtencion").click(function () {
        $("#txtAccion").val("ingresarAte");
        var rutCli = document.getElementById("txtRutCli").value;
        var rutAbo = document.getElementById("txtRutAbo").value;
        if (rutCli == "") {
            return alertify.error("El rut del cliente no puede estar vacio");
        } else {
            if (validarRut(rutCli) == false) {
                return;
            } else {
                $("#txtRutAte1").val(validarRut(rutCli));

            }
        }
        if (rutAbo == "") {
            return alertify.error("El rut del abogado no puede estar vacio");
        } else {
            if (validarRut(rutAbo) == false) {
                return;
            } else {
                $("#txtRutAte2").val(validarRut(rutAbo));
            }
        }
        var f = new Date();
        var fecHoy = f.getFullYear() + "-0" + (f.getMonth() + 1) + "-" + f.getDate();
        var fecAtencion = document.getElementById("dtFecAtencion").value;
        if (fecAtencion == "") {
            return alertify.error("La fecha de atencion no puede estar vacia");
        } else {
            if (fecAtencion <= fecHoy) {
                return alertify.error("La fecha de atencion debe ser mayor a la fecha actual");
            }
        }
        var horaAtencion = document.getElementById("tHoraAtencion").value;
        if (horaAtencion == "") {
            return alertify.error("La hora de atencion no puede estar vacia");
        } else {
            if (horaAtencion.substring(2, 3) != ":") {
                return alertify.error("Ingrese la hora en el formato correcto");
            } else {
                var hor = horaAtencion.split(':');
                if (isNaN(hor[0]) || isNaN(hor[1])) {
                    return alertify.error("ingrese un numero en la hora de atencion");
                } else {
                    if (hor[0].length != 2 || hor[1].length != 2) {
                        return alertify.error("Ingrese una hora ej 10:00");
                    } else {
                        if (hor[0] < 10 || hor[0] > 18 || hor[1] >= 60) {
                            return alertify.error("la hora debe estar entre las 10 y 18hrs");
                        }
                    }
                }
            }
        }
//        for (var i = 0; i < horaAtencion.length; i++) {
//        }
        $.ajax({
            url: 'proceso.php',
            type: 'POST',
            data: $("#frmAtencion").serialize(),
            success: function (data) {
                $("#respuesta").html(data);
            }
        })
    });
    $("#btnListarAte").click(function () {
        $("#txtAccion").val("listarAte");
        $.ajax({
            url: 'proceso.php',
            type: 'POST',
            data: $("#frmListarAte").serialize(),
            success: function (data) {
                $("#respuesta").html(data);
            }
        });
    });
    $("#btnListarCli").click(function () {
        $("#txtAccion").val("listarCli");
        $.ajax({
            url: 'proceso.php',
            type: 'POST',
            data: $("#frmListarCli").serialize(),
            success: function (data) {
                $("#respuesta").html(data);
            }
        });
    });
    $("#btnListarAbo").click(function () {
        $("#txtAccion").val("listarAbo");
        $.ajax({
            url: 'proceso.php',
            type: 'POST',
            data: $("#frmListarAbo").serialize(),
            success: function (data) {
                $("#respuesta").html(data);
            }
        });
    });
    $("#cboEstadisticasCli").on('change', function () {
        $("#txtAccion").val("estadisticasCli");
        $.ajax({
            url: 'proceso.php',
            type: 'POST',
            data: $("#frmEstadisticasCli").serialize(),
            success: function (data) {
                $("#respuesta").html(data);
            }
        });
    });
    $("#dtFecEst1").prop('disabled', true);
    $("#dtFecEst2").prop('disabled', true);
    $("#btnFecha").prop('disabled', true);
    $("#cboEstadisticasAte").on('change', function () {
        switch ($("#cboEstadisticasAte").prop("selectedIndex")) {
            case 1:
                $("#dtFecEst1").prop('disabled', false);
                $("#dtFecEst2").prop('disabled', false);
                $("#btnFecha").prop('disabled', false);

                break;
            default:
                $("#dtFecEst1").prop('disabled', true);
                $("#dtFecEst2").prop('disabled', true);
                $("#btnFecha").prop('disabled', true);
                $("#dtFecEst1").val("");
                $("#dtFecEst2").val("");
                break;
        }
        $("#txtAccion").val("estadisticasAte");
        $.ajax({
            url: 'proceso.php',
            type: 'POST',
            data: $("#frmEstadisticasAte").serialize(),
            success: function (data) {
                $("#respuesta").html(data);
            }
        });
    });
    $("#btnFecha").click(function () {
        $("#txtAccion").val("estadisticasAte");
        $.ajax({
            url: 'proceso.php',
            type: 'POST',
            data: $("#frmEstadisticasAte").serialize(),
            success: function (data) {
                $("#respuesta").html(data);
            }
        });
    });

    $("#txtBusqueda").keyup(function () {
        $("#txtBuscar").val("Cliente");
        $.ajax({
            url: 'buscar.php',
            type: 'POST',
            data: $('#frmBuscar').serialize(),
            success: function (data) {
                $("#respuesta").html(data);
            }
        });
    });
    $("#txtBusquedaAbo").keyup(function () {
        $("#txtBuscar").val("Abogado");
        $.ajax({
            url: 'buscar.php',
            type: 'POST',
            data: $('#frmBuscar').serialize(),
            success: function (data) {
                $("#respuesta").html(data);
            }
        });
    });
    $("#txtBusquedaAte").keyup(function () {
        $("#txtBuscar").val("Atencion");
        $.ajax({
            url: 'buscar.php',
            type: 'POST',
            data: $('#frmBuscar').serialize(),
            success: function (data) {
                $("#respuesta").html(data);
            }
        });
    });
});


