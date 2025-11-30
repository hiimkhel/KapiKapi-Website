<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KapiKapi | Login</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php include("header.php")?>

<main class="auth-page">
    <div class="auth-card">

        <img src="images/capylogo.png" class="auth-icon" alt="capy icon">

        <h2>Welcome to KapiKapi</h2>
        <p class="auth-subtitle">Login to start your lazy doze</p>

        <!-- Tabs -->
        <div class="auth-tabs">
            <button class="auth-tab active" id="authLoginTab">Login</button>
            <button class="auth-tab" id="authRegisterTab">Register</button>
        </div>

        <!-- LOGIN FORM -->
        <form action="php/login.php" method="POST" class="auth-form" id="authLoginForm">
            <label class="auth-label">Username</label>
            <input class="auth-input" type="text" name="username" required>

            <label class="auth-label">Password</label>
            <input class="auth-input" type="password" name="password" required>

            <button class="auth-btn" type="submit">Login</button>
            <p class="auth-note">Customers only. No capybaras allowed behind the counter.</p>
        </form>

        <!-- REGISTER FORM -->
        <form action="php/register.php" method="POST" class="auth-form auth-hidden" id="authRegisterForm">
            <label class="auth-label">Username</label>
            <input class="auth-input" type="text" name="username" required>

            <label class="auth-label">Email</label>
            <input class="auth-input" type="email" name="email" required>

            <label class="auth-label">Password</label>
            <input class="auth-input" type="password" name="password" required>

            <button class="auth-btn" type="submit">Create Account</button>
        </form>

    </div>
</main>


    <?php include("footer.php")?>

<script>
    // Tab switching
    const loginTab = document.getElementById("authLoginTab");
    const registerTab = document.getElementById("authRegisterTab");
    const loginForm = document.getElementById("authLoginForm");
    const registerForm = document.getElementById("authRegisterForm");

    loginTab.onclick = () => {
        loginTab.classList.add("active");
        registerTab.classList.remove("active");
        loginForm.classList.remove("auth-hidden");
        registerForm.classList.add("auth-hidden");
    };

    registerTab.onclick = () => {
        registerTab.classList.add("active");
        loginTab.classList.remove("active");
        loginForm.classList.add("auth-hidden");
        registerForm.classList.remove("auth-hidden");
    };
</script>