// ========== Fungsi Reusable ==========

// Tampilan 3 kolom kehamilan
function tampilkanInformasiKehamilan(data) {
    Swal.fire({
        title: "🍼 Informasi Kehamilan & Nutrisi",
        html: `
            <div style="display: flex; gap: 30px; text-align: left; font-size: 16px; max-height: 600px; overflow-y: auto;">
                <div style="flex: 1;">
                    <h3 style="font-size: 18px; font-weight: bold;">📄 Info Kehamilan</h3>
                    <p><strong>📅 Tanggal HPHT:</strong><br><span style="font-size: 17px; font-weight: bold;">${data.hphtDate.toLocaleDateString("id-ID")}</span></p>
                    <p><strong>⏳ Usia Kehamilan:</strong><br><span style="font-size: 20px; font-weight: bold; color: #d63384;">${data.minggu} Minggu ${data.hari} Hari</span></p>
                    <p><strong>👶 Perkiraan Lahir:</strong><br><span style="font-size: 18px; font-weight: bold;">${data.formattedDue}</span></p>
                    <p><strong>🌱 Trimester:</strong><br>Trimester ${data.trimester}</p>
                    <p><strong>📆 Bulan Ke:</strong><br>${data.bulan}</p>
                    <p><strong>📈 Hari Ke:</strong><br>${data.diffDays}</p>
                </div>
                <div style="flex: 1;">
                    <h3 style="font-size: 18px; font-weight: bold;">🥗 Panduan Nutrisi</h3>
                    <p><strong>📆 Hari ke-${data.diffDays}:</strong><br>Jaga pola makan dan tetap aktif.</p>
                    <p><strong>📅 Minggu ke-${data.minggu}:</strong><br>Pertahankan gizi seimbang dan tidur cukup.</p>
                    <p><strong>🗓️ Bulan ke-${data.bulan}:</strong><br>Rutin kontrol dan pantau kondisi tubuh.</p>
                    <p><strong>👶 Trimester ${data.trimester}:</strong><br>Fokus konsumsi asam folat, vitamin B, dan zat besi.</p>
                </div>
                <div style="flex: 1;">
                    <h3 style="font-size: 18px; font-weight: bold;">✅ Rekomendasi</h3>
                    <p><strong>🥦 Makanan Dianjurkan:</strong></p>
                    <ul style="margin-left: 20px;">
                        <li>Sayuran hijau</li>
                        <li>Kacang-kacangan</li>
                        <li>Buah segar</li>
                        <li>Daging tanpa lemak</li>
                    </ul>
                    <p><strong>⚠️ Makanan Dihindari:</strong></p>
                    <ul style="margin-left: 20px;">
                        <li>Makanan mentah</li>
                        <li>Minuman beralkohol</li>
                        <li>Kafein berlebihan</li>
                    </ul>
                </div>
            </div>
        `,
        width: 950,
        icon: "info",
        confirmButtonColor: "#e75480",
        confirmButtonText: "Oke",
    });
}

// Tampilan masa kehamilan selesai (minggu > 42)
function tampilkanFaseKelahiran(data) {
    Swal.fire({
        icon: "success",
        title: "🎉 Fase Kelahiran!",
        html: `<p>✅ Mama telah menyelesaikan seluruh fase kehamilan.</p><p><strong>Perkiraan Lahir:</strong><br>${data.formattedDue}</p><p style="font-size: 16px;">Selamat menanti buah hati dengan penuh cinta! 👶💖</p>`,
        confirmButtonColor: "#e75480",
        confirmButtonText: "Oke",
    });
}

// Tampilan simulasi HPHT di masa depan
function tampilkanSimulasiKehamilan(data) {
    Swal.fire({
        icon: "info",
        title: "🔮 Simulasi Kehamilan",
        html: `<p>HPHT yang dipilih adalah di masa depan:</p><p><strong>${data.hphtDate.toLocaleDateString("id-ID")}</strong></p><hr><p>Jika HPHT ini terjadi, prediksi tanggal lahir adalah:</p><p style="font-size: 18px; font-weight: bold;">👶 ${data.formattedDue}</p><p style="font-size: 14px;">Ini adalah simulasi. Belum bisa menghitung usia kehamilan karena HPHT belum terjadi.</p>`,
        confirmButtonColor: "#e75480",
        confirmButtonText: "Oke, Simulasi Menarik!",
    });
}

function updateDeskripsiKehamilan(trimester, minggu) {
    const deskripsiEl = document.getElementById("deskripsiKehamilan");
    if (!deskripsiEl) return;

    if (minggu > 42) {
        deskripsiEl.textContent = "Mama telah menyelesaikan seluruh fase kehamilan. Selamat menanti kehadiran si kecil dengan penuh cinta. 👶💖";
    } else {
        deskripsiEl.textContent = trimester === 1 ? "Mama sedang berada dalam trimester pertama. Perbanyak istirahat, konsumsi asam folat, dan jaga kondisi tubuh ya. 🌱" :
                                trimester === 2 ? "Mama telah memasuki trimester kedua. Jaga pola makan dan mulai rutin kontrol ke dokter. 💪" :
                                "Mama berada di trimester ketiga. Perhatikan gerakan janin dan persiapkan proses persalinan. 🍼";
    }
}

