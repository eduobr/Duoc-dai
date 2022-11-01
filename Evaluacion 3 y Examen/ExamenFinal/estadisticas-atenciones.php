<?php
include_once '/panel.php';
if (!isset($_SESSION["usuario"])) {
    echo '<script>location.href = "index.php";</script>';
}
if ($tipoUsuario != "Gerente") {
    echo '<script>location.href = "index.php";</script>';
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Highcharts Example</title>

        <style type="text/css">
            #container {
                height: 400px; 
                min-width: 310px; 
                max-width: 800px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <script src="Highcharts-5.0.12/code/highcharts.js"></script>
        <script src="Highcharts-5.0.12/code/highcharts-3d.js"></script>
        <script src="Highcharts-5.0.12/code/modules/exporting.js"></script>
        <div class="container">
            <form id="frmEstadisticasAte">
                <table class="table">
                    <tr>
                        <td>Seleccione estadisticas</td>
                        <td>
                            <select class="form-control" name="cboEstadisticasAte" id="cboEstadisticasAte">
                                <option value="0">Seleccione</option>
                                <option value="1">Rango de Fechas</option>
                                <option value="2">Meses</option>
                                <option value="3">Especialidad</option>
                                <option value="4">Abogado</option>
                                <option value="5">Estado</option>
                            </select>
                        </td>
                        <td>
                            <input type="date" class="form-control" min="<?php date("Y-m-d") ?>"
                                               max="2017-12-31" name="dtFecEst1" id="dtFecEst1" required>
                        </td>
                        <td>
                            <input type="date" class="form-control" min="<?php date("Y-m-d") ?>"
                                               max="2017-12-31" name="dtFecEst2" id="dtFecEst2" required>
                        </td>
                        <td>
                            <input type="button" class="btn btn-default" name="btnFecha" id="btnFecha" value="Rango de fechas">
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