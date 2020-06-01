<?php 
session_start();
$customer_info = $_POST;
$name = $customer_info['firstName'] . $customer_info['lastName'];
$email = $customer_info['email'];
$subject = "Order confirmation";
$total = $_SESSION['total'];
$msg = "
Dear $name, \n
Thanks for renting cars from Hertz-UTS, the total cost is {$total}$ \n\n
Details are as follows: \n\n
";
foreach ($_SESSION["cart"] as $id => $item) {
    $msg .= "Model: {$item['Brand']}-{$item['Model']}-{$item['Year']}\n";
    $msg .= "Mileage: {$item['Mileage']} kms \n";
    $msg .= "Fuel type: {$item['FuelType']} \n";
    $msg .= "Seats: {$item['Seats']} \n";
    $msg .= "Price per day: {$item['PricePerDay']}$ \n";
    $msg .= "Rent days: {$item['Days']} \n";
    $msg .= "Description: {$item['Description']} \n\n";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Purchase</title>
</head>
<body>

    <div class="container text-center">
        <h1>Please check your email for order detail</h1>
        <a href="index.php" class="btn btn-primary">Back to Home</a>
    </div>

</body>
<?php
session_destroy();
?>