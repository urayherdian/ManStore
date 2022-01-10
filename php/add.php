<?php
if (isset($_POST['add'])) {
    echo "buset";
    include "./php/config.php";
    // function validate($data){
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }

    // $name = validate($_POST['name']);
    // $email = validate($_POST['email']);
    // $id = validate($_POST['id']);

    $product_id = htmlspecialchars($_POST['add']);


    if (empty($product_id)) {
        header("Location: ../cart.php");
    } else {
        $userid = 0;
        $cartid = 0;
        $sql = "INSERT INTO `cart`(`cart_id`, `user_id`, `item_id`) VALUES ('$cartid','$userid','$product_id')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: ../cart.php");
        } else {
            header("Location: ../cart.php");
        }
    }
}
