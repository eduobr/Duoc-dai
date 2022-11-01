<?php
require './clases/Cl_Conexion.php';
session_start();
$conexion=new Cl_Conexion();
$con=$conexion->ObtenerConexion();
//echo 'VALIDA';
//$usuarios=$con->query("SELECT u.user,u.tipoUsuario FROM USUARIO u JOIN EMPLEADO e ON u.user=e.Usuario_user WHERE user='".$_POST["txtUsuario"]."' AND password='".$_POST["txtPass"]."' AND e.fecRenuncia IS NULL");
$usuarios=$con->query("SELECT user,tipoUsuario FROM USUARIO WHERE user='".$_POST["txtUsuario"]."' AND password='".$_POST["txtPass"]."' AND ACTIVO='SI'");
if ($usuarios->num_rows==1) {
    $datos=$usuarios->fetch_assoc();
    $_SESSION["usuario"]=$datos;
    unset($_SESSION["carrito"]);
    echo json_encode(array('error'=>false,'tipo'=>$datos['tipoUsuario']));
}  else {
    echo json_encode(array('error'=>true));
}

//if ($usuarioCliente->num_rows==1) {
//    $datos=$usuarios->fetch_assoc();
//    $_SESSION["usuario"]=$datos;    
//    echo json_encode(array('error'=>false,'tipo'=>$datos['tipoUsuario']));
//}else {
//    echo json_encode(array('error'=>true));
//}
//$conexion->close();
?>
