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
            <table border="1">
                <tr>
                    <td>Formulario ingreso Pelicula</td>
                </tr>
                <tr>
                    <td>Titulo:</td>
                    <td>Genero:</td>
                    <td>Comentario Pelicula</td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="titulo" value="" />
                    </td>
                    <td>
                        <input type="text" name="genero" value="" />
                    </td>
                    <td>
                        <input type="text" name="comentario" value="" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Enviar" />
                    </td>
                </tr>
            </table>
        </div>
        <a href="{{url('menu')}}">Volver</a>
    </body>
</html>
