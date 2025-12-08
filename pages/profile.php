<?php
include("header.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: login-register.php");
    exit;
}?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="icon" type="image/png" href="../images/logo-nobg.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Comic+Neue&family=Quicksand:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
        <title>KapiKapi Cafe</title>
    </head>
    <body> 

           <main class="profile-page">

                <div class="profile-card">
                    <h1>🐾 My Profile</h1>
                    <img src="../images/logo-nobg.png" alt="Capybara" class="capy-img">
                    <h2>Welcome, <?= htmlspecialchars($_SESSION['name']) ?>!</h2>
                    <p>Manage your account settings below. Keep it chill like a capybara. 🛋️☕</p>

                    <div class="profile-actions">
                        <a href="update-password.php" class="btn">Update Password</a>
                        <a href="delete-account.php" class="btn delete-btn" onclick="return confirm('Are you sure you want to delete your account? This cannot be undone.')">Delete Account</a>
                    </div>
                </div>
</main>
            

        <?php include("./footer.php");?>
    </body>
    </html>
