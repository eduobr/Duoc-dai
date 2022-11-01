function validar() {
    var usuario = document.getElementById("txtUsuario").value;
    var contrasena = document.getElementById("txtContrasena").value;
    if (usuario == "admin" && contrasena == "admin") {
        location.href = "ingresar-reserva.php";
    } else {
        alert('usuario o contraseña incorrecto');
    }

}
function CrudReserva() {
    $.ajax({
        type: 'POST',
        url: "proceso.php",
        data: $("#formulario").serialize(),
        success: function (data) {
            $("#respuesta").html(data);
        }
    })
}
function AjxTotal() {
    $.ajax({
        type: 'POST',
        url: "proceso.php",
        data: $("#formulario").serialize(),
        success: function (data) {
            $("#total").html(data);
        }
    })
}

function CrudPelicula() {
    $.ajax({
        type: 'POST',
        url: "proceso.php",
        data: $("#formularioPeli").serialize(),
        success: function (data) {
            $("#respuesta").html(data);
        }
    })
}

$(document).ready(function (event) {
    $("#txtAccion").val("peliculas");
    AjxTotal();

    $("#btnEnviar").click(function () {
        $("#txtAccion").val("sadsadsa");
        CrudReserva();
    });
    //////////////////////////////////////////////
    $("#btnEliminar").click(function () {
        $("#txtAccion").val("Eliminar");
        CrudReserva();
    });
    $("#btnListar").click(function () {
        $("#txtAccion").val("Listar");
        CrudReserva();
    });
    $("#btnPorPeliculas").click(function () {
        $("#txtAccion").val("ListarPorPeliculas");
        CrudReserva();
    });

    $("#btnLimpiar").click(function () {
        $("#respuesta").html("");
        $("#total").html("0");
        location.reload();
    });

    $("#cboPelicula").change(function () {
        $("#txtAccion").val("peliculas");
        AjxTotal();
    });
    $("#txtNinos").focusout(function () {
        $("#txtAccion").val("ninos");
        AjxTotal();
    });
    $("#txtAdultos").focusout(function () {
        $("#txtAccion").val("adultos");
        AjxTotal();
    });
});

//JQUERY INGRESAR PELICULA
$(document).ready(function (event) {
    $("#btnEnviarP").click(function () {
        $("#txtAccionP").val("Enviar");
        CrudPelicula();
    });
    $("#btnEliminarP").click(function () {
        $("#txtAccionP").val("Eliminar");
        CrudPelicula();
    });
    $("#btnListarP").click(function () {
        $("#txtAccionP").val("Listar");
        CrudPelicula();
    });

    /*$("#btnLimpiar").click(function () {
     $("#respuesta").html("");
     })*/;
});


