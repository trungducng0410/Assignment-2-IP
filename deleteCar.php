<?php
session_start();
$id = $_POST["clearID"];
unset($_SESSION["cart"][$id]);
header("Location: cart.php");
exit;
?>