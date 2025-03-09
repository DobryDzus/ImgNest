<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "db";


$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
    die("nefunguje pripojeni: " . mysqli_connect_error());
} else {
    echo "pripojeno";
}
?>