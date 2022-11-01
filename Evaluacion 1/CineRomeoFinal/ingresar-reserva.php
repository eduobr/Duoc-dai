<!DOCTYPE html>
<?php
if (isset($_GET["mensaje"])) {
    echo "<script>alert(" . $_GET["mensaje"] . ");location.href = 'ingresar-reserva.php'</script>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ingresar Reserva</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link href="css/estilo.css" rel="stylesheet">
        <script src="js/jquery-3.2.0.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/archivo_javascript.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Cine Romeo</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="Cartelera.php">Cartelera</a></li>
                    <li><a href="Cines.php">Ubicacion</a></li>
                    <li><a href="about.php">Quienes Somos</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="login.php">Admin
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="ingresar-pelicula.php">Ingresar Pelicula</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</nav>
<div class="container">
    <div class="row">
        <form id="formulario" method="post">
            <div class="col-md-4">
                <table>
                    <tr>
                        <td>Rut</td>
                        <td><input class="form-control" type="text" name="txtRut" value=""></td>
                    </tr>
                    <tr>
                        <td>Fono</td>
                        <td><input class="form-control" type="text" name="txtFono" value=""/></td>
                    </tr>
                    <tr>
                        <td>Sala</td>
                        <td><input class="form-control" type="text" name="txtSala" value=""/></td>
                    </tr>
                    <tr>
                        <td>Pelicula</td>
                        <td>
                            <?php
                            $link = mysqli_connect("localhost", "root", "", "cine");
                            echo"<select id=cboPelicula class=form-control name=cboPelicula>";

                            $sql = "SELECT codigo,titulo FROM pelicula";
                            $result = mysqli_query($link, $sql);
                            $i = 1;
                            $j = 0;
                            while ($row = mysqli_fetch_row($result)) {
                                echo "<option value=" . $row[$j] . ">" . $row[$i] . "</option>\n";
                            }
                            echo "</select>";
                            ?> 
                        </td>
                    </tr>
                    <tr>
                        <td>Adultos</td>
                        <td><input type="text" class="form-control" id="txtAdultos" name="txtAdultos" value=""/></td>
                    </tr>
                    <tr>
                        <td>Niños</td>
                        <td><input type="text" class="form-control" id="txtNinos" name="txtNinos" value=""/></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td id="total"></td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td><input type="button" class="btn btn-primary" id="btnEnviar" value="Enviar"/>
                            <input type="reset" class="btn btn-warning" id="btnLimpiar" value="Limpiar"/></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4">
                <table>
                    <tr>
                        <td>Codigo:</td>
                        <td><input type="text" class="form-control" name="txtCodigo" value=""/></td>
                        <td><input type="button"  class="btn btn-danger" id="btnEliminar" value="Eliminar"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">Listar Reservas</td>
                        <td><input type="button" class="btn btn-info" id="btnListar" value="Listar"</td>
                    </tr>
                    <tr>
                        <td colspan="2">Escriba el titulo de la pelicula</td>
                        <td> <input type="text" class="form-control" name="txtTitulo" value=""> </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td><input type="button" class="btn btn-info" id="btnPorPeliculas" value="ListarPorPeliculas"/></td>
                    </tr>
                </table>
                <input type="hidden" id="txtAccion" name="txtAccion">
                </form>
            </div>
    </div>
</div>
<div class="container">
    <div id="row">
        <div class="col-md-12" id="respuesta">

        </div>
    </div>
</div>
</body>
</html>
