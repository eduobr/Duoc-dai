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
        <form action="proceso.php" method="post">
            <table border="1">
                <tr>
                    <td colspan="2">Formulario de Inscripcion</td>
                </tr>
                <tr>
                    <td>Rut:</td>
                    <td> <input type="text" name="txtRut" value="" /> </td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td> <input type="text" name="txtNombre" value="" /> </td>
                </tr>
                <tr>
                    <td>Edad:</td>
                    <td> <input type="text" name="txtEdad" value="" /> </td>
                </tr>
                <tr>
                    <td>Mensaje:</td>
                    <td> <textarea name="txtMensaje" rows="4" cols="20">
                        </textarea> </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Enviar" name="btnAccion"/>
                        <input type="reset" value="Limpiar" />
                        <input type="submit" value="Eliminar" name="btnAccion" />
                        <input type="submit" value="Listar" name="btnAccion" />
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
