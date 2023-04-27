<!-- 
Author: Catherine Pe Benito
Created: 26/04/2023
This contains the page to confirm order.
-->
<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Order Confirmed</title>
        <link rel="icon" href="../assets/favicon.ico">
        <link rel="stylesheet" href="../assets/css/checkoutPage.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    </head>
	<body>
        
    <div class="banner">
        <img href="../index.php" target="_blank" class="img-logo" src="../assets/images/logo-smallsize.png" alt="Grocery To-Go Logo">
        <h3>Your first choice for easy, accessible shopping.</h3>
    </div>
    <?php
            ini_set('display_errors', 1);
            ini_set('error_reporting', E_ALL);?>
        <div class="shopping-cart-container">
        <div class="cart-items-container">
        <?php
        if (empty($_SESSION['cart'])) {
            echo "<p>Cart is empty.</p>";
        } else {
            include "dbConfig.php";
            $total_price = 0;
            $total_quantity = 0;
        foreach ($_SESSION['cart'] as $item_id => $quantity) {
            // Retrieve the item details from the database
            // You would need to modify this code based on your database structure
            $query = "SELECT * FROM products WHERE product_id = $item_id";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
    
            // Calculate the total price and total quantity
            $unit_price = $row['unit_price'];
            $item_price = $unit_price * $quantity;
            $item_price = number_format((float)$item_price, 2, '.', '');

            $total_price += $item_price * $quantity;
            $total_quantity += $quantity;
        }
    }
    $fullname = $_GET['fullname'];
    $email = $_GET['email'];
    $address = $_GET['address'];
    $state = $_GET['state'];
    $country = $_GET['country'];
        ?>
        <div class="col-25">
            <div class="container">
            <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo $total_quantity?></b></span></h4>
            <p><a href="#">Product 1</a> <span class="price">$<?php echo $item_price ?></span></p>
            <p><a href="#">Product 2</a> <span class="price">$5</span></p>
            <p><a href="#">Product 3</a> <span class="price">$8</span></p>
            <p><a href="#">Product 4</a> <span class="price">$2</span></p>
            <hr>
            <p>Total <span class="price" style="color:black"><b>$<?php echo $total_price?></b></span></p>
            </div>
        </div>
        <h1>Your order is confirmed!</h1></br>
        <h2>Order Details</h3>
        <p>Full Name: <?php echo $fullname?></p>
        <p>Email: <?php echo $email?></p>
        <p>Address: <?php echo $address?></p>
        <p>State: <?php echo $state?></p>
        <p>Country: <?php echo $country?></p>
    </div>
    </body>
</html>