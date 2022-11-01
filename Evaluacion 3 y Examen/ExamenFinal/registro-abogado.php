<?php
include_once '/panel.php';
if (!isset($_SESSION["usuario"])) {
    echo '<script>location.href = "index.php";</script>';
}
if ($tipoUsuario!="Administrador") {
    echo '<script>location.href = "index.php";</script>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="main">
            <h1>Registro Abogado</h1>
            <form id="frmRegAbo" method="post">
                <table>
                    <tr>
                        <td>Rut</td>
                        <td><input type="text" class="form-control" name="txtRut" id="txtRut" placeholder="Ingrese rut" required></td>
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
                        <td>Especialidad</td>
                        <td>
                            <select name="cboEspecialidad" id="cboEspecialidad" class="form-control">
                                <option value="Accidentes de trafico">Accidentes de trafico</option>
                                <option value="Administrativo">Administrativo</option>
                                <option value="Adopciones">Adopciones</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Valor Hora</td>
                        <td><input type="number" class="form-control" name="numValor" id="numValor" placeholder="Valor de la hora" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="button" class="form-control btn-primary" name="btnRegistrarAbo" id="btnRegistrarAbo" value="Registrar">
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
