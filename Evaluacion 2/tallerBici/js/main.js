$(document).on('submit', '#frmLogin', function (event) {
    event.preventDefault();
    $.ajax({
        url: 'validar.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function () {

        }
    })
            .done(function (respuesta) {
                console.log(respuesta);
                if (!respuesta.error) {
                    if (respuesta.tipo == 'Cliente' || respuesta.tipo == 'Empleado' || respuesta.tipo == 'ADMIN') {
                        location.href = "index.php";
                    }
                } else {
                    $("#err-login").slideDown('slow');
                    setTimeout(function () {
                        $('#err-login').slideUp('slow');
                    }, 3000);
                }
            })
            .fail(function (resp) {
                console.log(resp.responseText);
            })
            .always(function () {
                console.log("complete");
            });
});
$(document).on('submit', '#frmRegistro', function (event) {
    event.preventDefault();
    $("#txtAccion").val("registrar");
    $.ajax({
        url: 'proceso.php',
        type: 'POST',
        data: $(this).serialize(),
        success: function (data) {
            $("#respuesta").html(data);
        }
    });
});
//$(document).on('submit', '#frmCotizacion', function (event) {
//    event.preventDefault();
//
//});
$(document).on('submit', '#frmAnticipo', function (event) {
    event.preventDefault();
    $("#txtAccion").val("anticipo");
    $.ajax({
        url: 'proceso.php',
        type: 'POST',
        data: $(this).serialize(),
        success: function (data) {
            $("#respuesta").html(data);
        }
    });
});
$(document).ready(function (event) {
    $.ajax({
        url: 'buscar.php',
        type: 'POST',
        data: $('#frmBusqueda').serialize(),
        success: function (data) {
            $("#productos").html(data);
        }
    });
    $("#caja_busqueda").keyup(function () {
        $.ajax({
            url: 'buscar.php',
            type: 'POST',
            data: $('#frmBusqueda').serialize(),
            success: function (data) {
                $("#productos").html(data);
            }
        });
    });
    $("#cboTipoProd").change(function () {
        switch ($("#cboTipoProd").prop('selectedIndex')) {
            case 0:
                $("#cboTipoBici").prop('disabled', false);
                $("#numAro").prop('disabled', false);
                break;
            case 1:
                $("#cboTipoBici").prop('disabled', true);
                $("#numAro").prop('disabled', true);
                break;
        }
    });
    $("#btnListarProd").click(function () {
        $("#txtListarProd").val("listarProd");
        $.ajax({
            url: 'proceso.php',
            type: 'POST',
            data: $("#frmListarProd").serialize(),
            success: function (data) {
                $("#respuestaProd").html(data);
            }
        });
    });

    $("#btnEnviarCot").click(function () {
        $("#txtAccionCot").val("cotizacion");
        $.ajax({
            url: 'proceso.php',
            type: 'POST',
            data: $("#frmCotizacion").serialize(),
            success: function (data) {
                $("#respuestaCot").html(data);
            }
        });
    });
    $("#btnRegistrar").click(function () {
        $("#txtAccionReg").val("registrar");
        $.ajax({
            url: 'proceso.php',
            type: 'POST',
            data: $("#frmRegistro").serialize(),
            success: function (data) {
                $("#respuestaReg").html(data);
            }
        });
    });
});