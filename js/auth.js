const loginTab = document.getElementById("authLoginTab");
const registerTab = document.getElementById("authRegisterTab");
const loginForm = document.getElementById("authLoginForm");
const registerForm = document.getElementById("authRegisterForm");

console.log("hatdog");
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

