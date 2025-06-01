document.addEventListener("DOMContentLoaded", function () {
  const kalenderHeader = document.getElementById("kalenderHeader");
  const kalenderGrid = document.getElementById("kalenderGrid");
  const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                      "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

  let currentDate = new Date();

  function renderCalendar(date) {
    kalenderGrid.innerHTML = ""; // Kosongkan grid
    const year = date.getFullYear();
    const month = date.getMonth();
    kalenderHeader.textContent = `${monthNames[month]} ${year}`;

    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    const dayLabels = ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"];
    dayLabels.forEach(day => {
      const el = document.createElement("div");
      el.className = "day-label";
      el.textContent = day;
      kalenderGrid.appendChild(el);
    });

    for (let i = 0; i < (firstDay + 6) % 7; i++) {
      kalenderGrid.appendChild(document.createElement("div"));
    }

    for (let d = 1; d <= daysInMonth; d++) {
      const el = document.createElement("div");
      el.className = "date";
      const weekDay = new Date(year, month, d).getDay();
      if (weekDay === 0 || weekDay === 6) el.classList.add("weekend"); // Minggu atau Sabtu

      if (year === new Date().getFullYear() &&
          month === new Date().getMonth() &&
          d === new Date().getDate()) {
        el.classList.add("today");
      }
      el.textContent = d;
      kalenderGrid.appendChild(el);
    }
  }

  document.querySelector(".kalender-nav.prev").onclick = () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar(currentDate);
  };

  document.querySelector(".kalender-nav.next").onclick = () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar(currentDate);
  };

  renderCalendar(currentDate);
});

document.querySelectorAll(".aktivitas-gambar").forEach((img) => {
    img.addEventListener("click", () => {
      const videoUrl = img.getAttribute("data-video");
      if (!videoUrl) return;

      Swal.fire({
        html: `
          <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
            <iframe src="${videoUrl}" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen 
                    style="position: absolute; top:0; left:0; width:100%; height:100%;">
            </iframe>
          </div>`,
        width: 800,
        showConfirmButton: false,
        background: '#fff',
      });
    });
  });

  document.addEventListener("DOMContentLoaded", function () {
    const donasiBtn = document.querySelector(".donasi-btn");

    if (donasiBtn) {
        donasiBtn.addEventListener("click", function () {
            Swal.fire({
                title: "Pilih Nominal Donasi",
                input: "select",
                inputOptions: {
                    1000: "Rp 1.000",
                    5000: "Rp 5.000",
                    10000: "Rp 10.000",
                },
                inputPlaceholder: "Pilih nominal",
                showCancelButton: true,
                confirmButtonText: "Lanjut Pembayaran",
                cancelButtonText: "Batal",
                preConfirm: (value) => {
                    if (!value) {
                        Swal.showValidationMessage("Silakan pilih nominal");
                    }
                    return value;
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    initiatePayment(result.value);
                }
            });
        });
    }

    function initiatePayment(amount) {
        fetch("/donasi/token", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify({ amount: amount }),
        })
            .then((res) => res.json())
            .then((data) => {
                if (data.token) {
                    snap.pay(data.token, {
                        onSuccess: function (result) {
                            Swal.fire(
                                "Transaksi Berhasil",
                                "Pembayaran Anda telah berhasil!",
                                "success"
                            );
                            console.log("Success:", result);
                        },
                        onPending: function (result) {
                            Swal.fire(
                                "Menunggu Pembayaran",
                                "Silakan selesaikan pembayaran Anda.",
                                "info"
                            );
                            console.log("Pending:", result);
                        },
                        onError: function (result) {
                            Swal.fire(
                                "Transaksi Gagal",
                                "Terjadi kesalahan saat memproses transaksi.",
                                "error"
                            );
                            console.log("Error:", result);
                        },
                        onClose: function () {
                            Swal.fire(
                                "Dibatalkan",
                                "Kamu menutup pop-up sebelum menyelesaikan transaksi.",
                                "warning"
                            );
                            console.log("Popup closed");
                        },
                    });
                } else {
                    Swal.fire("Gagal", "Token tidak tersedia.", "error");
                }
            })
            .catch((error) => {
                console.error(error);
                Swal.fire(
                    "Gagal",
                    "Terjadi kesalahan saat memproses permintaan.",
                    "error"
                );
            });
    }
});
