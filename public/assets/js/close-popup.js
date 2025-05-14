function closePopup() {
    document.getElementById("popupOverlay").style.display = "none";
}

// Tutup popup jika klik di luar elemen popup
document.addEventListener("click", function (event) {
    const popup = document.getElementById("loginErrorPopup");
    const overlay = document.getElementById("popupOverlay");

    if (overlay && event.target === overlay) {
        closePopup();
    }
});

function closePopup() {
    const popup = document.getElementById("loginErrorPopup");
    const overlay = document.getElementById("popupOverlay");

    if (popup && overlay) {
        popup.classList.add("fadeOut");
        setTimeout(() => {
            overlay.style.display = "none";
        }, 300); // sesuai durasi animasi fadeOut
    }
}

function closeSuccessPopup() {
    const overlay = document.getElementById("popupOverlay");
    if (overlay) overlay.style.display = "none";
}

