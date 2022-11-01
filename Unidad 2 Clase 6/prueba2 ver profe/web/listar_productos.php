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
        <?php
        $conexion = new mysqli("localhost", "root", "", "prueba2");
        $reg = $conexion->query("select * from productos;");
        ?>
        <table>
            <?php
            while ($row = mysqli_fetch_array($reg)) {
                ?>
            <form method="post" action="carrito_de_compras.php">
                    <tr>
                        <td><img src="../img/<?php echo $row[4]; ?>" width="50" height="50">  </td>
                        <td>Desc: <?php echo $row[1]; ?></td>    
                        <td>Precio: <?php echo $row[2]; ?></td>
                        <td>Stock: <?php echo $row[3]; ?></td>
                        <td>
                            <input type="hidden" name="txtId" value="<?php echo $row[0]; ?>">
                            <input type="submit" value="Agregar">
                        </td>
                    </tr>
                </form>
            <?php } ?>
        </table>
        <a href="formulario_productos.php">Carga Producto</a>
        <a href="borrar_carrito.php">Borrar Carro de Compras</a>
    </body>
</html>
