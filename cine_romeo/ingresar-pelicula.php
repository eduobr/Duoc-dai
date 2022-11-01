<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ingresar Pelicula</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/4-col-portfolio.css" rel="stylesheet">
        <style>
            body{background-color: #C7C7C7}
            input{margin: 3px}
            table{margin: 5px}
        </style>
    </head>
    <body>
        <script src="js/jquery-3.2.0.min.js"></script>
        <script src="js/archivo_javascript.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Cine Romeo</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="Cartelera.php">Cartelera</a>
                        </li>
                        <li>
                            <a href="Cines.php">Ubicacion</a>
                        </li>
                        <li>
                            <a href="about.php">Quienes somos</a>
                        </li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right ">
                        <li>
                            <a href="login.php" data-toggle="dropdown">Admin<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="ingresar-reserva.php">Ingresar Reserva</a></li>
                                </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
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
                                <td><input type="text" name="txtTitulo" value=""></td>
                            </tr>
                            <tr>
                                <td>Genero</td>
                                <td><input type="text" name="txtGenero" value=""></td>
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
                                <td><input type="text" name="txtPrecio" value=""></td>
                            </tr>
                            <tr>
                                <td><input type="button" id="btnEnviarP" value="Enviar"></td>
                                <td><input type="reset" id="btnLimpiar" value="Limpiar"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table>
                            <tr>
                                <td>Eliminar</td>
                                <td><input type="text" name="txtCodigo" value=""></td>
                                <td><input type="button" id="btnEliminarP" value="Eliminar"/></td>
                            </tr>
                           
                            <tr>
                                <td>Listar</td>
                                <td><input type="button" id="btnListarP" value="Listar"</td>
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
