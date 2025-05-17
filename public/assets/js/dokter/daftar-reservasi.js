// Fungsi untuk menampilkan tombol input atau edit hasil check-up
function toggleCheckupInput(selectElement, id) {
    const status = selectElement.value;
    const hasilCheckupSection = document.getElementById(`hasil-checkup-${id}`);

    // Menyembunyikan semua elemen input atau tombol
    hasilCheckupSection.innerHTML = '';

    if (status === 'Disetujui') {
        // Tampilkan form input hasil check-up jika statusnya "Disetujui"
        hasilCheckupSection.innerHTML = `
            <form action="/dokter/reservasi/${id}/hasil-checkup" method="POST" style="display:inline-block;">
                @csrf
                @method('POST')
                <textarea name="hasil_checkup" class="form-control" placeholder="Masukkan hasil check-up"></textarea>
                <button type="submit" class="btn btn-success">Simpan Hasil</button>
            </form>
        `;
    } else if (status === 'Selesai') {
        // Tampilkan tombol edit hasil check-up jika statusnya "Selesai"
        hasilCheckupSection.innerHTML = `
            <form action="/dokter/reservasi/${id}/hasil-checkup" method="POST" style="display:inline-block;">
                @csrf
                @method('POST')
                <textarea name="hasil_checkup" class="form-control" readonly>${document.querySelector('#hasil-checkup-' + id).dataset.hasilCheckup}</textarea>
                <button type="submit" class="btn btn-warning">Edit Hasil</button>
            </form>
        `;
    }
}
