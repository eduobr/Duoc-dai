<!DOCTYPE html>
<?php
include_once '/panel.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
<!--        <link rel="stylesheet" href="css/estilo.css">
        <script src="js/jquery-3.2.0.min.js"></script>
        <script src="js/main.js"></script>-->
    </head>
    <body style="background-color: cadetblue">
        <div class="error" id="err-login">
            <span>Datos de ingreso no validos, inténtalo de nuevo por favor</span>
        </div>
        <div class="main">
            <h1>Login</h1>
            <form id="frmLogin" name="frmLogin" method="post">
                <table>
                    <tr>
                        <td>Usuario:</td>
                        <td><input type="text" class="form-control" name="txtUsuario" id="txtUsuario"></td>
                    </tr>
                    <tr>
                        <td>Contraseña:</td>
                        <td><input type="password" class="form-control" name="txtPass" id="txtPass"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="btnValidar" id="btnValidar" value="Validar"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
