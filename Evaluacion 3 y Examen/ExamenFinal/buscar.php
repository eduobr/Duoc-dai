<?php
include_once '/proceso.php';

$conexion = new mysqli("localhost", "root", "", "examen");
//$sql = "SELECT * FROM CLIENTE;";
if ($_POST["txtBuscar"]) {
    $accion = $_POST["txtBuscar"];
    if ($accion == "Cliente") {
        $key = $_POST["txtBusqueda"];
        //$sql = "SELECT * FROM CLIENTE WHERE RUT LIKE '%" . $key . "%';";
        $sql = "SELECT c.RUT,CONCAT(c.NOMBRE,' ',c.APELLIDOP,' ',c.APELLIDOM),DATE_FORMAT(c.FECINCORPORACION,'%d-%m-%Y'),c.TIPOPERSONA,c.DIRECCION,
        c.TELEFONO,c.USUARIOS_USER,u.ACTIVO FROM CLIENTE c JOIN USUARIO u ON c.usuarios_user=u.user WHERE RUT LIKE '%" . $key . "%'"
                . "OR NOMBRE LIKE '%" . $key . "%' OR APELLIDOP LIKE '%" . $key . "%' OR APELLIDOM LIKE '%" . $key . "%' OR TIPOPERSONA LIKE '%" . $key . "%' OR DIRECCION LIKE '%" .
                $key . "%' OR TELEFONO LIKE '%" . $key . "%' OR u.ACTIVO LIKE '%" . $key . "%'";
        $reg = $conexion->query($sql);
        echo '<div class=col-md-12>';
        echo '<table class=table>';
        echo '<tr>';
        //$archivo = fopen("listado.csv", "w");
        //fwrite($archivo, "Codigo;Rut;Fono;Sala;Pelicula;Adultos;Niños;Total \n");
        echo '<td>RUT Cliente</td>';
        echo '<td>Nombre Cliente</td>';
        echo '<td>Fecha de Incorporacion</td>';
        echo '<td>Tipo Persona</td>';
        echo '<td>Direccion</td>';
        echo '<td>Telefono</td>';
        echo '<td>Activo</td>';
        echo '<td>Desactivar</td>';
        echo '</tr>';
        while ($row = mysqli_fetch_array($reg)) {
            echo '<tr>';
            //fwrite($archivo, $row[0] . ";" . $row[1] . ";" . $row[2] . ";" . $row[3] . ";" . $row[4] . ";" . $row[5] . ";" . $row[6] . ";" . $row[7] . "\n");
            echo '<td>' . rutConDV($row[0]) . '</td>';
            echo '<td>' . $row[1] . '</td>';
            echo '<td>' . $row[2] . '</td>';
            echo '<td>' . $row[3] . '</td>';
            echo '<td>' . desencriptar($row[4]) . '</td>';
            echo '<td>' . $row[5] . '</td>';
            echo '<td>' . $row[7] . '</td>';
            if ($row[7] == "SI") {
                echo '<td><a class="btn" role="button" href="proceso.php?dato=' . $row[6] . '&opcion=1"> Desactivar </a> </td>';
            } else {
                echo '<td></td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        //fclose($archivo);
        //echo '<a href="listado.csv">Descarga en Excel</a><br>';
        //echo '<a href="PDFReserva.php">Vista PDF</a>';
        echo '</div>';
    }
    if ($accion == "Abogado") {
        $key = $_POST["txtBusquedaAbo"];
        //$sql = "SELECT * FROM CLIENTE WHERE RUT LIKE '%" . $key . "%';";
        $sql = "SELECT RUT,CONCAT(NOMBRE,' ',APELLIDOP,' ',APELLIDOM),DATE_FORMAT(FECCONTRATACION,'%d-%m-%Y'),ESPECIALIDAD,VALORHORA,ACTIVO
        FROM ABOGADO WHERE RUT LIKE '%" . $key . "%'"
                . "OR NOMBRE LIKE '%" . $key . "%' OR APELLIDOP LIKE '%" . $key . "%' OR APELLIDOM LIKE '%" . $key . "%' OR DATE_FORMAT(FECCONTRATACION,'%d-%m-%Y') LIKE '%" . $key . "%' OR ESPECIALIDAD LIKE '%" . $key . "%' OR VALORHORA LIKE '%" .
                $key . "%' OR ACTIVO LIKE '%" . $key . "%'";
        $reg = $conexion->query($sql);
        echo '<div class=col-md-12>';
        echo '<table class=table>';
        echo '<tr>';
        //$archivo = fopen("listado.csv", "w");
        //fwrite($archivo, "Codigo;Rut;Fono;Sala;Pelicula;Adultos;Niños;Total \n");
        echo '<td>RUT</td>';
        echo '<td>Nombre</td>';
        echo '<td>Fecha de Contratacion</td>';
        echo '<td>Especialidad</td>';
        echo '<td>Valor Hora</td>';
        echo '<td>Activo</td>';
        echo '<td>Despedir</td>';
        echo '</tr>';
        while ($row = mysqli_fetch_array($reg)) {
            echo '<tr>';
            //fwrite($archivo, $row[0] . ";" . $row[1] . ";" . $row[2] . ";" . $row[3] . ";" . $row[4] . ";" . $row[5] . ";" . $row[6] . ";" . $row[7] . "\n");
            echo '<td>' . rutConDV($row[0]) . '</td>';
            echo '<td>' . $row[1] . '</td>';
            echo '<td>' . $row[2] . '</td>';
            echo '<td>' . $row[3] . '</td>';
            echo '<td>' . $row[4] . '</td>';
            echo '<td>' . $row[5] . '</td>';
            echo '<td><a class="btn" role="button" href="proceso.php?dato=' . $row[0] . '&opcion=0"> Despedir </a></td>';
            echo '</tr>';
        }
        echo '</table>';
        //fclose($archivo);
        //echo '<a href="listado.csv">Descarga en Excel</a><br>';
        //echo '<a href="PDFReserva.php">Vista PDF</a>';
        echo '</div>';
    }
    if ($accion == "Atencion") {
        session_start();
        $tipoUsuario = $_SESSION["usuario"]["tipoUsuario"];
        $key = $_POST["txtBusquedaAte"];
        $sql = "SELECT a.CLIENTE_RUT,CONCAT(c.NOMBRE,' ',c.APELLIDOP,' ',c.APELLIDOM),
       a.ABOGADO_RUT,CONCAT(ab.NOMBRE,' ',ab.APELLIDOP,' ',ab.APELLIDOM),DATE_FORMAT(a.FECHA,'%d-%m-%Y %H:%i'),a.ESTADO,a.IDATENCION
       FROM ATENCION a JOIN CLIENTE c ON a.CLIENTE_RUT = c.RUT JOIN ABOGADO ab ON a.ABOGADO_RUT = ab.RUT WHERE a.CLIENTE_RUT LIKE '%" . $key . "%'
                OR c.NOMBRE LIKE '%" . $key . "%' OR c.APELLIDOP LIKE '%" . $key . "%' OR c.APELLIDOM LIKE '%" . $key . "%' OR DATE_FORMAT(a.FECHA,'%d-%m-%Y %H:%i') LIKE '%" . $key . "%' OR a.ESTADO LIKE '%" . $key . "%' OR ab.NOMBRE LIKE '%" . $key . "%' OR ab.APELLIDOP LIKE '%" . $key . "%' OR ab.APELLIDOM LIKE '%" . $key . "%'";
        $reg = $conexion->query($sql);
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
        while ($row = mysqli_fetch_array($reg)) {
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
                '<option value="Agendada">Agendada</option>' .
                '<option value="Confirmada">Confirmada</option>' .
                '<option value="Anulada">Anulada</option>' .
                '<option value="Perdida">Perdida</option>' .
                '<option value="Realizada">Realizada</option>' .
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
    }
}

