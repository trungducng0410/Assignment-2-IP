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
?>

<!-- Bootstrap template - https://getbootstrap.com -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">
        .form-group .col-form-label:after {
            content: " *";
            color: red;
        }
    </style>
    <title>Hertz-UTS</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="./index.php">
            Hertz-UTS
        </a>
        <h1 style="color: white;">Car Rental Center</h1>
        <button class="btn btn-primary" onclick='checkCart(<?php echo $empty ?>)'>
            Car Reservation
        </button>
    </nav>
    <br>
    <h3 class="text-center">Check out</h3>
    <div class="container">
        <h3>Customer Details and Payment</h3>
        <p class="text-info">Please fill in your details. <span style="color: red;">*</span> indicates required field.</p>
        <form action="purchase.php" method="POST" name="purchaseForm">
            <div class="row form-group">
                <label for="firstName" class="col-2 col-form-label">First Name</label>
                <div class="col-10">
                    <input type="text" class="form-control" required name="firstName" id="firstName" placeholder="First Name">
                </div>
            </div>
            <div class="row form-group">
                <label for="lastName" class="col-2 col-form-label">Last Name</label>
                <div class="col-10">
                    <input type="text" class="form-control" required name="lastName" id="lastName" placeholder="Last Name">
                </div>
            </div>
            <div class="row form-group">
                <label for="email" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                    <input type="email" class="form-control" required name="email" id="email" placeholder="example@example.com">
                </div>
            </div>
            <div class="row form-group">
                <label for="address1" class="col-2 col-form-label">Address line 1</label>
                <div class="col-10">
                    <input type="text" class="form-control" required name="address1" id="address1" placeholder="Address line 1">
                </div>
            </div>
            <div class="row form-group">
                <label for="address2" class="col-2">Address line 2</label>
                <div class="col-10">
                    <input type="text" class="form-control" name="address2" id="address2" placeholder="Address line 2">
                </div>
            </div>
            <div class="row form-group">
                <label for="city" class="col-2 col-form-label">City</label>
                <div class="col-10">
                    <input type="text" class="form-control" required name="city" id="city" placeholder="City">
                </div>
            </div>
            <div class="row form-group">
                <label for="state" class="col-2 col-form-label">State</label>
                <div class="col-10">
                    <select type="text" class="form-control" required name="state" id="state">
                        <option selected>New South Wales</option>
                        <option>Western Australia</option>
                        <option>Queensland</option>
                        <option>South Australia</option>
                        <option>Victoria</option>
                        <option>Tasmania</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="postCode" class="col-2 col-form-label">Post Code</label>
                <div class="col-10">
                    <input type="text" class="form-control" required name="postCode" id="postCode" placeholder="Post Code">
                </div>
            </div>
            <div class="form-group row">
                <label for="paymentType" class="col-2 col-form-label">Payment Type</label>
                <div class="col-10">
                    <select class="form-control" required id="paymentType" name="paymentType">
                        <option selected>VISA</option>
                        <option>MasterCard</option>
                        <option>PayPal</option>
                        <option>Bpay</option>
                        <option>Direct deposit</option>
                    </select>
                </div>
            </div>
            <h3>You are required to pay $<?php echo $total; ?></h3>
            <div class="form-group row">
                <div class="col-12 text-right">
                    <a href="index.php" class="btn btn-primary">Back to selection</a>
                    <button type="submit" class="btn btn-success">Booking</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="index.js"></script>
</body>

</html>