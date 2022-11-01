<?php

include_once '../clases/DaoUsuario.php';
include_once '../clases/ClUsuario.php';

$user=$_POST["txtU"];
$pass= password_hash($_POST["txtP1"],PASSWORD_DEFAULT);
$usuario = new ClUsuario();
$usuario->setPass($pass);
$usuario->setUser($user);
$dao=new DaoUsuario();
$resp=$dao->Agregar($usuario);
echo 'Respuesta'.$resp;
