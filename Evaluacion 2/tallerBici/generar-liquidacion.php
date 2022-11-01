<?php
include_once '/clases/DaoEmpleado.php';
include_once '/panel.php';
if (!isset($_SESSION["usuario"])) {
    echo '<script>location.href = "index.php";</script>';
} else {
    if ($tipoUsuario == "Cliente" || $tipoUsuario == "ADMIN") {
        echo '<script>location.href = "index.php";</script>';
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $usuario = $_SESSION["usuario"]["user"];
        $daoEmp = new DaoEmpleado();
        $resultado = $daoEmp->liquidacion($usuario);
        while ($row = mysqli_fetch_array($resultado)) {
            ?>
            <div class="container">
                <table class="table table-bordered tabla" style="text-align: left; font-weight: bold;">
                    <tr>
                        <td>Rut</td>
                        <td><?php echo $row[0]; ?></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><?php echo $row[1]; ?></td>
                    </tr>
                    <tr>
                        <td>Cargo</td>
                        <td><?php echo $row[2]; ?></td>
                    </tr>
                    <tr>
                        <td>Sucursal</td>
                        <td><?php echo $row[3]; ?></td>
                    </tr>

                    <tr>
                        <td><h4>Haberes</h4></td>
                    </tr>
                    <tr>
                        <td>Gratificacion</td>
                        <td><?php
                            $gratificacion = $row[5] * 0.25;
                            echo $gratificacion;
                            ?></td>
                    </tr>
                    <tr>
                        <td>Bono Locomocion</td>
                        <?php $locomocion = 30000; ?>
                        <td><?php echo $locomocion; ?></td>
                    </tr>
                    <tr>
                        <td><h4>Descuentos</h4></td>
                    </tr>
                    <tr>
                        <td>Anticipo</td>
                        <td><?php
                            $anticipo = $row[4];
                            echo$anticipo
                            ?></td>
                    </tr>
                    <tr>
                        <td>Salud</td>
                        <td><?php
                            $salud = $row[5] * 0.07;
                            echo $salud
                            ?></td>
                    </tr>
                    <tr>
                        <td>AFP</td>
                        <td><?php
                            $afp = $row[5] * 0.03;
                            echo$afp
                            ?></td>
                    </tr>
                    <tr>
                        <td>Sueldo</td>
                        <td><?php echo $row[5]; ?></td>
                    </tr>
                    <tr>
                        <td>Total Haberes</td>
                        <td><?php echo $gratificacion + $locomocion; ?></td>
                    </tr>
                    <tr>
                        <td>Total Descuentos</td>
                        <td><?php echo $salud + $afp + $anticipo; ?></td>
                    </tr>
                    <tr>
                        <td><h4>Sueldo Liquido</h4></td>
                        <td><?php echo $row[5] + $gratificacion + $locomocion - $salud - $afp - $anticipo ?></td>
                    </tr>
                </table>
                <a href="generar-liquidacion-pdf.php">Vista PDF Liquidacion de Sueldo</a>
            </div>
        <?php } ?>
    </body>
</html>
