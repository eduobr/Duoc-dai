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
        <form method="post" action="subir_productos.php" enctype="multipart/form-data">
            <table border="1">
                <tr>
                    <td colspan="2">Formulario cargar productos</td>
                </tr>
                <tr>
                    <td>Descripcion</td>
                    <td> <input type="text" name="txtDesc" required> </td>
                </tr>
                <tr>
                    <td>Precio</td>
                    <td><input type="number" name="txtPrecio" required> </td>
                </tr>
                <tr>
                    <td>Stock</td>
                    <td><input type="number" name="txtStock" required> </td>
                </tr>
                <tr>
                    <td>Fotografia</td>
                    <td><input type="file" name="filFoto" required accept=".jpg, .gif, .jpeg"> </td>
                    <td><input type="submit" value="Grabar"></td>
                </tr>
            </table>

        </form>
    </body>
</html>
