<?php

$server = "localhost";
$user = "urayherd_manhek";
$pass = "manhek123*";
$database = "urayherd_admin";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
