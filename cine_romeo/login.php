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
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form name="formulario">                       
                        <table class="table">
                            <tr>
                                <td>Usuario:</td>
                                <td><input type="text" id="txtUsuario" value=""></td>
                            </tr>
                            <tr>
                                <td>Contraseña:</td>
                                <td><input type="password" id="txtContrasena" value=""></td>
                            </tr>
                            <tr>
                                <td><input type="button" value="Enviar" onclick="validar()"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>
