<!DOCTYPE html>
<?php
include_once '/panel.php';
if (!isset($_SESSION["usuario"])) {
    echo '<script>location.href = "index.php";</script>';
}
if ($tipoUsuario!="Administrador") {
    echo '<script>location.href = "index.php";</script>';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrar Cliente</title>
    </head>
    <body>
        <div class="main">
            <h1>Registro Cliente</h1>
            <form id="frmRegCli" method="post">
                <table>
                    <tr>
                        <td>Nombre de Usuario</td>
                        <td><input type="text" class="form-control" name="txtUsuario" id="txtUsuario" placeholder="Ingrese Usuario" required></td>
                    </tr>
                    <tr>
                        <td>Contraseña</td>
                        <td><input type="password" class="form-control" name="txtPass" id="txtPass" placeholder="Ingrese Contraseña" required></td>
                    </tr>
                   
                    <tr>
                        <td>Rut</td>
                        <td><input type="text" class="form-control" name="txtRut" id="txtRut" placeholder="Ej: 11.111.111-1" required></td>
                        <td><input type="hidden" class="form-control" name="txtRut2" id="txtRut2" required></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Ingrese Nombre" required></td>
                    </tr>
                    <tr>
                        <td>Apellido Paterno</td>
                        <td><input type="text" class="form-control" name="txtApellidoP" id="txtApellidoP" placeholder="Ingrese Apellido Paterno" required></td>
                    </tr>
                    <tr>
                        <td>Apellido Materno</td>
                        <td><input type="text" class="form-control" name="txtApellidoM" id="txtApellidoM" placeholder="Ingrese Apellido Materno" required></td>
                    </tr>
                    <tr>
                        <td>Tipo Persona</td>
                        <td>
                            <select name="cboTipoPersona" id="cboTipoPersona" class="form-control">
                                <option value="Natural">Natural</option>
                                <option value="Juridica">Juridica</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Direccion</td>
                        <td><input type="text" class="form-control" name="txtDireccion" id="txtDireccion" placeholder="Ingrese direccion" required></td>
                    </tr>
                    <tr>
                        <td>Telefono</td>
                        <td><input type="text" class="form-control" name="txtTelefono" id="txtTelefono" placeholder="debe contener 9 digitos" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="button" class="form-control btn-primary" name="btnRegistrarCli" id="btnRegistrarCli" value="Registrar">
                        </td>
                    </tr>
                </table>
                <input type="hidden" id="txtAccion" name="txtAccion" value="">
            </form>
            <div id="respuestaReg">
            </div>
        </div>
    </body>
</html>
