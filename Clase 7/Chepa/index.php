<!DOCTYPE html>
<?php
if (isset($_GET["mensaje"])) {
    echo "<script>alert(".$_GET["mensaje"].");</script>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <script src="js/jquery-3.2.0.min.js"></script>
        <script>
            $(document).ready(function (event) {
                $("#btnEnviar").click(function () {
                    $("#txtAccion").val("Enviar");
                    $.ajax({
                        type: 'POST',
                        url: "proceso.php",
                        data: $("#formulario").serialize(),
                        success: function (data) {
                            $("#respuesta").html(data);
                        }
                    });
                });
                //////////////////////////////////////////////
                $("#btnEliminar").click(function () {
                    $("#txtAccion").val("Eliminar");
                    $.ajax({
                        type: 'POST',
                        url: "proceso.php",
                        data: $("#formulario").serialize(),
                        success: function (data) {
                            $("#respuesta").html(data);
                        }
                    })
                });
                $("#btnListar").click(function () {
                    $("#txtAccion").val("Listar");
                    $.ajax({
                        type: 'POST',
                        url: "proceso.php",
                        data: $("#formulario").serialize(),
                        success: function (data) {
                            $("#respuesta").html(data);
                        }
                    })
                });
            });
        </script>
        <form id="formulario" method="post">
            <table border="1">
                <tr>
                    <td colspan="2">Formulario de Inscripcion</td>
                </tr>
                <tr>
                    <td>Rut:</td>
                    <td> <input type="text" name="txtRut" value="" /> </td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td> <input type="text" name="txtNombre" value="" /> </td>
                </tr>
                <tr>
                    <td>Edad:</td>
                    <td> <input type="text" name="txtEdad" value="" /> </td>
                </tr>
                <tr>
                    <td>Mensaje:</td>
                    <td> <textarea name="txtMensaje" rows="4" cols="20">
                        </textarea> </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="button" value="Enviar" id="btnEnviar"/>
                        <input type="reset" value="Limpiar" />
                        <input type="button" value="Eliminar" id="btnEliminar" />
                        <input type="button" value="Listar" id="btnListar" />
                    </td>
                </tr>
            </table>
            <input type="hidden" id="txtAccion" name="txtAccion">
        </form>
        <div id="respuesta">
            
        </div>
    </body>
</html>
