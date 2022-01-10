<?php

$server = "localhost";
$user = "root";
$pass = "manhek123*";
$database = "urayherd_admin";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
