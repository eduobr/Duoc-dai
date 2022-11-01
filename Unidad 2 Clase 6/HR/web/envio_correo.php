<?php

$destinatario=$_POST["txtDestinatario"];
$origen="From:".$_POST["txtOrigen"];
$asunto=$_POST["txtAsunto"];
$mensaje=$_POST["txtMensaje"];
//entrega un valor boolean 
$respuesta= mail($destinatario, $asunto, $mensaje, $origen);

if ($respuesta) {
    echo 'Envio de Correo Exitoso';
} else {
    echo 'Fallo Envio de Correo';
}

