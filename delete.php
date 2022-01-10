<?php

if (isset($_GET['id'])) {
    include "php/config.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);

    $sql = "DELETE FROM `users` WHERE `users`.`id` = $id;";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: index.php");
    } else {
        header("Location: index.php?error=unknown error occurred&$user_data");
    }
} else {
    header("Location: index.php");
}
