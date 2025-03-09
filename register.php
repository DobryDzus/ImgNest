<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register | imgnest</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<div id="loginModal" class="register-form">
    <div class="modal-content form-container">
        <h2>Register</h2>
        <form action="includes/formhandler.inc.php" method="post">
            <input type="text" name="username" id="username" class="form-input" placeholder="username" required>
            <input type="password" name="pwd" id="pwd" class="form-input" placeholder="password" required>
            <input type="email" name="email" id="email" class="form-input" placeholder="email" required>
            <input type="submit" value="Register" class="form-button">
        </form>
    </div>
</div>
</body>
</html>