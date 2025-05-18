// Fungsi untuk menampilkan tombol input hasil check-up dan popup SweetAlert
function toggleCheckupInput(selectElement, id) {
    const status = selectElement.value;
    const hasilCheckupSection = document.getElementById(`hasil-checkup-${id}`);

    // Menyembunyikan semua elemen input atau tombol sebelumnya
    hasilCheckupSection.innerHTML = '';

    if (status === 'Disetujui') {
        // Tampilkan tombol input hasil check-up jika statusnya "Disetujui"
        hasilCheckupSection.innerHTML = `
            <button class="btn btn-success" onclick="showCheckupPopup(${id})">Input Hasil</button>
        `;
    } else if (status === 'Selesai') {
        // Tampilkan tombol edit hasil check-up jika statusnya "Selesai"
        hasilCheckupSection.innerHTML = `
            <button class="btn btn-warning" onclick="showCheckupPopup(${id})">Edit Hasil</button>
        `;
    }
}

// Fungsi untuk menampilkan popup SweetAlert dengan form input
function showCheckupPopup(reservasiId) {
    // Mengambil data hasil check-up yang sudah tersimpan dari server
    fetch(`/dokter/reservasi/${reservasiId}/get-hasil-checkup`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Jika data hasil check-up ada, tampilkan data tersebut di form
                Swal.fire({
                    title: 'Masukkan Hasil Check-Up',
                    html: `
                        <form id="checkupForm">
                            <textarea id="hasilCheckup" class="form-control" placeholder="Masukkan hasil check-up" required>${data.hasil_checkup}</textarea>
                            <br>
                            <label for="catatan">Catatan:</label>
                            <textarea id="catatan" class="form-control" placeholder="Masukkan catatan tambahan (optional)">${data.catatan || ''}</textarea>
                        </form>
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Simpan Hasil',
                    cancelButtonText: 'Batal',
                    preConfirm: () => {
                        const hasilCheckup = document.getElementById('hasilCheckup').value;
                        const catatan = document.getElementById('catatan').value;
                        return { hasilCheckup, catatan };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mengirim data hasil check-up ke server untuk disimpan
                        saveCheckupResults(reservasiId, result.value.hasilCheckup, result.value.catatan);
                    }
                });
            } else {
                // Jika data hasil check-up belum ada, tampilkan form kosong
                Swal.fire({
                    title: 'Masukkan Hasil Check-Up',
                    html: `
                        <form id="checkupForm">
                            <textarea id="hasilCheckup" class="form-control" placeholder="Masukkan hasil check-up" required></textarea>
                            <br>
                            <label for="catatan">Catatan:</label>
                            <textarea id="catatan" class="form-control" placeholder="Masukkan catatan tambahan (optional)"></textarea>
                        </form>
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Simpan Hasil',
                    cancelButtonText: 'Batal',
                    preConfirm: () => {
                        const hasilCheckup = document.getElementById('hasilCheckup').value;
                        const catatan = document.getElementById('catatan').value;
                        return { hasilCheckup, catatan };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mengirim data hasil check-up ke server untuk disimpan
                        saveCheckupResults(reservasiId, result.value.hasilCheckup, result.value.catatan);
                    }
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire('Gagal!', 'Terjadi kesalahan saat mengambil data hasil check-up.', 'error');
        });
}


// Fungsi untuk menyimpan hasil check-up ke server
function saveCheckupResults(reservasiId, hasilCheckup, catatan) {
    fetch(`/dokter/reservasi/${reservasiId}/hasil-checkup`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({
            hasil_checkup: hasilCheckup,
            catatan: catatan,
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire('Berhasil!', 'Hasil check-up berhasil disimpan.', 'success');

            // Menyegarkan halaman setelah berhasil menyimpan hasil
            location.reload();  // Halaman akan ter-refresh untuk menampilkan data terbaru

        } else {
            Swal.fire('Gagal!', 'Terjadi kesalahan saat menyimpan hasil.', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire('Gagal!', 'Terjadi kesalahan saat menyimpan hasil.', 'error');
    });
}

