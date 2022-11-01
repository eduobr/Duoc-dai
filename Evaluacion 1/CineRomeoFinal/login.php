<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
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
                    <li>
                        <a href="login.php">Ingresar</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form name="formulario">                       
                        <table class="table-condensed">
                            <h1>Ingreso de Usuario</h1>
                            <tr>
                                <td>Usuario:</td>
                                <td><input style="background-color: #222" type="text" id="txtUsuario" value=""></td>
                            </tr>
                            <tr>
                                <td>Contraseña:</td>
                                <td><input style="background-color: #222" type="password" id="txtContrasena" value=""></td>
                            </tr>
                            <tr>
                                <td><input type="button" class="btn btn-primary" value="Enviar" onclick="validar()"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>
