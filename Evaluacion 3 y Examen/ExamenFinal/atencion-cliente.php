<?php
include_once '/panel.php';
if (!$tipoUsuario=="Cliente") {
    echo '<script>location.href = "index.php";</script>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $conexion = new mysqli("localhost", "root", "", "examen");
        $reg1 = $conexion->query("SELECT RUT FROM CLIENTE WHERE USUARIOS_USER='" . $_SESSION['usuario']['user'] . "'");
        $rut = '';
        while ($row = mysqli_fetch_array($reg1)) {
            $rut = $row[0];
        }
        //$reg2 = $conexion->query("SELECT * FROM ATENCION WHERE CLIENTE_RUT='" . $rut . "';");
        $reg2 = $conexion->query("SELECT a.CLIENTE_RUT,CONCAT(c.NOMBRE,' ',c.APELLIDOP,' ',c.APELLIDOM),
        a.ABOGADO_RUT,CONCAT(ab.NOMBRE,' ',ab.APELLIDOP,' ',ab.APELLIDOM),DATE_FORMAT(a.FECHA,'%d-%m-%Y %H:%i'),a.ESTADO,a.IDATENCION
        FROM ATENCION a JOIN CLIENTE c ON a.CLIENTE_RUT = c.RUT JOIN ABOGADO ab ON a.ABOGADO_RUT = ab.RUT WHERE a.CLIENTE_RUT='" . $rut . "';");
        echo '<div class=col-md-12>';
        echo '<table class=table>';
        echo '<tr>';
        //$archivo = fopen("listado.csv", "w");
        //fwrite($archivo, "Codigo;Rut;Fono;Sala;Pelicula;Adultos;Niños;Total \n");
        echo '<td>RUT Cliente</td>';
        echo '<td>Nombre Cliente</td>';
        echo '<td>RUT Abogado</td>';
        echo '<td>Nombre Abogado</td>';
        echo '<td>Fecha de la Atencion</td>';
        echo '<td>Estado</td>';
        echo '</tr>';
        while ($row2 = mysqli_fetch_array($reg2)) {
            echo '<tr>';
            //fwrite($archivo, $row[0] . ";" . $row[1] . ";" . $row[2] . ";" . $row[3] . ";" . $row[4] . ";" . $row[5] . ";" . $row[6] . ";" . $row[7] . "\n");
            echo '<td>' . $row2[0] . '</td>';
            echo '<td>' . $row2[1] . '</td>';
            echo '<td>' . $row2[2] . '</td>';
            echo '<td>' . $row2[3] . '</td>';
            echo '<td>' . $row2[4] . '</td>';
            echo '<td>' . $row2[5] . '</td>';
            //echo '<td><a href="proceso.php?dato=' . $row[0] . '"> Eliminar </a> </td>';
        }
        echo '</table>';
        //fclose($archivo);
        //echo '<a href="listado.csv">Descarga en Excel</a><br>';
        //echo '<a href="PDFReserva.php">Vista PDF</a>';
        echo '</div>';
        ?>
    </div>
</body>
</html>
