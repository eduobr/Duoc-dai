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
                p1 = document.getElementById("txtP1").value;
                p2 = document.getElementById("txtP2").value;
                if (p1 == p2) {
                    return true;
                } else {
                    alert("Contraseñas incorrectas");
                    return false;
                }
            }
        </script>
        <div>
            <form action="grabar.php" method="post" onsubmit="return validaPass()">
                <table border="1">
                    <tr>
                        <td colspan="2">Formulario de Ingreso Password</td>
                    </tr>
                    <tr>
                        <td>Nombre de Usuario</td>
                        <td><input type="text" name="txtU" id="txtU"></td>
                    </tr>
                    <tr>
                        <td>Ingrese Pssword:</td>
                        <td><input type="password" name="txtP1" id="txtP1"></td>
                    </tr>
                    <tr>
                        <td>Ingrese nuevamente Password:</td>
                        <td><input type="password" name="txtP2" id="txtP2"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Grabar"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
