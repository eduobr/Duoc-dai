<!DOCTYPE html>
<?php
if (isset($_GET["mensaje"])) {
    echo "<script>alert(" . $_GET["mensaje"] . ");location.href = 'ingresar-pelicula.php'</script>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ingresar Pelicula</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link href="css/estilo.css" rel="stylesheet">
        <script src="js/jquery-3.2.0.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/archivo_javascript.js"></script>
    </head>
    <body>
        <div id="usuario"></div>
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
                            <li><a href="ingresar-reserva.php">Ingresar Reserva</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div id="row">
                <form id="formularioPeli" method="post">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <table>
                            <tr>
                                <td>Titulo</td>
                                <td><input type="text" class="form-control" name="txtTitulo" value=""></td>
                            </tr>
                            <tr>
                                <td>Genero</td>
                                <td><input type="text" class="form-control" name="txtGenero" value=""></td>
                            </tr>
                            <tr>
                                <td>Categoria</td>
                                <td> 
                                    <SELECT NAME="cboCategoria" class="form-control"> 
                                        <OPTION VALUE="Todo Espectador">Todo Espectador</OPTION>
                                        <OPTION VALUE="Mayor de 14">Mayor de 14</OPTION>
                                    </SELECT>  
                                </td>
                            </tr>
                            <tr>
                                <td>Precio</td>
                                <td><input type="text" class="form-control" name="txtPrecio" value=""></td>
                            </tr>
                            <tr>
                                <td><input type="button" class="btn btn-primary" id="btnEnviarP" value="Enviar"></td>
                                <td><input type="reset"class="btn btn-warning" id="btnLimpiar" value="Limpiar"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table>
                            <tr>
                                <td>Eliminar</td>
                                <td><input type="text" class="form-control" name="txtCodigo" value=""></td>
                                <td><input type="button" class="btn btn-danger" id="btnEliminarP" value="Eliminar"/></td>
                            </tr>
                           
                            <tr>
                                <td>Listar</td>
                                <td><input type="button" class="btn btn-info" id="btnListarP" value="Listar"</td>
                            </tr>
                        </table>
                    </div>
            </div>
            <input type="hidden" id="txtAccionP" name="txtAccionP" value="">
            </form>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="respuesta">

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
