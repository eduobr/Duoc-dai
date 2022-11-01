<?php
include_once '../clases/ClUsuario.php';
include_once '../clases/DaoUsuario.php';
$usuario=$_POST["txtUsuario"];
$password=$_POST["txtPass1"];
$user=new ClUsuario();
$user->setUsuario($usuario);
$user->setPassword($password);
$dao=new DaoUsuario();
$resp=$dao->Guardar($user);
echo 'Respuesta:'.$resp;
