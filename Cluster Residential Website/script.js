document.getElementById("toggle-signup").addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById("login-form").style.display = "none";
    document.getElementById("signup-form").style.display = "block";
    document.getElementById("form-title").textContent = "Sign Up";
});

document.getElementById("toggle-login").addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById("signup-form").style.display = "none";
    document.getElementById("login-form").style.display = "block";
    document.getElementById("form-title").textContent = "Login";
});