<?php
session_start();
$arreglo=$_SESSION["Usuario"];

$CONEXION=new mysqli("localhost", "root", "","bici");
//necesito incrementar el pedido
$contador="select count(*) as total from compra";
$resp=$CONEXION->query($contador);
$fila= mysqli_fetch_row($resp);
$contador=$fila[0]+1;
$total=0;
foreach ($arreglo as $key => $value) {
    $total+=($value["can"]*$value["precio"]);    
}
$sql="insert into compra values($contador,$total);";
$resp=$CONEXION->query($sql);
$numfilas=0;$t=0;
foreach ($arreglo as $key => $value) {
    $idProducto=$value["id"];
    $cant=$value["can"];
    $sql="insert into Articulo_has_Compra values($idArticulo,$contador,$cant);";
    $resp=$CONEXION->query($sql);
    if($resp>0){ $t++; }
    $numfilas++;
}
if ($numfilas==$t) {
    echo 'todas las filas insertadas';
} else {
    echo 'faltaron filas por insertar';
}

