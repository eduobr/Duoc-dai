<!DOCTYPE html>
<?php
include_once '/panel.php';
if ($_SESSION["usuario"]["tipoUsuario"]!="Cliente") {
    echo '<script>location.href="index.php"</script>';
}
if (isset($_GET["mensaje"])) {
    echo "<script>alert(" . $_GET["mensaje"] . ");location.href='mis-productos.php'</script>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $conexion = new mysqli("localhost", "root", "", "tallerbicicleta");
        $reg = $conexion->query("SELECT RUT FROM CLIENTE WHERE USUARIO_USER='".$_SESSION["usuario"]["user"]."';");
        $rut;
        while ($row = mysqli_fetch_array($reg)) {
            $rut=$row[0];
        }
        $reg2 = $conexion->query("SELECT * FROM PRODUCTO WHERE CLIENTE_RUT='".$rut."' AND DARBAJA='NO';");
        ?>
        <div class="container">
            <h1>Mis Productos</h1>
            <div class="row">
                <?php
                if ($reg2->num_rows > 0) {
                    while ($rowP = mysqli_fetch_array($reg2)) {
                        ?>
                        <div class="col-md-3" >
                            <table class="table table-condensed">
                                <tr>
                                    <td><img src="img/<?php echo $rowP[11]; ?>" width="200" height="150" style="margin-left: 8%;"></td>
                                </tr>
                                <tr>
                                    <td>Nombre:<?php echo $rowP[1]; ?></td>
                                </tr>
                                <tr>
                                    <td><?php
                                        if ($row[8] > 0) {
                                            echo 'Dscto:' . $rowP[8] . '%';
                                            ?>
                                            Precio final:$<?php echo $rowP[6] - ($rowP[6] * ($rowP[8] / 100)); ?>
                                            <?php
                                        } else {
                                            echo 'Precio:$' . $rowP[6];
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                if ($tipoUsuario == "Cliente" || !isset($_SESSION["usuario"])) {
                                    ?>
                                    <tr>
                                        <td><button href="#detalle<?php echo $rowP[0]; ?>" class="btn btn-warning form-control" data-toggle="modal">Especificaiones</button> </td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td><button href="#darBaja<?php echo $rowP[0];?>" class="btn btn-danger form-control" data-toggle="modal">Dar de Baja</button></td>
                                    </tr>
            <!--<td><a class="btn btn btn-primary form-control" role="button" href="carrito-de-compras.php?id=<?php echo $row[0] ?>">Agregar al Carrito</a></td>-->
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <div class="container">
                                <div class="modal fade" id="detalle<?php echo $rowP[0]; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Detalles del Producto</h4>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-condensed" style="text-align: center; color: #2394D5" >
                                                    <tr>
                                                        <td><img src="img/<?php echo $rowP[11]; ?>" width="200" height="150" style="margin-left: 0%;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nombre:<?php echo $rowP[1]; ?></td>
                                                    </tr>
                                                    <?php if ($row[2] != '') { ?>
                                                        <tr>
                                                            <td>Tipo Bicicleta:<?php echo $rowP[2]; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    if ($rowP[3] != '') {
                                                        ?>
                                                        <tr>
                                                            <td>Aro:<?php echo $rowP[3]; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td>Marca:<?php echo $rowP[4]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Modelo:<?php echo $rowP[5]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Precio:$<?php echo $rowP[6]; ?></td>
                                                    </tr>
                                                    <?php
                                                    if ($rowP[8] > 0) {
                                                        ?>
                                                        <tr>
                                                            <td>Descuento:<?php echo $rowP[8]; ?>%</td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td>Stock:<?php echo $rowP[9]; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container" style="text-align: center;">
                                <div class="modal fade" id="darBaja<?php echo $rowP[0];?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form id="frmDarBaja" action="proceso.php" method="post">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Esta seguro que desea dar de Baja el Producto?</h4>
                                                </div>
                                                <div class="modal-footer"> 
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-danger" id="btnDarBaja" name="btnDarBaja" style="margin-right: 35%">Dar de Baja</button>
                                                    <input type="hidden" id="txtDarBaja" name="txtDarBaja" value="<?php echo $rowP[0] ?>">
                                                    <input type="hidden" id="txtUrl" name="txtUrl" value="mis-productos.php">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<h1>No Tiene Productos<h1>';
                }
                ?>
            </div>
        </div>
    </body>
</html>
