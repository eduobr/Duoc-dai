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
            <form method="post" action="subir_productos.php" enctype="multipart/form-data">
                <table border="1">
                    <tr>
                        <td colspan="2">Formulario Cargar de Productos</td>
                    </tr>
                    <tr>
                        <td>Descripcion:</td>
                        <td>
                            <input type="text"
                                   required name="txtDesc">
                        </td>
                    </tr>
                    <tr>
                        <td>Precio:</td>
                        <td>
                            <input type="number" required
                                   name="txtPrecio">
                        </td>
                    </tr>
                    <tr>
                        <td>Stock:</td>
                        <td>
                            <input type="number" required
                                   name="txtStock">
                        </td>
                    </tr>
                    <tr>
                        <td>Fotografia:</td>
                        <td>
                            <input type="file" required 
                                   accept=".jpg, .gif, .jpeg"
                                   name="filFoto">
                            <input type="submit" value="Grabar">
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </body>
</html>
