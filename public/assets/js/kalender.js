// ========== Fungsi Reusable ==========

// Tampilan 3 kolom kehamilan
function tampilkanInformasiKehamilan(data) {
    fetch(
        `/api/nutrisi?trimester=${data.trimester}&bulan=${data.bulan}&minggu=${data.minggu}&hari=${data.diffDays}`
    )
        .then((res) => res.json())
        .then((nutrisi) => {
            if (nutrisi.selesai) return tampilkanFaseKelahiran(data);

            const rekomendasiList = nutrisi.rekomendasi
                .map((item) => `<li>${item}</li>`)
                .join("");
            const hindariList = nutrisi.hindari
                .map((item) => `<li>${item}</li>`)
                .join("");

            Swal.fire({
                title: "🍼 Informasi Kehamilan & Nutrisi",
                html: `
                    <div style="display: flex; gap: 30px; text-align: left; font-size: 16px; max-height: 600px; overflow-y: auto;">
                        <div style="flex: 1;">
                            <h3 style="font-size: 18px; font-weight: bold;">📄 Info Kehamilan</h3>
                            <p><strong>📅 Tanggal HPHT:</strong><br><span style="font-size: 17px; font-weight: bold;">${data.hphtDate.toLocaleDateString(
                                "id-ID"
                            )}</span></p>
                            <p><strong>⏳ Usia Kehamilan:</strong><br><span style="font-size: 20px; font-weight: bold; color: #d63384;">${
                                data.minggu
                            } Minggu ${data.hari} Hari</span></p>
                            <p><strong>👶 Perkiraan Lahir:</strong><br><span style="font-size: 18px; font-weight: bold;">${
                                data.formattedDue
                            }</span></p>
                            <p><strong>🌱 Trimester:</strong><br>Trimester ${
                                data.trimester
                            }</p>
                            <p><strong>📆 Bulan Ke:</strong><br>${
                                data.bulan
                            }</p>
                            <p><strong>📈 Hari Ke:</strong><br>${
                                data.diffDays
                            }</p>
                        </div>
                        <div style="flex: 1;">
                            <h3 style="font-size: 18px; font-weight: bold;">🥗 Panduan Nutrisi</h3>
                            <p><strong>📆 Hari ke-${
                                data.diffDays
                            }:</strong><br>${nutrisi.harian}</p>
                            <p><strong>📅 Minggu ke-${
                                data.minggu
                            }:</strong><br>${nutrisi.mingguan}</p>
                            <p><strong>🗓️ Bulan ke-${data.bulan}:</strong><br>${
                    nutrisi.bulanan
                }</p>
                            <p><strong>👶 Trimester ${
                                data.trimester
                            }:</strong><br>${nutrisi.panduan_trimester}</p>
                        </div>
                        <div style="flex: 1;">
                            <h3 style="font-size: 18px; font-weight: bold;">✅ Rekomendasi</h3>
                            <p><strong>🥦 Makanan Dianjurkan:</strong></p>
                            <ul style="margin-left: 20px;">${rekomendasiList}</ul>
                            <p><strong>⚠️ Makanan Dihindari:</strong></p>
                            <ul style="margin-left: 20px;">${hindariList}</ul>
                        </div>
                    </div>
                `,
                width: 950,
                icon: "info",
                confirmButtonColor: "#e75480",
                confirmButtonText: "Oke",
            });
        })
        .catch((err) => {
            console.error("❌ Gagal mengambil data nutrisi:", err);
            Swal.fire({
                icon: "error",
                title: "Gagal memuat data nutrisi",
                text: "Terjadi kesalahan saat menghubungi server.",
            });
        });
}


// Tampilan masa kehamilan selesai (minggu > 42)
function tampilkanFaseKelahiran(data) {
    Swal.fire({
        icon: "success",
        title: "🎉 Fase Kelahiran!",
        html: `
            <p>✅ Mama telah menyelesaikan seluruh fase kehamilan.</p>
            <p><strong>Perkiraan Lahir:</strong><br>${data.formattedDue}</p>
            <br>
            <p style="font-size: 16px;">Selamat menanti buah hati dengan penuh cinta! 👶💖</p>
        `,
        confirmButtonColor: "#e75480",
        confirmButtonText: "Oke",
    });
}

