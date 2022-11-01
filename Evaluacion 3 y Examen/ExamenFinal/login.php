<!DOCTYPE html>
<?php
include_once '/panel.php';
if (isset($_SESSION["usuario"])) {
    echo '<script>location.href = "index.php";</script>';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <!--        <link rel="stylesheet" href="css/estilo.css">
                <script src="js/jquery-3.2.0.min.js"></script>
                <script src="js/main.js"></script>-->
    </head>

    <div class="main">
        <h1>Login</h1>
        <form id="frmLogin" name="frmLogin" method="post">
            <table>
                <tr>
                    <td>Usuario:</td>
                    <td><input type="text" class="form-control" name="txtUsuario" id="txtUsuario" placeholder="Ingrese Usuario"></td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td><input type="password" class="form-control" name="txtPass" id="txtPass" placeholder="Ingrese Contraseña"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="button" class="form-control btn-primary" name="btnValidar" id="btnValidar" value="Validar"></td>
                </tr>
            </table>
            <input type="hidden" id="txtAccion" name="txtAccion" value="">
        </form>
        <div id="respuesta">
        </div>
    </div>
</body>
</html>
