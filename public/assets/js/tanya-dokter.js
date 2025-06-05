document.querySelectorAll(".doctor-item").forEach(function (doctorItem) {
    doctorItem.addEventListener("click", function () {
        // Menghapus kelas 'active' dari semua item dokter
        document.querySelectorAll(".doctor-item").forEach(function (item) {
            item.classList.remove("active");
        });

        // Menambahkan kelas 'active' pada dokter yang dipilih
        doctorItem.classList.add("active");

        // Menampilkan panel chat
        var doctorName = doctorItem.querySelector(".doctor-name").textContent;
        document.getElementById("doctor-name").textContent =
            "Chat dengan Dr. " + doctorName;
        document.getElementById("chat-panel").style.display = "flex"; // Menampilkan chat panel

        // Ambil ID dokter dari atribut data-id
        var doctorId = doctorItem.getAttribute("data-id");

        // Mengirim pesan menggunakan ID dokter yang dipilih
        document.getElementById("send-message").addEventListener("click", function () {
            var message = document.getElementById("chat-message").value;
            if (message) {
                var chatBody = document.getElementById("chat-body");
                var newMessage = document.createElement("div");
                newMessage.classList.add("chat-message");
                newMessage.textContent = "You: " + message;
                chatBody.appendChild(newMessage);
                chatBody.scrollTop = chatBody.scrollHeight; // Scroll ke bawah otomatis

                // Mengosongkan input pesan
                document.getElementById("chat-message").value = "";

                // Kirim pesan ke server menggunakan AJAX
                fetch(`/chat/store/${doctorId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        message: message
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Pesan terkirim:', data);
                })
                .catch(error => console.error('Error:', error));
            }
        });
    });
});

// Menutup panel chat
document
    .getElementById("close-chat-btn")
    .addEventListener("click", function () {
        document.getElementById("chat-panel").style.display = "none";
    });
