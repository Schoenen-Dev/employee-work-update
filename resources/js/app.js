import "./bootstrap";
import "bootstrap/dist/js/bootstrap.bundle.min.js";
import "../css/app.css";

document.addEventListener("DOMContentLoaded", () => {
    const password = document.getElementById("password");
    const toggle = document.getElementById("togglePassword");

    if (password && toggle) {
        toggle.addEventListener("click", () => {
            if (password.type === "password") {
                password.type = "text";

                toggle.innerHTML = '<i class="bi bi-eye-slash"></i>';
            } else {
                password.type = "password";

                toggle.innerHTML = '<i class="bi bi-eye"></i>';
            }
        });
    }
});