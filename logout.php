<?php
setcookie(session_name(), '', 100);
session_unset();
$_SESSION = array();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged out ✅</title>
    <link rel="stylesheet" href="style/style.css">
    <script>
        setTimeout(() => {
            window.location.href = "index.php";
        }, 5000); // Přesměrování po 5 sekundách
    </script>
</head>
<body>
<div id="loginModal" class="register-form">
    <div class="modal-content form-container">
        <h2>Logout</h2>
        <p style="color: white;">successfully logged out ✅</p>
        <p style="color: white;">in 5 seconds, you will be redirected to main page, or you can click</p>
        <p><a href="index.php" style="color: #f39c12;">here</a></p>
    </div>
</div>
</body>
</html>
<?php
exit();
?>