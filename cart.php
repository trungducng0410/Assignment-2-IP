<?php
session_start();
if (isset($_SESSION['cart'])) {
    if (count($_SESSION['cart']) == 0) {
        unset($_SESSION['cart']);
        header("Location: index.php");
        exit;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Hertz-UTS</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="./index.php">
            Hertz-UTS
        </a>
        <h1 style="color: white;">Car Rental Center</h1>
        <a class="btn btn-primary" role="button" href="./cart.php">
            Car Reservation
        </a>
    </nav>
    <br>
    <div class='text-center'>
        <h3>Car reservation</h3>
    </div>
    <br>
    <form id="checkoutForm" method="post" action="checkout.php">
        <div class="container">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Vehicle</th>
                        <th scope="col">Price Per Day</th>
                        <th scope="col">Rental Days</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($_SESSION["cart"] as $id => $item) {
                    ?>
                        <tr>
                            <td class='align-middle'><img style='width: 70px; height: 70px;' class='img-thumbnail' src='./images/<?php echo $item['Model'] ?>.jpg'></td>
                            <td class='align-middle'><?php echo $item['Brand'] . '-' . $item['Model'] . '-' . $item['Year']; ?></td>
                            <td class='align-middle'><?php echo $item['PricePerDay']; ?>$</td>
                            <td class='align-middle'><input name='rentalDays[]' required type='number' min='1' max='100' value=<?php echo $item['Day']; ?>></td>
                            <td class='align-middle'><button class='btn btn-danger' type='submit' name='clearID' value='<?php echo $id; ?>' onclick="return confirm('Do you want to delete this item?')" form='deleteForm'>Delete</button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="text-right"><button type="submit" form="checkoutForm" class="btn btn-primary">Processing to Checkout</button></div>
        </div>
    </form>

    <form id="deleteForm" method="post" action="deleteCar.php">
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>