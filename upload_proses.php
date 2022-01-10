<?php

if (isset($_POST['submit']) && isset($_FILES['my_image1']) && isset($_FILES['my_image2'])) {
    include "config.php";

    $target1 = $_FILES['my_image1']['name'];
    $target2 = $_FILES['my_image1']['name'];

    $imagePro = $_FILES['my_image1']['name'];
    $imageCart = $_FILES['my_image2']['name'];

    $id = $_POST['id'];
    $type = $_POST['type'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "INSERT INTO `product`(`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_cart`, `description`) VALUES ('$id','$type','$name','$price','$target1','$target2','$description');";
    mysqli_query($conn, $sql);
    move_uploaded_file($_FILES['my_image1']['tmp_name'], "./images/product/" . basename($_FILES['my_image1']['name']));
    move_uploaded_file($_FILES['my_image2']['tmp_name'], "./images/cart/" . basename($_FILES['my_image1']['name']));
    header("Location: Product.php");
} else {
    header("Location: Product.php");
}
