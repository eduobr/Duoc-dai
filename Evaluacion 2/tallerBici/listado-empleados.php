<!DOCTYPE html>
<?php
include_once '/panel.php';
if (!isset($_SESSION["usuario"])) {
    echo '<script>location.href = "index.php";</script>';
} else {
    if ($tipoUsuario == "Cliente" || $tipoUsuario == "Empleado") {
        echo '<script>location.href = "index.php";</script>';
    }
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title></title>
    </head>
    <body>
        <?php
        $conexion = new mysqli("localhost", "root", "", "tallerbicicleta");
        $reg = $conexion->query("SELECT e.RUT,CONCAT(e.NOMBRE,' ',e.apellido),e.CARGO,s.Sucursal,IF(ISNULL(e.ANTICIPO), 0, e.ANTICIPO),e.SUELDO,IF(ISNULL(e.FECRENUNCIA),'ACTIVO',e.FECRENUNCIA) FROM EMPLEADO e 
        JOIN SUCURSAL s ON e.Sucursal_idSucursal=s.idSucursal;");
        ?>
        <div class="container">
            <div class="row">
                <table class="table">
                    <tr>
                        <td>Rut</td>
                        <td>Nombre</td>
                        <td>Cargo</td>
                        <td>Sucursal</td>
                        <td>Anticipo</td>
                        <td>Sueldo</td>
                        <td>Renuncia</td>
                    </tr>
                    <?php
                    $archivo = fopen("listadoEmpleados.csv", "w");
                    fwrite($archivo, "Rut;Nombre;Cargo;Sucursal;Anticipo;Sueldo;Renuncia \n");
                    if ($reg->num_rows > 0) {
                        while ($row = mysqli_fetch_array($reg)) {
                            fwrite($archivo, $row[0] . ";" . $row[1] . ";" . $row[2] . ";" . $row[3] . ";" . $row[4] . ";" . $row[5] . ";" . $row[6] . "\n");
                            ?>
                            <tr>
                                <td><?php echo $row[0]; ?></td>
                                <td><?php echo $row[1]; ?></td>
                                <td><?php echo $row[2]; ?></td>
                                <td><?php echo $row[3]; ?></td>
                                <td><?php echo $row[4]; ?></td>
                                <td><?php echo $row[5]; ?></td>
                                <td><?php echo $row[6]; ?></td>
                            </tr>
                            <?php
                        }
                        fclose($archivo);
                    }
                    ?>
                </table>
                <a href="listadoEmpleados.csv">Descarga Listado Empleados</a>
            </div>
        </div>
    </body>
</html>
