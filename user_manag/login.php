<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> login-imgnest</title>
    <script src="https://kit.fontawesome.com/9139c1e78a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/style.css">
</head>
<style>
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
</style>
<body>
    <form action="" method="post" class="form-container">
        <h2>Login</h2>

        <input type="text" name="username" id="username" class="form-input" placeholder="username" required>

        <input type="password" name="password" id="password" class="form-input" placeholder="password" required>


        <input type="submit" value="Login" class="form-button">

        <a href="register.php" class="create-account">Create your Account <i class="fa-solid fa-arrow-right"></i></a>
    </form>
</body>
</html>