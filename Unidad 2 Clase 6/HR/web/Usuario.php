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
        <script>
            function validaPass() {
                var p1 = document.getElementById("txtP1").value;
                var p2 = document.getElementById("txtP2").value;
                if (p1 == p2) {
                    return true;
                } else {
                    alert('contraseñas incorrectas');
                    return false;
                }
            }
        </script>
        <div>
            <form action="procesoUsuario.php" method="post" onsubmit="return validaPass()">
                <table border="1">
                    <tr>
                        <td colspan="2">Formulario Ingreso de Usuario</td>
                    </tr>
                    <tr>
                        <td>Usuario:</td>
                        <td> <input type="text" name="txtUsuario"> </td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td> <input type="password" name="txtPass1" id="txtP1" </td>
                    </tr>
                    <tr>
                        <td>Ingrese nuevamente la Password:</td>
                        <td> <input type="password" name="txtPass2" id="txtP2" ></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Grabar">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