function updateUI(data) {
    document.querySelector(".judul-usia-kehamilan").textContent = "Usia Kehamilan";
    document.querySelector(".tanggal-kehamilan").textContent = `Tanggal HPHT: ${data.hphtDate.toLocaleDateString("id-ID")}`;
    document.querySelector(".angka-besar").textContent = `${data.minggu} Minggu ${data.hari} Hari`;
    document.querySelector(".trimester-text").textContent = `Trimester ${data.trimester}`;
    document.querySelector(".bulan-kehamilan").textContent = `Bulan ke ${data.bulan}`;
    document.querySelector(".hari-kehamilan").textContent = `Hari ke ${data.diffDays}`;
    document.getElementById("btnLihatInformasi").style.display = "inline-block";
    updateDeskripsiKehamilan(data.trimester, data.minggu);

    const updateSlider = (selector, value, max) => {
        const slider = document.querySelector(selector);
        const group = slider.closest(".progress-group");
        slider.value = Math.min(value, max);
        group.querySelector(".progress-fill").style.width = `${(value / max) * 100}%`;
        group.querySelector(".progress-icon").style.left = `calc(${(value / max) * 100}% - 12px)`;
        group.querySelector(".current-val").textContent = slider.value;
    };

    updateSlider(".progress-slider.minggu", data.minggu, 42);
    updateSlider(".progress-slider.trimester", data.trimester, 3);
}

function bukaInputKehamilan() {
    Swal.fire({
        title: "📅 Data Awal Kehamilan",
        html: `<input id="inputTanggalHPHT" type="text" placeholder="📅 Pilih Tanggal HPHT" style="padding: 12px; width: 100%; font-size: 16px;" readonly>`,
        background: "#ffe6ec",
        confirmButtonColor: "#e75480",
        denyButtonColor: "#f9c4d2",
        cancelButtonColor: "#d33",
        focusConfirm: false,
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "💾 Simpan Data",
        denyButtonText: "❌ Tutup",
        cancelButtonText: "🏠 Kembali ke Home",
        didOpen: () => {
            flatpickr("#inputTanggalHPHT", {
                dateFormat: "d-m-Y",
                disableMobile: true
            });
        },
        preConfirm: () => {
            const tanggal = document.getElementById("inputTanggalHPHT").value;
            if (!tanggal) {
                Swal.showValidationMessage("🛑 Tanggal HPHT wajib diisi.");
            }

            const [day, month, year] = tanggal.split("-").map(Number);
            const hphtDate = new Date(year, month - 1, day);
            const today = new Date();
            if (hphtDate > today) {
                const dueDate = new Date(hphtDate);
                dueDate.setDate(dueDate.getDate() + 280);
                tampilkanSimulasiKehamilan({ hphtDate, formattedDue: dueDate.toLocaleDateString("id-ID") });
                return false;
            }
            return tanggal;
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const [day, month, year] = result.value.split("-").map(Number);
            const hphtDate = new Date(year, month - 1, day);
            const today = new Date();
            const diffTime = today - hphtDate;
            const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
            const minggu = Math.floor(diffDays / 7);
            const hari = diffDays % 7;
            const bulan = Math.floor(minggu / 4) + 1;
            const trimester = minggu <= 13 ? 1 : minggu <= 27 ? 2 : 3;

            const dueDate = new Date(hphtDate);
            dueDate.setDate(dueDate.getDate() + 280);
            const formattedDue = dueDate.toLocaleDateString("id-ID");

            const data = { hphtDate, minggu, hari, bulan, trimester, diffDays, formattedDue };
            window.latestKehamilanData = data;

            tampilkanInformasiKehamilan(data);
            updateUI(data);

            fetch("/kehamilan", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    hpht: `${year}-${String(month).padStart(2, "0")}-${String(day).padStart(2, "0")}`
                })
            })
            .then(res => res.json())
            .then(res => {
                if (!res.success) {
                    console.error("Gagal simpan:", res);
                }
            })
            .catch(console.error);
        }
    });
}

// ========== Saat Halaman Siap ==========
document.addEventListener("DOMContentLoaded", function () {
    fetch("/kehamilan")
        .then(res => res.json())
        .then(data => {
            if (data && data.hpht) {
                const [year, month, day] = data.hpht.split("-").map(Number);
                const hphtDate = new Date(year, month - 1, day);
                const today = new Date();
                const diffTime = today - hphtDate;
                const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
                const minggu = Math.floor(diffDays / 7);
                const hari = diffDays % 7;
                const bulan = Math.floor(minggu / 4) + 1;
                const trimester = minggu <= 13 ? 1 : minggu <= 27 ? 2 : 3;
                const dueDate = new Date(hphtDate);
                dueDate.setDate(dueDate.getDate() + 280);
                const formattedDue = dueDate.toLocaleDateString("id-ID");

                const hasil = { hphtDate, minggu, hari, bulan, trimester, diffDays, formattedDue };
                window.latestKehamilanData = hasil;
                tampilkanInformasiKehamilan(hasil);
                updateUI(hasil);
            } else {
                bukaInputKehamilan();
            }
        });

    document.getElementById("btnEditData").addEventListener("click", bukaInputKehamilan);
    document.getElementById("btnLihatInformasi").addEventListener("click", () => {
        const data = window.latestKehamilanData;
        if (!data) return;
        const today = new Date();
        if (data.hphtDate > today) return tampilkanSimulasiKehamilan(data);
        if (data.minggu > 42) return tampilkanFaseKelahiran(data);
        tampilkanInformasiKehamilan(data);
    });
});

// ========== Inisialisasi Slider ==========
document.querySelectorAll(".progress-group").forEach((group) => {
    const slider = group.querySelector(".progress-slider");
    const fill = group.querySelector(".progress-fill");
    const icon = group.querySelector(".progress-icon");
    const text = group.querySelector(".current-val");
    const max = parseInt(slider.max);

    const updateProgress = () => {
        const val = parseInt(slider.value);
        const percent = (val / max) * 100;
        fill.style.width = `${percent}%`;
        icon.style.left = `calc(${percent}% - 12px)`;
        text.textContent = val;
    };

    updateProgress();
    slider.addEventListener("input", updateProgress);
});