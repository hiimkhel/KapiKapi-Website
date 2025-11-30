<?php
    session_start();

    // Get the current page filename
    $currentPage = basename($_SERVER['PHP_SELF']); // e.g., 'index.php' or 'main-menu.php'
?><header>
        <!-- Logo and Title-->
        <div class="header-logo">
            <img class="logo-img" src="../images/logo.png">
            <h2>KapiKapi</h2>
        </div>

        <!-- Navigation Menu-->
        <nav>
            <a href="./index.php" class="<?= ($currentPage == 'index.php') ? 'active' : '' ?>">Home</a>
            <a href="./main-menu.php" class="<?= ($currentPage == 'main-menu.php') ? 'active' : '' ?>">Menu</a>
            <a href="./about.php" class="<?= ($currentPage == 'about.php') ? 'active' : '' ?>">About</a>
            <a href="./contact.php" class="<?= ($currentPage == 'contact.php') ? 'active' : '' ?>">Contacts</a>
        </nav>
        <!-- Login & Register Button-->

        <div class="login-and-register-btn">
            <a class="transparent-btn header-btns" href="./login-register.php">Login</a>
            <a class="primary-btn header-btns" href="./login-register.php">Register</a>
        </div>
    </header>