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
        <link rel="stylesheet" type="text/css" href="css/4-col-portfolio.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">

        <!-- Custom CSS -->

    </head>
    <body>
        <script src="js/jquery-3.2.0.min.js"></script>
        <script src="js/archivo_javascript.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            function validar() {
                var usuario = document.getElementById("txtUsuario").value;
                var contrasena = document.getElementById("txtContrasena").value;
                if (usuario == "admin" && contrasena == "admin") {
                    location.href="ingresar-reserva.php";
                }else{
                    alert('usuario o contraseña incorrecto');
                }
                
            }
        </script>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                
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
                        <a href="login.php">ENTRAR</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
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
