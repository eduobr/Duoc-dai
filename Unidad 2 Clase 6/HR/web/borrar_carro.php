<?php
session_start();
unset($_SESSION["carrito"]);
header("Location:listado_productos.php");

