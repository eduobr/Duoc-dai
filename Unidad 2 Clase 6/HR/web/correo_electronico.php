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
        <div>
            <form method="post" action="envio_correo.php">
                <table border="1">
                    <tr>
                        <td colspan="2">Formulario Envio Correo Electronico</td>
                    </tr>
                    <tr>
                        <td>Destinatario:</td>
                        <td>
                            <input type="email" name="txtDestinatario"
                                   required>
                        </td>
                    </tr>
                    <tr>
                        <td>Origen:</td>
                        <td>
                            <input type="email" name="txtOrigen" required
                                   value="juan@yo.com">
                        </td>
                    </tr>
                    <tr>
                        <td>Asunto:</td>
                        <td>
                            <input type="text" name="txtAsunto">
                        </td>
                    </tr>
                    <tr>
                        <td>Mensaje:</td>
                        <td>
                            <textarea name="txtMensaje" rows="10"
                                      cols="40"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Enviar">                                
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
