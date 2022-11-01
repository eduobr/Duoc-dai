<?php
include_once '/panel.php';
if (!isset($_SESSION["usuario"])) {
    echo '<script>location.href = "index.php";</script>';
}
if ($tipoUsuario!="Gerente") {
    echo '<script>location.href = "index.php";</script>';
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Highcharts Example</title>

        <style type="text/css">

        </style>
    </head>
    <body>

        <script src="Highcharts-5.0.12/code/highcharts.js"></script>
        <script src="Highcharts-5.0.12/code/highcharts-3d.js"></script>
        <script src="Highcharts-5.0.12/code/modules/exporting.js"></script>
        <div class="container">
            <form id="frmEstadisticasCli">
                <table class="table">
                    <tr>
                        <td>Seleccione estadisticas</td>
                        <td>
                            <select class="form-control" name="cboEstadisticasCli" id="cboEstadisticasCli">
                                <option value="0">Seleccione</option>
                                <option value="1">Rango de Antiguedad en meses</option>
                                <option value="2">Tipo Persona</option>
                                <option value="3">Cantidad de Atenciones</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="txtAccion" id="txtAccion" value="">
            </form>
        </div>
        <div id="respuesta">
            
        </div>

        
        
    </body>
</html>