// Tampilan simulasi HPHT di masa depan
function tampilkanSimulasiKehamilan(data) {
    Swal.fire({
        icon: "info",
        title: "🔮 Simulasi Kehamilan",
        html: `
            <p>HPHT yang dipilih adalah di masa depan:</p>
            <p><strong>${data.hphtDate.toLocaleDateString("id-ID")}</strong></p>
            <hr>
            <p>Jika HPHT ini terjadi, prediksi tanggal lahir adalah:</p>
            <p style="font-size: 18px; font-weight: bold;">👶 ${
                data.formattedDue
            }</p>
            <br>
            <p style="font-size: 14px;">Ini adalah simulasi. Belum bisa menghitung usia kehamilan karena HPHT belum terjadi.</p>
        `,
        confirmButtonColor: "#e75480",
        confirmButtonText: "Oke, Simulasi Menarik!",
    });
}

// ========== Inisialisasi Slider Progress ==========
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

// ========== Buka Popup Input HPHT ==========
function bukaInputKehamilan() {
    Swal.fire({
        title: "📅 Data Awal Kehamilan",
        html: `
            <div style="text-align: left; font-size: 14px; margin-bottom: 15px;">
                <strong>Apa itu HPHT?</strong><br>
                HPHT adalah <em>Hari Pertama Haid Terakhir</em>, digunakan untuk memperkirakan usia kehamilan dan tanggal persalinan. 🌸
            </div>
            <input id="inputTanggalHPHT" type="text" placeholder="📅 Pilih Tanggal HPHT"
                style="
                    background-color: #FFB6C1;
                    color: #000;
                    font-weight: 600;
                    padding: 12px 24px;
                    border: none;
                    border-radius: 8px;
                    font-size: 16px;
                    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
                    cursor: pointer;
                    width: auto;
                    text-align: center;
                "
                readonly
            >
        `,
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
            const today = new Date();
            const minYear = today.getFullYear() - 5;
            const maxYear = today.getFullYear() + 5;

            flatpickr("#inputTanggalHPHT", {
                dateFormat: "d-m-Y",
                minDate: `01-01-${minYear}`,
                maxDate: `31-12-${maxYear}`,
                disableMobile: true,
                allowInput: false,
                onReady: function (selectedDates, dateStr, instance) {
                    const yearInput = instance.currentYearElement;
                    const currentYear = parseInt(yearInput.value);
                    const select = document.createElement("select");

                    for (let y = minYear; y <= maxYear; y++) {
                        const option = document.createElement("option");
                        option.value = y;
                        option.text = y;
                        if (y === currentYear) option.selected = true;
                        select.appendChild(option);
                    }

                    select.addEventListener("change", () => {
                        instance.changeYear(parseInt(select.value));
                    });

                    yearInput.parentNode.replaceChild(select, yearInput);
                },
            });
        },
        preConfirm: () => {
            const tanggal = document.getElementById("inputTanggalHPHT").value;
            if (!tanggal) {
                Swal.showValidationMessage("🛑 Tanggal HPHT wajib diisi.");
                return false;
            }

            const [day, month, year] = tanggal.split("-").map(Number);
            const hphtDate = new Date(year, month - 1, day);
            const today = new Date();

            if (isNaN(hphtDate.getTime())) {
                Swal.showValidationMessage("❌ Format tanggal tidak valid.");
                return false;
            }

            if (hphtDate > today) {
                const dueDateSimulasi = new Date(hphtDate);
                dueDateSimulasi.setDate(dueDateSimulasi.getDate() + 280);
                const formattedDue = dueDateSimulasi.toLocaleDateString(
                    "id-ID",
                    {
                        year: "numeric",
                        month: "long",
                        day: "numeric",
                    }
                );

                const userKey = `hpht_user_${window.currentUserId}`;
                localStorage.removeItem(userKey);

                // Kosongkan UI
                window.latestKehamilanData = null;
                document.getElementById("btnLihatInformasi").style.display =
                    "none";
                resetUIKehamilan();

                tampilkanSimulasiKehamilan({ hphtDate, formattedDue });
                return false;
            }

            return tanggal;
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const [day, month, year] = result.value.split("-").map(Number);
            const hphtDate = new Date(year, month - 1, day);
            // Di dalam result.isConfirmed
            fetch("/kehamilan", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                body: JSON.stringify({
                    hpht: `${year}-${String(month).padStart(2, "0")}-${String(
                        day
                    ).padStart(2, "0")}`,
                }),
            })
                .then((res) => res.json())
                .then((res) => {
                    if (!res.success) {
                        Swal.fire(
                            "Gagal!",
                            res.message || "Data tidak valid.",
                            "error"
                        );
                    } else {
                        // Simpan ke localStorage agar tidak muncul popup lagi
                        if (hphtDate <= today) {
                            const hphtString = `${year}-${String(
                                month
                            ).padStart(2, "0")}-${String(day).padStart(
                                2,
                                "0"
                            )}`;
                            const userKey = getUserKey();
                            if (!userKey) return;

                            localStorage.setItem(userKey, hphtString);
                        } else {
                            const userKey = getUserKey();
                            if (!userKey) return;

                            localStorage.removeItem(userKey);
                        }
                    }
                })
                .catch((err) => {
                    console.error("Fetch error:", err);
                });

            const today = new Date();

            const diffTime = today.getTime() - hphtDate.getTime();
            const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
            const minggu = Math.floor(diffDays / 7);
            const hari = diffDays % 7;
            const bulan = Math.floor(minggu / 4) + 1;
            const trimester = minggu <= 13 ? 1 : minggu <= 27 ? 2 : 3;

            const dueDate = new Date(hphtDate);
            dueDate.setDate(dueDate.getDate() + 280);
            const formattedDue = dueDate.toLocaleDateString("id-ID", {
                year: "numeric",
                month: "long",
                day: "numeric",
            });

            const data = {
                hphtDate,
                minggu,
                hari,
                bulan,
                trimester,
                diffDays,
                formattedDue,
            };
            window.latestKehamilanData = data;

            document.getElementById("btnLihatInformasi").style.display =
                "inline-block";

            if (minggu > 42) {
                tampilkanFaseKelahiran(data);
            } else {
                tampilkanInformasiKehamilan(data);
            }

            // Update tampilan slider dan info UI
            document.querySelector(".judul-usia-kehamilan").textContent =
                "Usia Kehamilan";
            document.querySelector(
                ".tanggal-kehamilan"
            ).textContent = `Tanggal HPHT: ${hphtDate.toLocaleDateString(
                "id-ID"
            )}`;
            document.querySelector(
                ".angka-besar"
            ).textContent = `${minggu} Minggu ${hari} Hari`;
            document.querySelector(
                ".trimester-text"
            ).textContent = `Trimester ${trimester}`;
            document.querySelector(
                ".bulan-kehamilan"
            ).textContent = `Bulan ke ${bulan}`;
            document.querySelector(
                ".hari-kehamilan"
            ).textContent = `Hari ke ${diffDays}`;

            const updateSlider = (selector, value, max) => {
                const slider = document.querySelector(selector);
                const group = slider.closest(".progress-group");
                slider.value = Math.min(value, max);
                group.querySelector(".progress-fill").style.width = `${
                    (value / max) * 100
                }%`;
                group.querySelector(".progress-icon").style.left = `calc(${
                    (value / max) * 100
                }% - 12px)`;
                group.querySelector(".current-val").textContent = slider.value;
            };

            updateSlider(".progress-slider.minggu", minggu, 42);
            updateSlider(".progress-slider.trimester", trimester, 3);
        }

        if (result.dismiss === Swal.DismissReason.cancel) {
            window.location.href = "/";
        }
        // ⬇️ Tambahkan baris ini supaya tombol aktif lagi
        pasangEventTombol();
    });
}

