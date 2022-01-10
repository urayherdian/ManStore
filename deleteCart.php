<?php
session_start();

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
    $id_member = $_SESSION['id'];
    $sql = "DELETE FROM `cart` WHERE `cart`.`product_id` = $id AND `cart`.`id` = $id_member AND `cart`.`cart` = 'No';";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: cart.php");
    } else {
        header("Location: cart.php?error=unknown error occurred&$user_data");
    }
} else {
    header("Location: cart.php");
}
