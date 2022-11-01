<!DOCTYPE html>
<?php
include_once '/panel.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $conexion = new mysqli("localhost", "root", "", "tallerbicicleta");
        $rut;
        $regRut = $conexion->query("SELECT RUT FROM EMPLEADO WHERE USUARIO_USER='" . $_SESSION['usuario']['user'] . "'");
        while ($rowRut = mysqli_fetch_array($regRut)) {
            $rut = $rowRut[0];
        }
        $reg = $conexion->query("SELECT * FROM COTIZACION WHERE EMPLEADO_RUT='$rut' AND RESPUESTA IS NULL ORDER BY FECCOTIZACION DESC");
        ?>
        <div class="container">
            <div class="col-md-12">
                <h1>Listado de Cotizaciones a Responder</h1>
            </div>
            <div class="col-md-12">
                <table id="cotizacion" class="table table-bordered">
                    <tr>
                        <td>Nombre</td>
                        <td>Tipo de Cotizacion</td>
                        <td>Descripcion</td>
                        <td>Fecha de la Cotizacion</td>
                    </tr>
                    <?php
                    if ($reg->num_rows > 0) {
                        while ($row = mysqli_fetch_array($reg)) {
                            ?>
                            <tr>
                                <td><a href="respuesta-cotizacion.php?id=<?php echo $row[0]; ?>&nombre=<?php echo $row[1] . ' ' . $row[2]; ?>
                                       &tipoCot=<?php echo $row[5]; ?>&desc=<?php echo $row[3]; ?>&fecha=<?php echo $row[4]; ?>">
                                        <?php echo $row[1] . ' ' . $row[2]; ?></a></td>                            
                                <td><?php echo $row[5]; ?></td>                         
                                <td><?php echo $row[3]; ?></td>                              
                                <td><?php echo $row[4]; ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>


            </div>
        </div>
    </body>
</html>
