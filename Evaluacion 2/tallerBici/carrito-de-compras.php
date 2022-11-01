<!DOCTYPE html>
<?php
include_once '/panel.php';
if ($tipoUsuario == 'Empleado' || $tipoUsuario == 'ADMIN') {
    echo '<script>location.href = "index.php";</script>';
}
$conexion = new mysqli("localhost", "root", "", "tallerbicicleta");
if (isset($_SESSION["carrito"])) {
    if (isset($_GET["id"])) {

        $arreglo = $_SESSION["carrito"];
        $encontro = false;
        $numero = 0;
        for ($i = 0; $i < count($arreglo); $i++) {
            if ($arreglo[$i]['Id'] == $_GET['id']) {
                $encontro = true;
                $numero = $i;
            }
        }
        if ($encontro == true) {
            $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + 1;
            $_SESSION["carrito"] = $arreglo;
        } else {
            $nombre = "";
            $precio = 0;
            $imagen = "";
            $reg = $conexion->query("select * from producto where idProducto='" . $_GET["id"] . "'");
            while ($row = mysqli_fetch_array($reg)) {
                $nombre = $row[1];
                $precio = $row[6];
                $imagen = $row[11];
            }
            $datosNuevos = array('Id' => $_GET['id'],
                'Nombre' => $nombre,
                'Precio' => $precio,
                'Imagen' => $imagen,
                'Cantidad' => 1);
            array_push($arreglo, $datosNuevos);
            $_SESSION["carrito"] = $arreglo;
        }
    }
} else {
    if (isset($_GET["id"])) {
        $nombre = "";
        $precio = 0;
        $imagen = "";
        $reg = $conexion->query("select * from producto where idProducto='" . $_GET["id"] . "'");
        while ($row = mysqli_fetch_array($reg)) {
            $nombre = $row[1];
            $precio = $row[6];
            $imagen = $row[11];
        }
        $arreglo[] = array('Id' => $_GET['id'],
            'Nombre' => $nombre,
            'Precio' => $precio,
            'Imagen' => $imagen,
            'Cantidad' => 1);
        $_SESSION["carrito"] = $arreglo;
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Carrito de Compras</title>
    </head>
    <body>
        <?php
        $total = 0;
        if (isset($_SESSION["carrito"])) {
            $datos = $_SESSION["carrito"];
            echo '<div class = "container">';
            echo '<div class = "row">';
            for ($i = 0; $i < count($datos); $i++) {
                ?>
                <div class="col-md-3">
                    <table>
                        <tr>
                            <td><img src="img/<?php echo $datos[$i]['Imagen']; ?>" width="100" height="100"></td>
                        </tr>
                        <tr>
                            <td>Nombre:<?php echo $datos[$i]['Nombre']; ?></td>
                        </tr>
                        <tr>
                            <td>Precio:<?php echo $datos[$i]['Precio']; ?></td>
                        </tr>
                        <tr>
                            <td>Cantidad<input type="text" value="<?php echo $datos[$i]['Cantidad']; ?>"</td>
                        </tr>
                        <tr>
                            <td>Subtotal:<?php echo $datos[$i]['Cantidad'] * $datos[$i]["Precio"]; ?></td>
                        </tr>
                    </table>

                </div>
                <?php
                $total = ($datos[$i]['Cantidad'] * $datos[$i]["Precio"]) + $total;
            }
            ?>
        </div>
        <form method="post" action="carrito-de-compras.php">
            <center><input type="submit" name="btnGuardarPedido" value="Guardar Pedido"></center>
        </form>
        <br>
        <form method="post" action="borrar_carrito.php">
            <center><input type="submit" name="btnBorrarCarrito" value="Borrar Carrito"></center>
        </form>
    </div>
    <?php
    $iva = $total * 0.19;
    $precNeto = $total + $iva;
    if (isset($_POST["btnGuardarPedido"])) {
        echo $iva . "<br>";
        echo $precNeto;
        echo $datos[0]['Nombre'];
        $graboVenta = false;
        if ($_SESSION["usuario"]["tipoUsuario"] == "Cliente") {
            $usuario = $_SESSION["usuario"]["user"];
            $rutCli = "select rut from cliente where usuario_user='$usuario'";
            $resp = $conexion->query($rutCli);
            $rut = '';
            while ($rowRut = mysqli_fetch_array($resp)) {
                $rut = $rowRut[0];
            }
            $sql = "insert into venta values(null,$iva,$precNeto,'$rut')";
            $reg = $conexion->query($sql);
            if ($reg > 0) {
                echo '<script>alert("Grabo venta")<script>';
            } else {
                echo '<script>alert("No Grabo venta")<script>';
            }
            $graboVenta = true;
        }
        if (isset($_SESSION["usuario"])) {
            $sql = "insert into venta values(null,$iva,$precNeto,null)";
            $reg = $conexion->query($sql);
            if ($reg > 0) {
                echo '<script>alert("Grabo venta")</script>';
            } else {
                echo '<script>alert("No Grabo venta")</script>';
            }
            if ($reg > 0) {
                echo '<script>alert("Grabo venta")<script>';
            } else {
                echo '<script>alert("No Grabo venta")<script>';
            }
            $graboVenta = true;
        }


//                if ($graboVenta == true) {
//                    for ($i = 0; $i < count($datos); $i++) {
//                        $sql="insert into detalle_venta values()";
//                    }
//                }
    }
} else {
    echo '<center><h2>El carrito esta vacio</h2></center>';
}
echo '<center><h2>Total: ' . $total . '</></center>';
?>
</body>
</html>

