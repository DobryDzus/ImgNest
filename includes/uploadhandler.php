<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $error = "";
    require_once 'users_connect.php';

    $fileName = $_POST["fileName"];
    $tagsInput = $_POST["tags"];
    $file = $_FILES["file"];
    $userId = $_SESSION["user_id"];

    if (empty($fileName) || empty($tagsInput) || $file['error'] !== UPLOAD_ERR_OK) {
        $error = "Vyplňte všechna pole.";
    } else {
        $tagsArray = explode(" ", $tagsInput);
        $tag1 = isset($tagsArray[0]) ? $tagsArray[0] : null;
        $tag2 = isset($tagsArray[1]) ? $tagsArray[1] : null;
        $tag3 = isset($tagsArray[2]) ? $tagsArray[2] : null;

        $uploadDir = "../uploads/";
        $fileExtension = pathinfo($file["name"], PATHINFO_EXTENSION);
        $newFileDir = $uploadDir . $fileName .".". $fileExtension;

        if (move_uploaded_file($file["tmp_name"], $newFileDir)){
            $sql = "INSERT INTO gallery (imgDir, imgName, Tag1, Tag2, Tag3, users_id) VALUES ('$newFileDir', '$fileName', '$tag1', '$tag2', '$tag3', '$userId');";

            if (mysqli_query($conn, $sql)){
                header("Location: ../dashboard.php");
            } else {
                echo "Chyba: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            $error = "upload error.";
        }
}}
?>