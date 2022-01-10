<?php

if (isset($_GET['id'])) {
    include "config.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);

    $sql = "SELECT `item_image` FROM `product` WHERE `product`.`item_id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $loc = htmlentities($row['item_image'], ENT_QUOTES, 'UTF-8');
    unlink("./images/product/" . $loc);

    $sql = "SELECT `item_cart` FROM `product` WHERE `product`.`item_id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $loc = htmlentities($row['item_cart'], ENT_QUOTES, 'UTF-8');
    unlink("./images/cart/" . $loc);

    $sql = "DELETE FROM `product` WHERE `product`.`item_id` = $id;";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: Product.php");
    } else {
        header("Location: Product.php?error=unknown error occurred&$user_data");
    }
} else {

    header("Location: Product.php");
}
