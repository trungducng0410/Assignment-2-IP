<?php
session_start();
$car = $_POST;
$id = $car['id'];
$car_detail = $car;
unset($car_detail['id']);
$car_detail['Day'] = 1;
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array($id => $car_detail);
    echo('Add to the cart successfully');
} else if (!isset($_SESSION["cart"][$id])) {
    $_SESSION["cart"][$id] = $car_detail;
    echo('Add to the cart successfully');
} else {
    echo('This car has been added');
}
return;
