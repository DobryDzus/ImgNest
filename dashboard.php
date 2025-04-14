<?php
session_start();

if (!isset($_SESSION["user_id"]) && !isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}


$username = htmlspecialchars($_SESSION['username']);
$user_id = htmlspecialchars($_SESSION['user_id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload | imgnest</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="https://kit.fontawesome.com/9139c1e78a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="srch-fltr-ordr">
        <form class="search-bar">
            <input type="text" class="search-input" placeholder="Search..." name="search">
            <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
        </form>
        <div class="filter-bar">
            filter
        </div>
        <div class="order-bar">
            order
        </div>
    </div>
    <div class="upper">
        <div class="loggedinas-text">
            logged in as: <span class="username"><?php echo $username . " <br>id: " . $user_id; ?></span>
        </div>
        <div class="logout-button">
            <a href="logout.php" class="link-nav">Logout</a>
        </div>
        <div>
            <h1>see what you've uploaded</h1>
        </div>
    </div>
    
    <div class="container">
        <button class="upload-area" id="openModal">
            click here for upload
        </button>
    </div>

    <!-- uploadModal-->
    <div id="uploadModal" class="modal">
        <div class="modal-content form-container">
            <span class="close">&times;</span>
            <h2>Upload</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="form-input" required>
                <img id="preview" src="#" alt="preview" style="display: none; border-radius: 0;">
                <input type="text" name="fileName" id="fileName" class="form-input" placeholder="File name" required>
                <div class="tags-input-wrapper" id="tagsWrapper">
                    <input type="text" name="tag1" class="tag" placeholder="Tag 1">
                    <input type="text" name="tag2" class="tag" placeholder="Tag 2">
                    <input type="text" name="tag3" class="tag" placeholder="Tag 3">
                </div>
                <div id="error-message" class="error-message">You can only add up to 3 tags.</div>
                <input type="submit" value="Upload" class="form-button">
            </form>
        </div>
    </div>
</body>
<script>
    const openModalButton = document.getElementById('openModal');
    const closeModalButton = document.getElementsByClassName('close')[0];
    const modal = document.getElementById('uploadModal');
    const modalContent = document.querySelector('.modal-content');
    const fileInput = document.getElementById('file');
    const preview = document.getElementById('preview');

    openModalButton.onclick = function () {
        modal.style.display = 'block';
        modalContent.classList.remove('hidden');
    };

    closeModalButton.onclick = function () {
        modalContent.classList.add('hidden');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 300); 
    };

    window.onclick = function (event) {
        if (event.target == modal) {
            modalContent.classList.add('hidden');
            setTimeout(() => {
                modal.style.display = 'none';
            }, 300); 
        }
    };

    fileInput.onchange = function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    };

</script>
</html>

<?php

$error = "";
require_once 'includes/users_connect.php';

$fileName = $_POST["fileName"];
$file = $_FILES["file"];
$tag1 = $_POST["tag1"];
$tag2 = $_POST["tag2"];
$tag3 = $_POST["tag3"];


if (empty($fileName)) {
    $error = "choose a file name.";
} elseif (empty($file)) {
    $error = "choose a file.";
}
 else {

    

    $uploadDir = "uploads/";
    $fileExtension = pathinfo($file["name"], PATHINFO_EXTENSION);
    $newFileDir = $uploadDir . $fileName .".". $fileExtension;

    if (move_uploaded_file($file["tmp_name"], $newFileDir)){
        $sql = "INSERT INTO gallery (imgDir, imgName, Tag1, Tag2, Tag3, users_id) VALUES ('$newFileDir', '$fileName', '$tag1', '$tag2', '$tag3', '$user_id');";

        if (mysqli_query($conn, $sql)){
            echo "UPLOADED SUCCESSFULLY!";
        } else {
            echo "Chyba: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        $error = "upload error.";
    }}


?>
