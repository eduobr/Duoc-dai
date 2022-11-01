<!DOCTYPE html>
<?php
session_start();
$contador = 0;
$tipoUsuario = '';
if (isset($_SESSION["usuario"])) {
    $tipoUsuario=$_SESSION["usuario"]["tipoUsuario"];
    if ($tipoUsuario == "Empleado") {
        $conexion = new mysqli("localhost", "root", "", "tallerbicicleta");
        $rut = '';
        $regRut = $conexion->query("SELECT RUT FROM EMPLEADO WHERE USUARIO_USER='" . $_SESSION['usuario']['user'] . "'");
        while ($rowRut = mysqli_fetch_array($regRut)) {
            $rut = $rowRut[0];
        }
        $reg = $conexion->query("SELECT * FROM COTIZACION WHERE FECCOTIZACION<DATE_SUB(NOW(),INTERVAL 5 DAY) AND EMPLEADO_RUT='$rut' AND RESPUESTA IS NULL;");
        while ($row = mysqli_fetch_array($reg)) {
            $contador++;
        }
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <script src="js/main.js" type="text/javascript"></script>
    </head>
    <body>
        
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="img/taller.jpg">
                </div>
                <div class="col-md-5">
                    <?php if ($contador == 1 && $tipoUsuario == "Empleado") { ?>
                    <div class="alert alert-danger"><button class="close" data-dismiss="alert"><span>&times;</span></button>
                        <a href="listado-cotizaciones.php"><?php echo $contador ?> Cotizacion por responder que supera los 5 dias</a></div>
                    <?php } ?>
                    <?php if ($contador > 1 && $tipoUsuario == "Empleado") { ?>
                    <div class="alert alert-danger"><button class="close" data-dismiss="alert"><span>&times;</span></button>
                        <a href="listado-cotizaciones.php"><?php echo $contador ?> Cotizaciones por responder que supera los 5 dias</a></div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <!-- Barra de Navegacion -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Inicio</a>
                </div>
                <?php
                if (isset($_SESSION["usuario"])) {
                    $tipoUsuario = $_SESSION["usuario"]["tipoUsuario"];
                    if ($tipoUsuario == "Empleado" || $tipoUsuario == "Cliente") {
                        echo '<ul class="nav navbar-nav">';
                        echo '<li><a href="ingresar-producto.php">Ingresar Productos</a></li>';
                        echo '</ul>';
                    }

                    if ($tipoUsuario == "Empleado") {
                        echo '<ul class="nav navbar-nav">';
                        echo '<li><a href="#anticipo" data-toggle="modal">Pedir Anticipo</a></li>';
                        echo '</ul>';
                    }
                    if ($tipoUsuario == "Empleado") {
                        echo '<ul class="nav navbar-nav">';
                        echo '<li><a href="#renuncia" data-toggle="modal">Renunciar</a></li>';
                        echo '</ul>';
                    }
                    if ($tipoUsuario == "ADMIN") {
                        echo '<ul class="nav navbar-nav">';
                        echo '<li><a href="listado-empleados.php">Listado de Empleados</a></li>';
                        echo '</ul>';
                    }
                }
                ?>               
                <ul class="nav navbar-nav">
                    <li><a href="productos.php">Catalogo</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="bicicletas.php">Bicicletas</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="accesorios.php">Accesorios</a></li>
                </ul>
                <?php
                if (!isset($_SESSION["usuario"])) {
                    echo '<ul class = "nav navbar-nav">';
                    echo '<li><a href = "index.php#cotizacion">Cotizacion</a></li>';
                    echo '</ul>';
                }
                ?>
                <?php
                if ($tipoUsuario == "Cliente") {
                    echo '<ul class = "nav navbar-nav">';
                    echo '<li><a href = "productos-clientes.php">Productos Clientes</a></li>';
                    echo '</ul>';
                }
                ?>
                <?php
                if ($tipoUsuario == 'Cliente' || !isset($_SESSION["usuario"])) {
                    echo '<ul class="nav navbar-nav">';
                    echo '<li><a href="carrito-de-compras.php">Carrito de Compras</a></li>';
                    echo '</ul>';
                }

                if (isset($_SESSION["usuario"])) {
                    ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">Bienvenido<?php echo " " . $_SESSION["usuario"]["user"]; ?>
                                <?php if ($tipoUsuario != "ADMIN") { ?><span class="caret"></span> <?php } ?></a>
                                <?php
                                if ($tipoUsuario == "Empleado") {
                                    echo '<ul class="dropdown-menu">';
                                    echo '<li><a href="generar-liquidacion.php">Ver Liquidacion</a></li>';
                                    echo '<li><a href="listado-cotizaciones.php">Cotizaciones pendientes</a></li>';
                                    echo '</ul>';
                                }
                                if ($tipoUsuario == "Cliente") {
                                    echo '<ul class="dropdown-menu">';
                                    echo '<li><a href="mis-productos.php">Mis Productos</a></li>';
                                    echo '</ul>';
                                }
                                ?>
                        </li>
                        <li>
                            <a href="cerrar_sesion.php">Cerrar Sesion</a>
                        </li>
                    </ul>
                <?php } else { ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="login.php">Ingresar</a>
                        </li>
                        <li>
                            <a href="registro.php">Registrarse</a>
                        </li>
                    </ul>
                <?php } ?>
            </div>
            
        </nav>
        <!-- Barra de Navegacion -->
        <div class="container">
            <div class="modal fade" id="renuncia">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="frmRenuncia" action="proceso.php" method="post">
                            <div class="modal-header">
                                <h4 class="modal-title">¿Esta seguro que desea renunciar?</h4>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="txtUsuario" value="<?php echo $_SESSION["usuario"]["user"] ?>">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger" name="btnRenunciar">Renunciar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="modal fade" id="anticipo">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="frmAnticipo" method="post">
                            <div class="modal-header">
                                <h4 class="modal-title">Cual es el monto a pedir para el anticipo?</h4>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="txtUsuario" value="<?php echo $_SESSION["usuario"]["user"] ?>">
                                <input type="text" name="txtAnticipo" value="">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" id="btnAnticipo" name="btnAnticipo">Pedir Anticipo</button>
                                <input type="hidden" id="txtAccion" name="txtAccion" value="">
                                <div id="respuesta"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
