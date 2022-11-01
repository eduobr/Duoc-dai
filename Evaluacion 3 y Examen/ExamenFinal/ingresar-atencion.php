<?php
include_once '/panel.php';
if (!isset($_SESSION["usuario"])) {
    echo '<script>location.href = "index.php";</script>';
}
if ($tipoUsuario != "Secretaria") {
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
        <div class="container">
            <center>
                <div class="row">
                    <div class="col-md-3"></div>
                    <form id="frmAtencion" method="post">
                        <div class="col-md-6 main">
                            <h1>Ingresar Atencion</h1>
                            <table class="table">
                                <tr>
                                    <td><label for="txtRutCli">Ingrese RUT del Cliente</label></td>
                                    <td><input type="text" class="form-control" name="txtRutCli" id="txtRutCli" placeholder="Ingrese RUT del Cliente" required></td>
                                    
                                </tr>
                                <tr>
                                    <td><label for="txtRutCli">Ingrese RUT del Abogado</label></td>
                                    <td><input type="text" class="form-control" name="txtRutAbo" id="txtRutAbo" placeholder="Inrese RUT del abogado"></td>
                                    
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" name="txtRutAte1" id="txtRutAte1" placeholder="Ingrese RUT del Cliente"></td>
                                    <td><input type="text" class="form-control" name="txtRutAte2" id="txtRutAte2" placeholder="Inrese RUT del abogado"></td>
                                </tr>
                                <tr>
                                    <td><label for="dtFecAtencion">Ingrese Fecha de la Atencion</label></td>
                                    <td>
                                        <input type="date" class="form-control" min="<?php date("Y-m-d") ?>"
                                               max="2017-12-31" name="dtFecAtencion" id="dtFecAtencion" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="tHoraAtencion">Ingrese la Hora de la Atencion</label>
                                    </td>
                                    <td>
                                        <input type=time" class="form-control" name="tHoraAtencion" id="tHoraAtencion" min="10:00" max="18:00" placeholder="hh:mm">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="cboEstado">Estado</label></td>
                                    <td>
                                        <select class="form-control" name="cboEstado" id="cboEstado">
                                            <option value="Agendada">Agendada</option>
                                            <option value="Confirmada">Confirmada</option>
                                            <option value="Anulada">Anulada</option>
                                            <option value="Perdida">Perdida</option>
                                            <option value="Realizada">Realizada</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="button" class="form-control btn btn-primary" name="btnIngresarAtencion" id="btnIngresarAtencion" value="Ingresar Atencion">
                                    </td>
                                </tr>
                            </table>
                            <input type="hidden" id="txtAccion" name="txtAccion" value="">
                        </div>
                    </form>
                    <div class="col-md-12" id="respuesta">

                    </div>
                </div>
            </center>
        </div>
    </body>
</html>
