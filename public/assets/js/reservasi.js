function showForm(event) {
    document.getElementById("dokterList").style.display = "none";
    document.getElementById("formReservasi").style.display = "block";
    document.getElementById("petunjukReservasi").style.display = "none";
    document.getElementById("tabelReservasi").style.display = "none"; // ⬅️ Tambahkan ini

    const card = event.target.closest(".dokter-card");
    const nama = card.querySelector("h3").innerText;
    const deskripsi = card.querySelector("p").innerText;
    const gambarSrc = card.querySelector("img").src;

    document.getElementById("namaDokter").innerText = nama;
    document.getElementById("deskripsiDokter").innerText = deskripsi;
    document.getElementById("gambarDokter").src = gambarSrc;
}

function handleKembali() {
    const form = document.getElementById("formReservasi");
    const dokterList = document.getElementById("dokterList");
    const petunjuk = document.getElementById("petunjukReservasi");

    if (form.style.display === "block") {
        form.style.display = "none";
        dokterList.style.display = "grid";
        petunjuk.style.display = "block";
        document.getElementById("tabelReservasi").style.display = "block"; // ⬅️ Tampilkan kembali tabel
    } else {
        window.location.href = "/";
    }
}

// === Logika kirim reservasi ===
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("formReservasiForm");

    // Fetch dan tampilkan data reservasi ke tabel
    fetch("/reservasi-data")
        .then((res) => res.json())
        .then((data) => {
            const tabel = document.getElementById("tabelReservasi");

            data.forEach((item, index) => {
                const row = document.createElement("div");
                row.className = "tabel-row";
                row.innerHTML = `
        <div>${index + 1}</div>
        <div>${item.nama_pasien}</div>
        <div>${item.dokter}</div>
        <div>${item.jenis_periksa}</div>
        <div>${item.jadwal}</div>
        <div>${item.status}</div>
    `;
                tabel.appendChild(row);
            });
        })
        .catch((err) => {
            console.error("Gagal ambil data reservasi:", err);
        });

    // Kirim data reservasi ke server
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const jadwal = document.getElementById("jadwal").value;
        const dokter = document.getElementById("namaDokter").innerText;

        fetch("/reservasi", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: JSON.stringify({
                jadwal: jadwal,
                dokter: dokter,
            }),
        })
            .then((res) => res.json())
            .then((data) => {
                if (data.success) {
                    alert("Reservasi berhasil disimpan!");
                    form.reset();
                    location.reload();
                } else {
                    alert("Gagal menyimpan reservasi.");
                }
            })
            .catch((err) => {
                console.error("Error:", err);
                alert("Terjadi kesalahan saat menyimpan.");
            });
    });
});
