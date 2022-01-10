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

    $sql = "DELETE FROM `cart` WHERE `cart`.`id` = $id;";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: checkout.php");
    } else {
        header("Location: checkout.php?error=unknown error occurred&$user_data");
    }
} else {

    header("Location: checkout.php");
}
