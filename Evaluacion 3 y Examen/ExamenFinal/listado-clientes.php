<?php
include_once '/panel.php';
if (!isset($_SESSION["usuario"])) {
    echo '<script>location.href = "index.php";</script>';
}
if (isset($_GET["mensaje"])) {
    echo "<script>alert(" . $_GET["mensaje"] . ");location.href = 'listado-clientes.php'</script>";
}
if ($tipoUsuario=="Cliente") {
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
                    <label for="txtBusqueda">Buscar</label>
                    <center><input type="text" class="form-control" name="txtBusqueda" id="txtBusqueda"></center>
                    <input type="hidden" name="txtBuscar" id="txtBuscar" value="">
                </form>
                <form id="frmListarCli">
<!--                    <input type="button" class="form-control" name="btnListarCli" id="btnListarCli" value="Listar Clientes">-->
                    <input type="hidden" name="txtAccion" id="txtAccion" value="">
                </form>
            </div>
        </div>
        <div class="col-md-12" id="respuesta">

        </div>
    </body>
</html>
