<?php
include_once '/panel.php';
if (!isset($_SESSION["usuario"])) {
    echo '<script>location.href = "index.php";</script>';
}
if (isset($_GET["mensaje"])) {
    echo "<script>alert(" . $_GET["mensaje"] . ");location.href = 'listado-atenciones.php'</script>";
}
if ($tipoUsuario!="Gerente" && $tipoUsuario!="Secretaria") {
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
            <div class="row">
                <form id="frmBuscar">
                    <label for="txtBusquedaAte">Buscar</label>
                    <center><input type="text" class="form-control" name="txtBusquedaAte" id="txtBusquedaAte"></center>
                    <input type="hidden" name="txtBuscar" id="txtBuscar" value="">
                </form>
                <form id="frmListarAte">
                    <!--<input type="button" class="form-control" name="btnListarAte" id="btnListarAte" value="Listar Atenciones">-->
                    <input type="hidden" name="txtAccion" id="txtAccion" value="">
                </form>
                <div class="col-md-12" id="respuesta">

                </div>
            </div>
        </div>
    </body>
</html>
