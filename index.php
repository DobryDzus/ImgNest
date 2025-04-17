<?php
session_start();
require 'includes/users_connect.php';

$obrazky = "SELECT gallery.imgDir, gallery.imgName, users.username FROM gallery JOIN users ON gallery.users_id = users.id";
$obrazkyV = mysqli_query($conn, $obrazky);

if (!$obrazkyV) {
    die("chyba: " . mysqli_error($conn));
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once 'includes/users_connect.php';
    $error ="";
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    if (empty($username) or empty($pwd)) {
        $error = 'fill out.';
    } else {
        $sql = "SELECT id, username, pwd FROM users";
        $result = mysqli_query($conn, $sql);

        $found = false;

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['username'] == $username and $row['pwd'] == $pwd) {
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    header('Location: dashboard.php');
                    exit();
                }
            }
            $error = 'invalid username or password.';
        } else {
            $error = 'no data found.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>imgnest</title>
    <script src="https://kit.fontawesome.com/9139c1e78a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://unpkg.com/bricklayer/dist/bricklayer.css">
    <script src="https://unpkg.com/bricklayer/dist/bricklayer.js"></script> <!-- https://github.com/ademilter/bricklayer | dela layout galerie -->
    <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@19.1.3/dist/lazyload.min.js"></script> <!-- https://github.com/verlok/vanilla-lazyload | lazyload -->
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script> <!--snad fix problemu layoutu a lazyloadu-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/2.0.9/venobox.min.css" /> <!-- https://github.com/nicolafranchini/VenoBox | venobox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/venobox/2.0.9/venobox.min.js"></script> <!-- https://github.com/nicolafranchini/VenoBox | venobox -->


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
        <h2>login</h2>
        <?php if (!empty($error)): ?>
            <p style="color: red;\"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="post">
            <input type="text" name="username" id="username" class="form-input" placeholder="username" required>
            <input type="password" name="pwd" id="pwd" class="form-input" placeholder="password" required>
            <input type="submit" value="Login" class="form-button">
            <a href="register.php" class="create-account">Create your Account <i class="fa-solid fa-arrow-right"></i></a>
        </form>
    </div>
</div>
<div class="srch-fltr">
        <form class="search-bar">
            <input type="text" class="search-input" placeholder="Search..." name="search">
            <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
        </form>
        <div class="filter-bar">
            filter
        </div>
    </div>
<h1 class="nadpis">see what other users uploaded</h1>
<div class="main-container">
    <div class="bricklayer">
            <?php
            if (mysqli_num_rows($obrazkyV) > 0) {
                while ($row = mysqli_fetch_assoc($obrazkyV)) {
                    echo '<div class="image-container">';
                    echo '<a class="venobox" data-gall="gallery" data-title="' . htmlspecialchars($row["imgName"]) . ' @ ' . htmlspecialchars($row["username"]) . '" href="' . htmlspecialchars($row["imgDir"]) . '">';
                    echo '<img class="lazy" data-src="' . htmlspecialchars($row["imgDir"]) . '" alt="' . htmlspecialchars($row["imgName"]) . '">';
                    echo '<p>' . htmlspecialchars($row["imgName"]) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>no images uploaded yet.</p>';
            }
            ?>
    </div>
</div>


</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Bricklayer(document.querySelector('.bricklayer'));
    }); // nastaveni layoutu //
    document.addEventListener('DOMContentLoaded', function () {
        new VenoBox({
            selector: '.venobox',
            fitView: true,
            navigation: false,
            titleattr: 'data-title',
            titlePosition: 'top',
            titleStyle: 'bar',
        });
    }); //venobox nastaveni //
    const openModalButton = document.getElementById('openModal');
    const closeModalButton = document.getElementsByClassName('close')[0];
    const modal = document.getElementById('loginModal');
    const lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy"
    }); // nacteni lazy loadingu //

    openModalButton.onclick = function () { 
        fetch('check_login.php')
            .then(response => response.json())
            .then(data => {
                if (data.logged_in) {
                    window.location.href = 'dashboard.php';
                } else {
                    modal.style.display = 'block';
                }
            })
            .catch(error => console.error('error:', error));
    } // kontrola prihlaseni //

    closeModalButton.onclick = function () {
        modal.style.display = 'none';
    }; // vypnuti modal //

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }; // zavreni modal pri kliku mimo nej //
</script>
</html>