<!DOCTYPE html>
<?php
include_once '/panel.php';
if (isset($_GET["mensaje"])) {
    echo "<script>alert(" . $_GET["mensaje"] . ");location.href='productos.php'</script>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Productos</title>
    </head>
    <body>
        <?php
        $conexion = new mysqli("localhost", "root", "", "tallerbicicleta");
        $reg = $conexion->query("SELECT * FROM PRODUCTO WHERE CLIENTE_RUT IS NULL AND DARBAJA='NO';");
        ?>
        <div class="container">
            <h1>Catalogo</h1>
            <div class="row">
                <?php
                if ($reg->num_rows > 0) {
                    while ($row = mysqli_fetch_array($reg)) {
                        ?>
                        <div class="col-md-3" >
                            <table class="table table-condensed">
                                <tr>
                                    <td><img src="img/<?php echo $row[11]; ?>" width="200" height="150" style="margin-left: 8%;"></td>
                                </tr>
                                <tr>
                                    <td>Nombre:<?php echo $row[1]; ?></td>
                                </tr>
                                <tr>
                                    <td><?php
                                        if ($row[8] > 0) {
                                            echo 'Dscto:' . $row[8] . '%';
                                            ?>
                                            Precio final:$<?php echo $row[6] - ($row[6] * ($row[8] / 100)); ?>
                                            <?php
                                        } else {
                                            echo 'Precio:$' . $row[6];
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php if ($tipoUsuario == "Empleado") { ?>
                                    <tr>
                                        <td><button href="#darBaja<?php echo $row[0];?>" class="btn btn-danger form-control" data-toggle="modal">Dar de Baja</button></td>
                                    </tr>
                                    <?php
                                }
                                if ($tipoUsuario == "Cliente" || !isset($_SESSION["usuario"])) {
                                    ?>
                                    <tr>
                                        <td><button href="#detalle<?php echo $row[0]; ?>" class="btn btn-warning form-control" data-toggle="modal">Especificaiones</button> </td>
                                    </tr>
                                    <tr>                                   
                                        <td><a type="button" class="form-control btn-primary" href="carrito-de-compras.php?id=<?php echo $row[0]; ?>" class="form-control">Agregar al carrito</a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <div class="container">
                                <div class="modal fade" id="detalle<?php echo $row[0]; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Detalles del Producto</h4>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-condensed" style="text-align: center; color: #2394D5" >
                                                    <tr>
                                                        <td><img src="img/<?php echo $row[11]; ?>" width="200" height="150" style="margin-left: 0%;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nombre:<?php echo $row[1]; ?></td>
                                                    </tr>
                                                    <?php if ($row[2] != '') { ?>
                                                        <tr>
                                                            <td>Tipo Bicicleta:<?php echo $row[2]; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    if ($row[3] != '') {
                                                        ?>
                                                        <tr>
                                                            <td>Aro:<?php echo $row[3]; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td>Marca:<?php echo $row[4]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Modelo:<?php echo $row[5]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Precio:$<?php echo $row[6]; ?></td>
                                                    </tr>
                                                    <?php
                                                    if ($row[8] > 0) {
                                                        ?>
                                                        <tr>
                                                            <td>Descuento:<?php echo $row[8]; ?>%</td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td>Stock:<?php echo $row[9]; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container" style="text-align: center;">
                                <div class="modal fade" id="darBaja<?php echo $row[0];?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form id="frmDarBaja" action="proceso.php" method="post">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Esta seguro que desea dar de Baja el Producto?</h4>
                                                </div>
                                                <div class="modal-footer"> 
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-danger" id="btnDarBaja" name="btnDarBaja" style="margin-right: 35%">Dar de Baja</button>
                                                    <input type="hidden" id="txtDarBaja" name="txtDarBaja" value="<?php echo $row[0] ?>">
                                                    <input type="hidden" id="txtUrl" name="txtUrl" value="productos.php">
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
                    echo '<h1>No hay Productos<h1>';
                }
                ?>
            </div>
        </div>
    </body>
</html>
