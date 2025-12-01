<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>KapiKapi | Login & Register</title>
<link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<?php include("header.php") ?>

<main class="auth-page">
    <div class="auth-card">

        <img src="../images/logo.png" class="auth-icon" alt="capy icon">

        <h2>Welcome to KapiKapi</h2>
        <p class="auth-subtitle">Login or create an account</p>

        <!-- Tabs -->
        <div class="auth-tabs">
            <button class="auth-tab active" id="authLoginTab">Login</button>
            <button class="auth-tab" id="authRegisterTab">Register</button>
        </div>

        <!-- LOGIN FORM -->
        <form id="authLoginForm" class="auth-form">
            <label>Username</label>
            <input type="text" name="username" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>

        <!-- REGISTER FORM -->
        <form id="authRegisterForm" class="auth-form auth-hidden">
            <label>Username</label>
            <input type="text" name="username" required>
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <button type="submit">Create Account</button>
        </form>

    </div>
</main>

<?php include("footer.php") ?>

<script>
const loginTab = document.getElementById("authLoginTab");
const registerTab = document.getElementById("authRegisterTab");
const loginForm = document.getElementById("authLoginForm");
const registerForm = document.getElementById("authRegisterForm");

// Tab switch
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

// LOGIN
loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const data = new FormData(loginForm);

    try {
        const res = await fetch("login.php", { method: "POST", body: data });
        const json = await res.json();

        if (json.success) {
            alert(json.message);
            window.location.href = "../pages/index.php";
        } else {
            alert(json.error);
        }
    } catch (err) {
        console.error(err);
        alert("Login error");
    }
});

// REGISTER
registerForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const data = new FormData(registerForm);

    try {
        const res = await fetch("register.php", { method: "POST", body: data });
        const json = await res.json();

        if (json.success) {
            alert(json.message);
            window.location.href = "../pages/index.php";
        } else {
            alert(json.error);
        }
    } catch (err) {
        console.error(err);
        alert("Registration error");
    }
});
</script>
</body>
</html>
