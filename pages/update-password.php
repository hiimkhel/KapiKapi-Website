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
                <h1>🐾 Update Password</h1>
                <img src="../images/logo-nobg.png" alt="Capybara" class="capy-img">
                <h2>Change Your Password</h2>
                <p>Keep it safe and chill like a capybara. 🛋️☕</p>

                <?php
                if (isset($_SESSION['success'])) {
                    echo "<p class='success-msg'>".$_SESSION['success']."</p>";
                    unset($_SESSION['success']);
                }
                if (isset($_SESSION['error'])) {
                    echo "<p class='error-msg'>".$_SESSION['error']."</p>";
                    unset($_SESSION['error']);
                }
                ?>

                <form action="update-password-action.php" method="post" class="password-form">
                    <label>Current Password *</label>
                    <input type="password" name="current_password" required>

                    <label>New Password *</label>
                    <div class="password-wrapper">
                        <input type="password" name="new_password" required>
                        <button class="toggle-password">👁</button>
                    </div>

                    
                    <label>Confirm New Password *</label>
                    <div class="password-wrapper">
                        <input type="password" name="confirm_password" required>
                        <span class="toggle-password">👁</span>
                    </div>

                    <button type="submit" class="btn">Update Password</button>
                </form>

                <a href="profile.php" class="btn primary-btn">← Back to Profile</a>
            </div>
        </main>
            

        <?php include("./footer.php");?>
        <script src="../js/profile.js">
        </script>
    </body>
    </html>
