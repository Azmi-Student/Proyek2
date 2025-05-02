function showForm() {
    document.getElementById('dokterList').style.display = 'none';
    document.getElementById('formReservasi').style.display = 'block';
    document.getElementById('petunjukReservasi').style.display = 'none';

    const card = event.target.closest('.dokter-card');
    const nama = card.querySelector('h3').innerText;
    const deskripsi = card.querySelector('p').innerText;
    const gambarSrc = card.querySelector('img').src;

    document.getElementById('namaDokter').innerText = nama;
    document.getElementById('deskripsiDokter').innerText = deskripsi;
    document.getElementById('gambarDokter').src = gambarSrc;
}

function handleKembali() {
    const form = document.getElementById('formReservasi');
    const dokterList = document.getElementById('dokterList');
    const petunjuk = document.getElementById('petunjukReservasi');

    if (form.style.display === 'block') {
        form.style.display = 'none';
        dokterList.style.display = 'grid';
        petunjuk.style.display = 'block';
    } else {
        window.location.href = 'main.html';
    }
}

// === Logika kirim reservasi ===
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formReservasiForm');

    form.addEventListener('submit', function (e) {
        e.preventDefault(); // mencegah reload

        const namaPasien = document.getElementById('nama').value;
        const jadwal = document.getElementById('jadwal').value;
        const dokter = document.getElementById('namaDokter').innerText;

        // Format tanggal dari option jadwal (bisa kamu sesuaikan)
        const tanggal = jadwal === 'senin' ? 'Senin, 08:00 - 10:00' : 'Rabu, 13:00 - 15:00';

        // Tempel ke dalam tabel antrean
        const tabel = document.querySelector('.tabel-antrean');
        const row = document.createElement('div');
        row.className = 'tabel-row';
        row.innerHTML = `
            <div><input type="checkbox" /></div>
            <div>${tanggal}</div>
            <div>Reservasi dengan ${dokter}</div>
            <div>Pasien: ${namaPasien}</div>
            <div>Belum Diajukan</div>
        `;
        tabel.appendChild(row);

        // Reset form
        form.reset();
    });
});