<?php
include "config.php";
if (isset($_POST['submit'])) {

    $id = $_GET['id'];

    $sql = mysqli_query($conn, "SELECT * FROM `product` WHERE `product`.`item_id` = '$id' ");
    $data = mysqli_fetch_array($sql);
    $imagePro = $_FILES['my_image1']['name'];
    $imageCart = $_FILES['my_image2']['name'];

    if ($imagePro != "" && $imageCart != "") {
        $target1 = $_FILES['my_image1']['name'];
        $target2 = $_FILES['my_image1']['name'];

        $imagePro = $_FILES['my_image1']['name'];
        $imageCart = $_FILES['my_image2']['name'];
        move_uploaded_file($_FILES['my_image1']['tmp_name'], "./images/product/" . basename($_FILES['my_image1']['name']));
        move_uploaded_file($_FILES['my_image2']['tmp_name'], "./images/cart/" . basename($_FILES['my_image1']['name']));
        $loc = htmlentities($data['item_image'], ENT_QUOTES, 'UTF-8');
        unlink("./images/product/" . $loc);
        $loc = htmlentities($data['item_cart'], ENT_QUOTES, 'UTF-8');
        unlink("./cart/product/" . $loc);
    } else {
        $target1 = $data['item_image'];
        $target2 = $data['item_cart'];
    }

    $id1 = $_POST['id'];

    $type = $_POST['type'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    echo $id1;

    $sql = "UPDATE `product` SET `item_id`='$id1', `item_brand`='$type',`item_name`='$name',`item_price`='$price',`item_image`='$target1',`item_cart`='$target2',`description`='$description' WHERE `product`.`item_id` = $id;";
    mysqli_query($conn, $sql);

    header("Location: Product.php");
} else {
    header("Location: Product.php");
}
