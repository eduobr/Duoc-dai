<?php
session_start();
session_unset();
unset($_SESSION['Usuario']);
header("Location: ../login.php");
?>