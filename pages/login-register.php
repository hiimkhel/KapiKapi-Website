<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="icon" type="image/png" href="../images/logo-nobg.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Comic+Neue&family=Quicksand:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
<title>KapiKapi Cafe</title>
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
            <label class="auth-label">Username</label>
            <input class="auth-input" type="text" name="username" required>
            <label class="auth-label">Password</label>
            <input class="auth-input" type="password" name="password" required>
            <button class="auth-btn" type="submit">Login</button>
        </form>

        <!-- REGISTER FORM -->
        <form id="authRegisterForm" class="auth-form auth-hidden">
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
            localStorage.setItem("user_id", json.user_id);
            localStorage.setItem("name", json.name);
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
            localStorage.setItem("user_id", json.user_id);
            localStorage.setItem("name", json.name);
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
