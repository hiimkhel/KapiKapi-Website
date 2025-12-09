<?php
session_start();
$loggedIn = isset($_SESSION['user_id']); // server-side login check

// Get current page to highlight active nav link
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<header>
    <!-- Logo -->
    <div class="header-logo">
        <img class="logo-img" src="../images/logo.png">
        <h2>KapiKapi</h2>
    </div>

    <!-- Navigation -->
    <nav class="nav-links">
        <a href="./index.php" class="<?= ($currentPage == 'index.php') ? 'active' : '' ?>">Home</a>
        <a href="./main-menu.php" class="<?= ($currentPage == 'main-menu.php') ? 'active' : '' ?>">Menu</a>
        <a href="./about.php" class="<?= ($currentPage == 'about.php') ? 'active' : '' ?>">About</a>
        <a href="./contact.php" class="<?= ($currentPage == 'contact.php') ? 'active' : '' ?>">Contacts</a>
    </nav>

    <!-- Login/Register or Logout -->
    <div class="login-and-register-btn">
        <?php if (!$loggedIn): ?>
            <a class="transparent-btn header-btns" href="./login-register.php">Login</a>
            <a class="primary-btn header-btns" href="./login-register.php">Register</a>
        <?php else: ?>
            <a class="primary-btn" href="profile.php">Profile</a>
            <form method="post" action="logout.php" style="display:inline;">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
            
        <?php endif; ?>
    </div>

     <!-- Burger Menu Button -->
    <button class="burger-btn" id="burger-btn">
        <span></span>
        <span></span>
        <span></span>
    </button>
</header>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu hidden" id="mobile-menu">
    <nav>
        <a href="./index.php" class="<?= ($currentPage == 'index.php') ? 'active' : '' ?>">Home</a>
        <a href="./main-menu.php" class="<?= ($currentPage == 'main-menu.php') ? 'active' : '' ?>">Menu</a>
        <a href="./about.php" class="<?= ($currentPage == 'about.php') ? 'active' : '' ?>">About</a>
        <a href="./contact.php" class="<?= ($currentPage == 'contact.php') ? 'active' : '' ?>">Contacts</a>
        <?php if (!$loggedIn): ?>
            <a class="transparent-btn" href="./login-register.php">Login</a>
            <a class="primary-btn" href="./login-register.php">Register</a>
        <?php else: ?>
            <a class="primary-btn" href="profile.php">Profile</a>
            <form method="post" action="logout.php">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        <?php endif; ?>
    </nav>
</div>


<script>
    // Pass PHP session status to JS
    const isLoggedIn = <?= $loggedIn ? 'true' : 'false'; ?>;
    
    if (isLoggedIn) {
    const deleteBtn = document.getElementById('delete-account-btn');

    deleteBtn.addEventListener('click', () => {
        const confirmed = confirm("Are you sure you want to delete your account? This action cannot be undone.");
        if (confirmed) {
            fetch('../pages/delete-account.php', { 
                method: 'POST',
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(data => {
                if(data.success){
                    alert("Your account has been deleted.");
                    window.location.href = "./index.php"; 
                } else {
                    alert("Failed to delete account. " + (data.message || ""));
                }
            })
            .catch(err => console.error('Delete account error:', err));
        }
    });

}
const burgerBtn = document.getElementById('burger-btn');
const mobileMenu = document.getElementById('mobile-menu');

burgerBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('show');
    burgerBtn.classList.toggle('open');
});

</script>
