<?php
include("config.php");
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = mysqli_query($conn, "SELECT * FROM `cart` WHERE id='$id' AND cart='No'");
    $jumlah_barang = mysqli_num_rows($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ManShop</title>
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="./images/logo1.png" width="125px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="products.php">All Products</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="accountLG.php">Account</a></li>
                    </ul>
                </nav>
                <a href="cart.php"><img src="images/cart.png" width="30px" height="30px"><?php echo $jumlah_barang; ?></a>
                <img src="images/menu.png" onclick="menutoggle()" class="menu-icon">
            </div>
            <div class="row">
                <div class="col-2">
                    <h1>Arduino<br>A Microcontroller!</h1>
                    <p>Our shop sells various kinds of microcontrollers and various<br>kinds of the cheapest sensors throughout Indonesia.</p>
                </div>
                <div class="col-2">
                    <img src="./img/arduinoIndex.png">
                </div>

            </div>

        </div>
    </div>