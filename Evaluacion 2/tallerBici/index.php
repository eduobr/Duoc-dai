<?php
include_once '/panel.php';
if (isset($_GET["mensaje"])) {
    echo "<script>alert(" . $_GET["mensaje"] . ");location.href='index.php'</script>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio</title>
    </head>
    <body>
        <?php
        $conexion = new mysqli("localhost", "root", "", "tallerbicicleta");
        $reg = $conexion->query("SELECT * FROM PRODUCTO WHERE CLIENTE_RUT IS NULL AND DARBAJA='NO' ORDER BY IDPRODUCTO DESC LIMIT 12;");
        ?>
        <div class="container">
            <h1>Nuestros Productos</h1>
            <div id="myCarousel" class="carousel slide" data-ride="carousel" >
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <center><img src="img/p1.jpg" alt="Candado" width="400" height="400"></center>
                        <div class="carousel-caption">
                            <h3 style="">Los mejor en Seguridad </h3>
                            
                        </div>
                    </div>

                    <div class="item">
                        <center><img src="img/bik4.jpg" alt="bici" width="400" height="400"></center>
                        <div class="carousel-caption">
                            <h3 style="">Tenemos de todos los tipos de bicicleta</h3>
                           
                        </div>
                    </div>

                    <div class="item">
                        <center><img src="img/botella2.jpg" alt="botella" width="400" height="400"></center>
                        <div class="carousel-caption">
                            <h3 style="">Hidratarse es importante</h3>
                        </div>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <hr>
            <div class="row">
                <?php
                if ($reg->num_rows > 0) {
                    while ($row = mysqli_fetch_array($reg)) {
                        ?>
                        <div class="col-md-3" >
                            <table class="table table-condensed centro">
                                <tr>
                                    <td><img class="thumbnail" src="img/<?php echo $row[11]; ?>" width="200" height="150" style="margin-left: 8%;"></td>
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
                                        <td><button href="#darBaja<?php echo $row[0]; ?>" class="btn btn-danger form-control" data-toggle="modal">Dar de Baja</button></td>
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
                        <!--<td><a class="btn btn btn-primary form-control" role="button" href="carrito-de-compras.php?id=<?php echo $row[0] ?>">Agregar al Carrito</a></td>-->
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
                                <div class="modal fade" id="darBaja<?php echo $row[0]; ?>">
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
                                                    <input type="hidden" id="txtUrl" name="txtUrl" value="index.php">
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
        <!-- Footer -->
        <?php if (!isset($_SESSION["usuario"])) { ?>
            <footer>
                <div id="cotizacion" class="container">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <form id="frmCotizacion" method="post">
                                <h1>Cotizacion</h1>
                                <div class="form-group">
                                    <label for="txtNombre">Nombre</label>
                                    <input type="text" class="form-control" id="txtNombre" name="txtNombre" required>
                                </div>
                                <label for="txtApellido">Apellido</label>
                                <input type="text" class="form-control" id="txtApellido" name="txtApellido" required>
                                <label for="cboTipoCot">Tipo Cotizacion</label>
                                <select class="form-control" id="cboTipoCot" name="cboTipoCot">
                                    <option value="Reparacion de Bicicleta">Reparacion de Bicicleta</option>
                                    <option value="Compra de Bicicleta">Compra de Bicicleta</option>
                                </select>
                                <label for="txtDescripcion">Descripcion</label>
                                <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" required></textarea>
                                <input type="button" class="btn btn-primary" name="btnEnviarCot" id="btnEnviarCot" value="Enviar">
                                <input type="hidden" id="txtAccionCot" name="txtAccionCot" value="">
                            </form>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <div class="col-md-4" id="respuestaCot">

                    </div>
                </div>
            </footer>
        <?php } ?>
        <!-- Footer -->
    </body>
</html>
