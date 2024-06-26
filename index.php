<!-- 
Author: Catherine Pe Benito
Created: 06/03/2023
This page contains the views for different sections of the main webpage.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Grocery TO-GO</title>
    <link rel="icon" href="assets/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include 'components/header.php' ?>
    <iframe id="view" name="view" src="components/categories/show_products.php" style="
        width: 100%;
        height: 60%;
        display: block;
        position: absolute;
        z-index: 0;"
        frameborder=0>
    </iframe>
    <iframe id="cart-view" name="cart-view" src="components/shoppingCartFooter.php" style="
        bottom: 0;
        width: 100%;
        height: 20%;
        display: block;
        position: absolute;
        z-index: 0"
        frameborder=0>
    </iframe>
    <script src="components/shoppingCartFooter.php"></script>
</body>
</html>