function updateUI(data) {
    document.querySelector(".judul-usia-kehamilan").textContent =
        "Usia Kehamilan";
    document.querySelector(
        ".tanggal-kehamilan"
    ).textContent = `Tanggal HPHT: ${data.hphtDate.toLocaleDateString(
        "id-ID"
    )}`;
    document.querySelector(
        ".angka-besar"
    ).textContent = `${data.minggu} Minggu ${data.hari} Hari`;
    document.querySelector(
        ".trimester-text"
    ).textContent = `Trimester ${data.trimester}`;
    document.querySelector(
        ".bulan-kehamilan"
    ).textContent = `Bulan ke ${data.bulan}`;
    document.querySelector(
        ".hari-kehamilan"
    ).textContent = `Hari ke ${data.diffDays}`;

    document.getElementById("btnLihatInformasi").style.display = "inline-block";
    updateDeskripsiKehamilan(data.trimester, data.minggu);

    const updateSlider = (selector, value, max) => {
        const slider = document.querySelector(selector);
        if (!slider) return; // untuk jaga-jaga

        const group = slider.closest(".progress-group");
        slider.value = Math.min(value, max);
        group.querySelector(".progress-fill").style.width = `${
            (value / max) * 100
        }%`;
        group.querySelector(".progress-icon").style.left = `calc(${
            (value / max) * 100
        }% - 12px)`;
        group.querySelector(".current-val").textContent = slider.value;
    };

    updateSlider(".progress-slider.minggu", data.minggu, 42);
    updateSlider(".progress-slider.trimester", data.trimester, 3);

    // Tunggu tombol muncul, lalu pasang event
    tungguTombolLaluPasang();
}

