<?php
session_start();
unset($_SESSION["carrito"]);
header("Location:listar_productos.php");


