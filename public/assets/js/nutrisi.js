function tampilkanPanduanNutrisi(trimester, bulan, minggu, hari) {
    fetch(`/api/nutrisi?trimester=${trimester}&bulan=${bulan}&minggu=${minggu}&hari=${hari}`)
        .then(response => response.json())
        .then(data => {
            if (data.selesai) {
                Swal.fire({
                    title: '🎉 Fase Kehamilan Selesai!',
                    text: data.pesan,
                    icon: 'success',
                    confirmButtonColor: '#e75480',
                    confirmButtonText: 'Oke'
                });
                return;
            }

            Swal.fire({
                title: 'Panduan Nutrisi 🍼',
                html: `
                    <div style="text-align: left; font-size: 14px;">
                        <p>📆 <strong>Hari ke-${hari}:</strong><br>${data.harian}</p>
                        <p>📅 <strong>Minggu ke-${minggu}:</strong><br>${data.mingguan}</p>
                        <p>🗓️ <strong>Bulan ke-${bulan}:</strong><br>${data.bulanan}</p>
                        <p>👶 <strong>Trimester ${trimester}:</strong><br>${data.panduan_trimester}</p>
                        <hr>
                        <p>🥦 <strong>Rekomendasi Makanan:</strong>
                            <ul>${data.rekomendasi.map(item => `<li>${item}</li>`).join('')}</ul>
                        </p>
                        <p>⚠️ <strong>Makanan yang Dihindari:</strong>
                            <ul>${data.hindari.map(item => `<li>${item}</li>`).join('')}</ul>
                        </p>
                    </div>
                `,
                confirmButtonColor: '#e75480',
                confirmButtonText: 'Oke'
            });
        })
        .catch(err => {
            console.error('Gagal mengambil data nutrisi:', err);
            Swal.fire('Gagal memuat data nutrisi', '', 'error');
        });
}
