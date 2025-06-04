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
    fetch(`/dokter/reservasi/${reservasiId}/get-hasil-checkup`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Jika data hasil check-up ada, tampilkan data tersebut di form
                Swal.fire({
                    title: 'Masukkan Hasil Check-Up',
                    html: `
                        <form id="checkupForm" enctype="multipart/form-data">
                            <textarea id="hasilCheckup" class="form-control" placeholder="Masukkan hasil check-up" required>${data.hasil_checkup}</textarea>
                            <br>
                            <label for="catatan">Catatan:</label>
                            <textarea id="catatan" class="form-control" placeholder="Masukkan catatan tambahan (optional)">${data.catatan || ''}</textarea>
                            <br>
                            <label for="usia">Usia:</label>
                            <input type="number" id="usia" class="form-control" placeholder="Usia Pasien" value="${data.usia || ''}">
                            <br>
                            <label for="beratBadan">Berat Badan:</label>
                            <input type="number" step="0.1" id="beratBadan" class="form-control" placeholder="Berat Badan" value="${data.berat_badan || ''}">
                            <br>
                            <label for="detakJantungJanin">Detak Jantung Janin:</label>
                            <input type="number" step="0.1" id="detakJantungJanin" class="form-control" placeholder="Detak Jantung Janin" value="${data.detak_jantung_janin || ''}">
                            <br>
                            <label for="kondisiCairanKetuban">Kondisi Cairan Ketuban:</label>
                            <input type="text" id="kondisiCairanKetuban" class="form-control" placeholder="Kondisi Cairan Ketuban" value="${data.kondisi_cairan_ketuban || ''}">
                            <br>
                            <label for="keluhan">Keluhan:</label>
                            <textarea id="keluhan" class="form-control" placeholder="Keluhan Pasien">${data.keluhan || ''}</textarea>
                            <br>
                            <label for="gambarCheckup">Gambar Hasil Check-Up (Max 3 gambar):</label>
                            <input type="file" id="gambarCheckup" class="form-control" multiple accept="image/*" />
                        </form>
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Simpan Hasil',
                    cancelButtonText: 'Batal',
                    preConfirm: () => {
                        const hasilCheckup = document.getElementById('hasilCheckup').value;
                        const catatan = document.getElementById('catatan').value;
                        const usia = document.getElementById('usia').value;
                        const beratBadan = document.getElementById('beratBadan').value;
                        const detakJantungJanin = document.getElementById('detakJantungJanin').value;
                        const kondisiCairanKetuban = document.getElementById('kondisiCairanKetuban').value;
                        const keluhan = document.getElementById('keluhan').value;
                        const gambarCheckup = document.getElementById('gambarCheckup').files;

                        return { 
                            hasilCheckup, catatan, usia, beratBadan, 
                            detakJantungJanin, kondisiCairanKetuban, 
                            keluhan, gambarCheckup 
                        };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        saveCheckupResults(reservasiId, result.value.hasilCheckup, result.value.catatan, result.value.usia, result.value.beratBadan, result.value.detakJantungJanin, result.value.kondisiCairanKetuban, result.value.keluhan, result.value.gambarCheckup);
                    }
                });
            } else {
                Swal.fire({
                    title: 'Masukkan Hasil Check-Up',
                    html: `
                        <form id="checkupForm" enctype="multipart/form-data">
                            <textarea id="hasilCheckup" class="form-control" placeholder="Masukkan hasil check-up" required></textarea>
                            <br>
                            <label for="catatan">Catatan:</label>
                            <textarea id="catatan" class="form-control" placeholder="Masukkan catatan tambahan (optional)"></textarea>
                            <br>
                            <label for="usia">Usia:</label>
                            <input type="number" id="usia" class="form-control" placeholder="Usia Pasien">
                            <br>
                            <label for="beratBadan">Berat Badan:</label>
                            <input type="number" step="0.1" id="beratBadan" class="form-control" placeholder="Berat Badan">
                            <br>
                            <label for="detakJantungJanin">Detak Jantung Janin:</label>
                            <input type="number" step="0.1" id="detakJantungJanin" class="form-control" placeholder="Detak Jantung Janin">
                            <br>
                            <label for="kondisiCairanKetuban">Kondisi Cairan Ketuban:</label>
                            <input type="text" id="kondisiCairanKetuban" class="form-control" placeholder="Kondisi Cairan Ketuban">
                            <br>
                            <label for="keluhan">Keluhan:</label>
                            <textarea id="keluhan" class="form-control" placeholder="Keluhan Pasien"></textarea>
                            <br>
                            <label for="gambarCheckup">Gambar Hasil Check-Up (Max 3 gambar):</label>
                            <input type="file" id="gambarCheckup" class="form-control" multiple accept="image/*" />
                        </form>
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Simpan Hasil',
                    cancelButtonText: 'Batal',
                    preConfirm: () => {
                        const hasilCheckup = document.getElementById('hasilCheckup').value;
                        const catatan = document.getElementById('catatan').value;
                        const usia = document.getElementById('usia').value;
                        const beratBadan = document.getElementById('beratBadan').value;
                        const detakJantungJanin = document.getElementById('detakJantungJanin').value;
                        const kondisiCairanKetuban = document.getElementById('kondisiCairanKetuban').value;
                        const keluhan = document.getElementById('keluhan').value;
                        const gambarCheckup = document.getElementById('gambarCheckup').files;

                        return { 
                            hasilCheckup, catatan, usia, beratBadan, 
                            detakJantungJanin, kondisiCairanKetuban, 
                            keluhan, gambarCheckup 
                        };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        saveCheckupResults(reservasiId, result.value.hasilCheckup, result.value.catatan, result.value.usia, result.value.beratBadan, result.value.detakJantungJanin, result.value.kondisiCairanKetuban, result.value.keluhan, result.value.gambarCheckup);
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
function saveCheckupResults(reservasiId, hasilCheckup, catatan, usia, beratBadan, detakJantungJanin, kondisiCairanKetuban, keluhan, gambarCheckup) {
    let formData = new FormData();
    formData.append('hasil_checkup', hasilCheckup);
    formData.append('catatan', catatan);
    formData.append('usia', usia);
    formData.append('berat_badan', beratBadan);
    formData.append('detak_jantung_janin', detakJantungJanin);
    formData.append('kondisi_cairan_ketuban', kondisiCairanKetuban);
    formData.append('keluhan', keluhan);

    // Tambahkan gambar (maks 3 gambar)
    for (let i = 0; i < gambarCheckup.length; i++) {
        formData.append('gambar_checkup[]', gambarCheckup[i]);
    }

    fetch(`/dokter/reservasi/${reservasiId}/hasil-checkup`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire('Berhasil!', 'Hasil check-up berhasil disimpan.', 'success');
            location.reload();
        } else {
            Swal.fire('Gagal!', 'Terjadi kesalahan saat menyimpan hasil.', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire('Gagal!', 'Terjadi kesalahan saat menyimpan hasil.', 'error');
    });
}



