<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>imgnest</title>
    <script src="https://kit.fontawesome.com/9139c1e78a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <!-- Header -->
    <header>
    <nav class="navv">
        <a class="logo-nav" href="/"><img src="img/imgnestlogo.svg" alt="logo"></a>
        <div class="nav-right">
            <a class="link-nav" href="#">Support us</a>
            <a class="link-nav" href="#">Discord</a>
            <button class="upload-but link-nav" id="openModal">Upload <i class="fa-solid fa-upload"></i></button>
        </div>
    </nav>
    </header>

<!-- Modal -->
<div id="loginModal" class="modal">
    <div class="modal-content form-container">
        <span class="close">&times;</span>
        <h2>Login</h2>
        <form action="" method="post">
            <input type="text" name="username" id="username" class="form-input" placeholder="username" required>
            <input type="password" name="pwd" id="pwd" class="form-input" placeholder="password" required>
            <input type="submit" value="Login" class="form-button">
            <a href="register.php" class="create-account">Create your Account <i class="fa-solid fa-arrow-right"></i></a>
        </form>
    </div>
</div>
</body>
<script>
    const openModalButton = document.getElementById('openModal');
    const closeModalButton = document.getElementsByClassName('close')[0];
    const modal = document.getElementById('loginModal');

    openModalButton.onclick = function () {
        modal.style.display = 'block';
    };

    closeModalButton.onclick = function () {
        modal.style.display = 'none';
    };

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };
</script>
</html>