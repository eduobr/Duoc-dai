<?php
include_once '/panel.php';
include_once '/proceso.php';
if (!isset($_SESSION["usuario"])) {
    echo '<script>location.href = "index.php";</script>';
}
if (isset($_GET["mensaje"])) {
    echo "<script>alert(" . $_GET["mensaje"] . ")"
            . ";location.href = 'listado-atenciones.php'</script>";
}
if ($tipoUsuario != "Gerente" && $tipoUsuario != "Secretaria") {
    echo '<script>location.href = "index.php";</script>';
}
$conexion = new mysqli("localhost", "root", "", "examen");
$sql = "SELECT a.cliente_rut,CONCAT(c.NOMBRE,' ',c.APELLIDOP,' ',c.APELLIDOM),a.abogado_rut,CONCAT(ab.NOMBRE,' ',ab.APELLIDOP,' ',ab.APELLIDOM),
a.fecha,a.estado,a.idAtencion
FROM ATENCION a JOIN CLIENTE c ON a.cliente_rut=c.rut JOIN ABOGADO ab ON a.abogado_rut=ab.rut
WHERE TO_DAYS(fecha)-TO_DAYS(DATE_ADD(NOW(),INTERVAL 2 DAY))=0 AND ESTADO='Agendada' ORDER BY a.fecha DESC;";
$regPen = $conexion->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Atenciones Pendientes</title>
    </head>
    <body>
        <?php
        echo '<form method="post" action="proceso.php">';
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
        if ($tipoUsuario == "Secretaria") {
            echo '<td>Cambiar Estado de Atencion</td>';
        }
        echo '</tr>';
        $contador = 0;
        $contador2 = 0;
        while ($row = mysqli_fetch_array($regPen)) {
            echo '<tr>';
            //fwrite($archivo, $row[0] . ";" . $row[1] . ";" . $row[2] . ";" . $row[3] . ";" . $row[4] . ";" . $row[5] . ";" . $row[6] . ";" . $row[7] . "\n");
            echo '<td>' . rutConDV($row[0]) . '</td>';
            echo '<td>' . $row[1] . '</td>';
            echo '<td>' . rutConDV($row[2]) . '</td>';
            echo '<td>' . $row[3] . '</td>';
            echo '<td>' . $row[4] . '</td>';
            echo '<td>' . $row[5] . '</td>';
            //echo '<td><a href="proceso.php?dato=' . $row[0] . '"> Eliminar </a> </td>';
            if ($tipoUsuario == "Secretaria") {
                echo '<td>' .
                '<select class="form-control" name="cboActEstado' . $contador . '" id="cboActEstado' . $contador . '">' .
                '<option value="Agendada"';
                if ($row[5] == "Agendada") {
                    echo 'selected';
                }echo '>Agendada</option>' .
                '<option value="Confirmada"';
                if ($row[5] == "Confirmada") {
                    echo 'selected';
                }echo '>Confirmada</option>' .
                '<option value="Anulada"';
                if ($row[5] == "Anulada") {
                    echo 'selected';
                }echo '>Anulada</option>' .
                '<option value="Perdida"';
                if ($row[5] == "Perdida") {
                    echo 'selected';
                }echo '>Perdida</option>' .
                '<option value="Realizada"';
                if ($row[5] == "Realizada") {
                    echo 'selected';
                }echo '>Realizada</option>' .
                '</select>' .
                '<input type="hidden" name="txtAtencion' . $contador2 . '" value="' . $row[6] . '">' .
                '</td>';
                $contador++;
                $contador2++;
                echo '</tr>';
            }
        }
        echo '</table>';
        //fclose($archivo);
        //echo '<a href="listado.csv">Descarga en Excel</a><br>';
        //echo '<a href="PDFReserva.php">Vista PDF</a>';
        echo '</div>';
        if ($tipoUsuario == "Secretaria") {
            echo '<input type="hidden" name="txtIteracion" value="' . $contador . '">';
            echo '<center><input type="submit" class="form-control btn-primary" name="btnAccion" id="btnAccion" value="Actualizar Estado"></center>';
        }
        echo '</form>';
        ?>
    </body>
</html>
