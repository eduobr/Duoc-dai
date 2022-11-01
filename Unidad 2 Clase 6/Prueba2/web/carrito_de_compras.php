<?php
$conexion = new mysqli("localhost", "root", "", "prueba2");
$id=$_POST["txtId"];
$reg=$conexion->query("select * from producto where idProducto=".$id.";");
//recuperar fila
$fila= mysqli_fetch_row($reg);
session_start();
//existe el carro
$cant=1;
if (isset($_SESSION["carrito"])) {
    $arreglo=$_SESSION["carrito"];
    foreach ($arreglo as $key => $value) {
        if ($value["desc"]==$fila[1]) {
            $cant=$value["cantidad"]+1;
            break;
        }
    }
}else{
    $arreglo=array();
}
$arreglo[$id]["desc"]=$fila[1];//guardar la descripcion
$arreglo[$id]["foto"]=$fila[4];
$arreglo[$id]["cantidad"]=$cant;
$arreglo[$id]["precio"]=$fila[2];

//listar
foreach ($arreglo as $key => $value) {
    echo '<br><img src="../img/'.$value["foto"].'" width="50" height="50">';
    echo '<br>Descripcion del producto:'.$value["desc"]." Cant:".$value["cantidad"]."Precio:".$value["precio"]."Total:".($value["cantidad"]*value["precio"]);
    $totalG+=($value["cantidad"]*$value["precio"]);
}
$_SESSION["carrito"]=$arreglo;

echo '<a href="listar_productos.php">Volver a Productos</a>';