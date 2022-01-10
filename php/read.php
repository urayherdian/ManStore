<?php

include "database/config.php";

$sql = "SELECT * FROM kontak ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
