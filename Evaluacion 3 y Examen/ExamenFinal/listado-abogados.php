<?php
include_once '/panel.php';
if (!isset($_SESSION["usuario"])) {
    echo '<script>location.href = "index.php";</script>';
}
if (isset($_GET["mensaje"])) {
    echo "<script>alert(" . $_GET["mensaje"] . ");location.href = 'listado-abogados.php'</script>";
}
if ($tipoUsuario == "Cliente") {
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
                    <label for="txtBusquedaAbo">Buscar</label>
                    <center><input type="text" class="form-control" name="txtBusquedaAbo" id="txtBusquedaAbo"></center>
                    <input type="hidden" name="txtBuscar" id="txtBuscar" value="">
                </form>
                <form id="frmListarAbo">
                    <!--<input type="button" class="form-control" name="btnListarAbo" id="btnListarAbo" value="Listar Abogados">-->
                    <input type="hidden" name="txtAccion" id="txtAccion" value="">
                </form>
                <div class="col-md-12" id="respuesta">

                </div>
            </div>
        </div>
    </body>
</html>
