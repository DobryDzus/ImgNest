<?php

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];

    echo $username;

    require_once 'users_connect.php';

    $sql = "INSERT INTO users (username, pwd, email) VALUES ('$username', '$pwd', '$email');";

    if (mysqli_query($conn, $sql)){
        header("Location: ../confirmation.php");
    } else {
        echo "Chyba: " . $sql . "<br>" . mysqli_error($conn);
    }



} else {
    header("Location: ../index.php");
}
?>