function hitungDataKehamilan(hphtDate) {
    const today = new Date();
    const diffTime = today - hphtDate;
    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
    const minggu = Math.floor(diffDays / 7);
    const hari = diffDays % 7;
    const bulan = Math.floor(minggu / 4) + 1;
    const trimester = minggu <= 13 ? 1 : minggu <= 27 ? 2 : 3;

    const dueDate = new Date(hphtDate);
    dueDate.setDate(dueDate.getDate() + 280);
    const formattedDue = dueDate.toLocaleDateString("id-ID", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });

    return {
        hphtDate,
        minggu,
        hari,
        bulan,
        trimester,
        diffDays,
        formattedDue,
    };
}

function tungguTombolLaluPasang() {
    const interval = setInterval(() => {
        const btnEdit = document.getElementById("btnEditData");
        const btnInfo = document.getElementById("btnLihatInformasi");

        if (btnEdit && btnInfo) {
            clearInterval(interval);
            console.log("Tombol ditemukan, pasang event.");
            pasangEventTombol(); // ini yang penting
        }
    }, 50);
}

function updateDeskripsiKehamilan(trimester, minggu) {
    const deskripsiEl = document.querySelector(".deskripsi-kehamilan"); // pastikan elemen ini ada di HTML
    if (!deskripsiEl) return;

    let deskripsi = "";

    if (trimester === 1) {
        if (minggu <= 4) {
            deskripsi = "Sel telur telah dibuahi. Tubuh mulai beradaptasi.";
        } else if (minggu <= 8) {
            deskripsi =
                "Pembentukan organ vital dimulai. Asupan asam folat sangat penting.";
        } else {
            deskripsi =
                "Detak jantung janin mulai terdengar. Tetap jaga nutrisi dan istirahat.";
        }
    } else if (trimester === 2) {
        if (minggu <= 20) {
            deskripsi =
                "Janin mulai bergerak. Saatnya mulai rutin kontrol kehamilan.";
        } else {
            deskripsi =
                "Organ janin berkembang pesat. Perhatikan konsumsi zat besi.";
        }
    } else if (trimester === 3) {
        if (minggu <= 36) {
            deskripsi = "Persiapan kelahiran dimulai. Janin semakin aktif.";
        } else {
            deskripsi =
                "Janin siap dilahirkan. Siapkan perlengkapan persalinan dan konsultasi akhir.";
        }
    } else {
        deskripsi = "Data kehamilan di luar rentang normal.";
    }

    deskripsiEl.textContent = deskripsi;
}

