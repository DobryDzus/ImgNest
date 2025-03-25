<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "db";


$conn = mysqli_connect($server, $user, $password, $db);

if (!$conn) {
    die("nefunguje pripojeni: " . mysqli_connect_error());
} else {
    echo "pripojeno";
}
?>