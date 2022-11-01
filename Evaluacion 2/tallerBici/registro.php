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
        <title>Registrarse</title>
    </head>
    <body>
        <div class="main">
            <h1>Registro</h1>
            <form id="frmRegistro" method="post">
                <table>
                    <tr>
                        <td>Nombre de Usuario</td>
                        <td><input type="text" class="form-control" name="txtUsuario" id="txtUsuario" required></td>
                    </tr>
                    <tr>
                        <td>Contraseña</td>
                        <td><input type="password" class="form-control" name="txtPass" id="txtPass" required></td>
                    </tr>
                   
                    <tr>
                        <td>Rut</td>
                        <td><input type="text" class="form-control" name="txtRut" id="txtRut" required></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><input type="text" class="form-control" name="txtNombre" id="txtNombre" required></td>
                    </tr>
                    <tr>
                        <td>Apellido</td>
                        <td><input type="text" class="form-control" name="txtApellido" id="txtApellido" required></td>
                    </tr>
                    <tr>
                        <td>Direccion</td>
                        <td><input type="text" class="form-control" name="txtDireccion" id="txtDireccion" required></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" class="form-control" name="txtEmail" id="txtEmail" required></td>
                    </tr>
                    <tr>
                        <td>Telefono</td>
                        <td><input type="text" class="form-control" name="txtTelefono" id="txtTelefono" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="button" name="btnRegistrar" id="btnRegistrar" value="Registrar">
                        </td>
                    </tr>
                </table>
                <input type="hidden" id="txtAccionReg" name="txtAccionReg" value="">
            </form>
        </div>
        <div id="respuestaReg">

        </div>
    </body>
</html>