function pasangEventTombol() {
    const btnEdit = document.getElementById("btnEditData");
    const btnInfo = document.getElementById("btnLihatInformasi");

    if (btnEdit) {
        btnEdit.onclick = bukaInputKehamilan;
    }

    if (btnInfo) {
        btnInfo.onclick = () => {
            const data = window.latestKehamilanData;
            if (!data || !data.hphtDate) return; // ⛔ Amanin dulu

            const today = new Date();
            if (data.hphtDate > today) return tampilkanSimulasiKehamilan(data);
            if (data.minggu > 42) return tampilkanFaseKelahiran(data);

            tampilkanInformasiKehamilan(data);
            pasangEventTombol(); // panggil lagi untuk jaga-jaga
        };
    }
}

function resetUIKehamilan() {
    document.querySelector(".judul-usia-kehamilan").textContent =
        "Usia Kehamilan";
    document.querySelector(".tanggal-kehamilan").textContent =
        "Tanggal HPHT: —";
    document.querySelector(".angka-besar").textContent = "—";
    document.querySelector(".trimester-text").textContent = "Trimester —";
    document.querySelector(".bulan-kehamilan").textContent = "Bulan ke —";
    document.querySelector(".hari-kehamilan").textContent = "Hari ke —";

    const resetSlider = (selector, max) => {
        const slider = document.querySelector(selector);
        if (!slider) return;
        slider.value = 0;
        const group = slider.closest(".progress-group");
        group.querySelector(".progress-fill").style.width = "0%";
        group.querySelector(".progress-icon").style.left = "-12px";
        group.querySelector(".current-val").textContent = "0";
    };

    resetSlider(".progress-slider.minggu", 42);
    resetSlider(".progress-slider.trimester", 3);

    const deskripsiEl = document.querySelector(".deskripsi-kehamilan");
    if (deskripsiEl) deskripsiEl.textContent = "Belum ada data kehamilan.";
}

function getUserKey() {
    if (typeof window.currentUserId === "undefined") {
        console.error("❌ currentUserId belum tersedia.");
        return null;
    }
    return `hpht_user_${window.currentUserId}`;
}

// ========== Saat Halaman Siap ==========
document.addEventListener("DOMContentLoaded", function () {
    if (typeof window.currentUserId === "undefined") {
        console.error("❌ currentUserId tidak tersedia.");
        return;
    }

    const userKey = getUserKey();
    if (!userKey) return;
    const hphtSebelumnya = localStorage.getItem(userKey);

    function jalankanDenganData(hphtDate) {
        const hasil = hitungDataKehamilan(hphtDate);
        window.latestKehamilanData = hasil;
        updateUI(hasil);
    }

    if (hphtSebelumnya) {
        const [year, month, day] = hphtSebelumnya.split("-").map(Number);
        const hphtDate = new Date(year, month - 1, day);

        if (!isNaN(hphtDate.getTime())) {
            jalankanDenganData(hphtDate);
        } else {
            localStorage.removeItem(userKey); // kalau rusak
            bukaInputKehamilan();
            pasangEventTombol();
            resetUIKehamilan(); // <- reset tampilan
        }
    } else {
        fetch("/kehamilan")
            .then((res) => res.json())
            .then((data) => {
                if (data && data.hpht) {
                    const [year, month, day] = data.hpht.split("-").map(Number);
                    const hphtDate = new Date(year, month - 1, day);

                    if (!isNaN(hphtDate.getTime())) {
                        // ✨ Sinkronkan localStorage
                        const localHpht = localStorage.getItem(userKey); // ✅ BENAR
                        const dbHphtFormatted = `${year}-${String(
                            month
                        ).padStart(2, "0")}-${String(day).padStart(2, "0")}`;

                        if (localHpht !== dbHphtFormatted) {
                            localStorage.setItem(userKey, dbHphtFormatted);
                        }

                        jalankanDenganData(hphtDate);
                    } else {
                        localStorage.removeItem(userKey);
                        bukaInputKehamilan();
                        pasangEventTombol();
                    }
                } else {
                    localStorage.removeItem(userKey); // pastikan kosong
                    bukaInputKehamilan();
                    pasangEventTombol();
                }
            })
            .catch((err) => {
                console.error("Gagal ambil data kehamilan:", err);
                bukaInputKehamilan();
                pasangEventTombol();
            });
    }
    
});
