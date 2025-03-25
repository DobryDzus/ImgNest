<?php
$server = "localhost";
$db_username = "root";
$password = "";
$db = "db";


$conn = mysqli_connect($server, $db_username, $password, $db);

if (!$conn) {
    die("nefunguje pripojeni: " . mysqli_connect_error());
} else {
    echo "pripojeno";
}
?>