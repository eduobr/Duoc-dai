<?php

include_once '/clases/Cl_Reserva.php';
include_once '/clases/DaoReserva.php';

if (isset($_POST["txtAccion"])) {

    $accion = $_POST["txtAccion"];

    if ($accion == "Enviar") {
        $rut = $_POST["txtRut"];
        $nombre = $_POST["txtNombre"];
        $edad = $_POST["txtEdad"];
        $mensaje = $_POST["txtMensaje"];

        $reserva = new Cl_Reserva();
        $reserva->setRut($rut);
        $reserva->setNombre($nombre);
        $reserva->setEdad($edad);
        $reserva->setMensaje($mensaje);

        $dao = new DaoReserva();
        $resp = $dao->Insertar($reserva);


        if ($resp > 0) {
            echo 'Grabado';
        } else {
            echo 'No grabo';
        }
        if ($accion == "Eliminar") {
            echo 'eliminar';
        }
    }
    if ($accion == "Eliminar") {

        $rut = $_POST["txtRut"];
        $dao = new DaoReserva();
        $respuesta = $dao->EliminarR($rut);
        if ($respuesta > 0) {
            echo 'Elimino';
            
        } else {
            echo 'No Elimino';
            
        }
    }
    if ($accion == "Listar") {

        $dao = new DaoReserva();
        $resultado = $dao->SeleccionarTodo();
        echo '<table border="1">';
        echo '<tr>';
        $archivo=fopen("listado.csv","w");
        fwrite($archivo, "Rut;Nombre;Edad;Mensaje \n");
        echo '<td>Rut</td>';
        echo '<td>Nombre</td>';
        echo '<td>Edad</td>';
        echo '<td>Mensaje</td>';
        echo '<td>Opcion</td>';
        echo '</tr>';
        while ($row = mysqli_fetch_array($resultado)) {
            echo '<tr>';
            fwrite($archivo, $row[1].";".$row[2].";".$row[3].";".$row[4]."\n");
            echo '<td>' . $row[1] . '</td>';
            echo '<td>' . $row[2] . '</td>';
            echo '<td>' . $row[3] . '</td>';
            echo '<td>' . $row[4] . '</td>';
            echo '<td><a href="proceso.php?dato=' . $row[0] . '"> Eliminar </a> </td>';
            echo '</tr>';
        }
        echo '</table>';
        fclose($archivo);
        echo '<a href="listado.csv">Descarga en Excel</a> <br>';
        echo '<a href="crearPDF.php">Vista PDF</a>';
    }
} else {
    if (isset($_GET["dato"])) {
        $dato=$_GET["dato"];
        $dao=new DaoReserva();
        $resp=$dao->EliminarC($dato);
        if ($resp>0) {
            //echo 'elimino';
            header("Location:index.php?mensaje='Elimino'");
        } else {
            //echo 'no elimino';
            header("Location:index.php?mensaje='No Elimino'");
        }
    }
}
