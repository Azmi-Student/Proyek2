function togglePassword() {
    var passwordInput = document.getElementById("password");
    var eyeIcon = document.getElementById("eye-icon-svg");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.innerHTML = `
            <path d="M17.94 17.94A10.05 10.05 0 0 1 12 20c-7 0-11-8-11-8a18.76 18.76 0 0 1 3.17-4.77m3.61-2.86A9.66 9.66 0 0 1 12 4c7 0 11 8 11 8a18.61 18.61 0 0 1-1.74 2.73M9.88 9.88A3 3 0 1 1 12 12m0 0a3 3 0 0 1 3 3m-3 0a3 3 0 0 1-3-3"></path>
        `;
    } else {
        passwordInput.type = "password";
        eyeIcon.innerHTML = `
            <path d="M1 12S5 4 12 4s11 8 11 8-4 8-11 8S1 12 1 12z"></path>
            <circle cx="12" cy="12" r="3"></circle>
        `;
    }
}
