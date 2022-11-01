<?php
include_once '/panel.php';
if (!isset($_SESSION["usuario"])) {
    echo '<script>location.href = "index.php";</script>';
}
if (isset($_GET["mensaje"])) {
    echo "<script>alert(" . $_GET["mensaje"] . ");location.href = 'ingresar-producto.php'</script>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <form id="frmIngresarProd" method="post" enctype="multipart/form-data" action="proceso.php">
                        <h3>Ingresar una Producto</h3>
                        <label for="cboTipoProd">Seleccione el producto</label>
                        <select class="form-control" id="cboTipoProd" name="cboTipoProd">
                            <option value="Bicicleta">Bicicleta</option>
                            <option value="Accesorio">Accesorio</option>
                        </select>
                        <label for="txtNombre">Nombre</label>
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" value="" required>
                        <label for="cboTipoBici">Tipo Bicicleta</label>
                        <select id="cboTipoBici" class="form-control" name="cboTipoBici">
                            <option value="Mountain Bike">Mountain Bike</option>
                            <option value="Urbanas">Urbanas</option>
                            <option value="Ruta">Ruta</option>
                            <option value="Freestyle">Freestyle</option>
                        </select>
                        <label for="numAro">Aro</label>
                        <input type="number" class="form-control" name="numAro" id="numAro" value="" required>
                        <label for="txtMarca">Marca</label>
                        <input type="text" class="form-control" name="txtMarca" id="txtMarca" value="" required>
                        <label for="txtModelo">Modelo</label>
                        <input type="text" class="form-control" name="txtModelo" id="txtModelo" value="" required>
                        <label for="numPrec">Precio</label>
                        <input type="number" class="form-control" name="numPrec" id="numPrec" value="" required>
                        <label for="numPromocion">Promocion</label>
                        <input type="number" class="form-control" name="numPromocion" id="numPromocion" value="" required>
                        <label for="numStock">Stock</label>
                        <input type="number" class="form-control" name="numStock" id="numStock" value="" required>
                        <label for="filImagen">Imagen</label>
                        <input type="file" name="filImagen" id="filImagen" accept=".jpg, .jpeg" required>

                        <input type="hidden" id="txtAccionProd" name="txtAccionProd" value="ingresarProd">
                        <input type="submit" class="form-control" id="btnIngresarProd" value="Ingresar Producto">
                    </form>  
                </div>
                <?php if ($tipoUsuario=='Empleado') { ?>
                <div class="col-md-8">
                    <form id="frmListarProd" method="post" action="proceso.php">
                        <h1>Listar Productos</h1>
                        <input type="hidden" name="txtListarProd" id="txtListarProd" value="">
                        <input type="button" id="btnListarProd" name="btnListarProd" value="Listar Productos">
                    </form>
                    <div id="respuestaProd">

                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </body>
</html>
