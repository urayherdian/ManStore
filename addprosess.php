<?php
session_start();

if (isset($_POST['add'])) {
    include "config.php";

    $product_id = $_GET['id'];
    $id = $_SESSION['id'];

    $sql = mysqli_query($conn, "SELECT * FROM `cart` WHERE `cart`.`product_id` = '$product_id' AND id='$id' AND `cart`.`cart` = 'No';");
    $data = mysqli_fetch_array($sql);

    if (isset($data)) {
        $value = $_POST['jumlah'] + $data['value'];
        $sqlUp = "UPDATE `cart` SET `value`='$value' WHERE `cart`.`product_id` = '$product_id'";
        mysqli_query($conn, $sqlUp);
    } else {
        $value = $_POST['jumlah'];
        $sql = "INSERT INTO cart(product_id, value, id) VALUES ('$product_id','$value', '$id');";
        mysqli_query($conn, $sql);
    }
    header("Location: product_detail.php?id=$product_id");
} else {
    header("Location: products.php");
}
