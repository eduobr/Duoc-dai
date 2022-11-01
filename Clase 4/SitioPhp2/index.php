<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <script src="jquery-3.2.0.min.js"></script>
        <script>
            $(document).ready(function (event) {
                $("#btnEnviar").click(function () {
                    alert('ok');
                });
            });
        </script>
        <form action="proceso.php" method="post">
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="2">Formulario de Datos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Codigo:</td>
                        <td> <input type="text" name="txtCodigo" value="" /> </td>
                    </tr>
                    <tr>
                        <td>Nombre:</td>
                        <td> <input type="text" name="txtNombre" value="" /> </td>
                    </tr>
                    <tr>
                        <td>Apellido:</td>
                        <td> <input type="text" name="txtApellido" value="" /> </td>
                    </tr>
                    <tr>
                        <td>Edad:</td>
                        <td> <input type="text" name="txtEdad" value="" /> </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="button" value="Enviar" id="btnEnviar"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
