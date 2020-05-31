<?php
session_start();
$total = 0;
$rentalDays = $_POST['rentalDays'];
$index = 0;
foreach ($_SESSION['cart'] as $id => $item) {
    $_SESSION['cart'][$id]['Day'] = $rentalDays[$index];
    $total += $rentalDays[$index] * $item['PricePerDay'];
    $index++;
}
$_SESSION['total'] = $total;
echo $total;
?>