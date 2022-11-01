<?php

include_once '/clases/Cl_Reserva.php';
include_once '/clases/DaoReserva.php';

$accion = $_POST["btnAccion"];
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
        echo 'No Grabo';
    }
}
if ($accion=="Eliminar") {
    echo "eliminar";
}


