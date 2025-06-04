function toggleDetails(detailId) {
    const details = document.getElementById(detailId);
    // Toggle the visibility of the detail section
    if (details.style.display === "none" || details.style.display === "") {
        details.style.display = "block";  // Menampilkan detail
    } else {
        details.style.display = "none";  // Menyembunyikan detail
    }
}

// Fungsi untuk membuka gambar dalam modal
function openImage(imageSrc) {
    Swal.fire({
        imageUrl: imageSrc,         // URL gambar yang akan ditampilkan
        imageWidth: '80%',          // Lebar gambar di dalam modal
        imageAlt: 'Gambar Hasil Check-Up',  // Deskripsi gambar
        showCloseButton: true,      // Menampilkan tombol close
        showConfirmButton: false,   // Menyembunyikan tombol konfirmasi
        width: '600px',             // Ukuran modal
        heightAuto: true            // Menyesuaikan tinggi gambar
    });
}

function showPrintPopup(detailId) {
    // Ambil elemen detail yang ingin diprint (termasuk semua data)
    const element = document.querySelector(`#${detailId} .rekap-item-printable`);

    // Menggunakan html2canvas untuk menangkap elemen HTML sebagai gambar
    html2canvas(element).then((canvas) => {
        const imgData = canvas.toDataURL('image/png');
        
        // Menampilkan popup dengan SweetAlert2
        Swal.fire({
            title: 'Preview Data untuk Print',
            html: `
                <div style="text-align: center;">
                    <img src="${imgData}" style="width: 100%; max-width: 500px;"/>
                    <p><strong>Hasil Check-Up</strong></p>
                    <p>Data yang akan dicetak</p>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Print',
            cancelButtonText: 'Close',
        }).then((result) => {
            if (result.isConfirmed) {
                // Setelah konfirmasi, buat PDF dan unduh
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();
                
                const pageWidth = doc.internal.pageSize.getWidth();
                const imgWidth = pageWidth - 20; // Margin kiri dan kanan 10px
                const imgHeight = canvas.height * imgWidth / canvas.width;

                // Menambahkan gambar ke PDF, hanya gambar hasil check-up
                doc.addImage(imgData, 'PNG', 10, 10, imgWidth, imgHeight);
                doc.save('hasil-checkup.pdf');  // Nama file PDF
            }
        });
    }).catch((error) => {
        console.error('Gagal mengambil elemen HTML:', error);
    });
}
