<!DOCTYPE html>
i<?php
include_once '/panel.php';
if (isset($_GET["mensaje"])) {
    echo "<script>alert(" . $_GET["mensaje"] . ");location.href = 'listado-cotizaciones.php'</script>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Respuesta Cotizacion</title>
    </head>
    <body>
        <div class="col-md-8">
            <table class="table table-bordered">
                <tr>
                    <td>Nombre</td>
                    <td><?php echo $_GET["nombre"]; ?></td>
                </tr>
                <tr>
                    <td><?php echo $_GET["tipoCot"]; ?></td>
                    <td>Tipo Cotizacion</td>
                </tr>
                <tr>
                    <td>Descripcion</td>
                    <td><?php echo $_GET["desc"]; ?></td>
                </tr>
                <tr>
                    <td>Fecha</td>
                    <td><?php echo $_GET["fecha"]; ?></td>
                </tr>
            </table>
        </div>
        <div class="col-md-4">
            <form id="frmResponder" action="proceso.php" method="post">
                <label for="txtRespuesta">Respuesta</label>
                <textarea class="form-control" id="txtRespuesta" name="txtRespuesta"></textarea>
                <input type="submit" class="btn btn-primary" name="btnRespuestaCot" value="responder">
                <input type="hidden" name="txtId" value="<?php echo $_GET["id"] ?>">
            </form>
        </div>
    </body>
</html>
