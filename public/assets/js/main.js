const bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
    "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
const now = new Date();
const daysInMonth = new Date(now.getFullYear(), now.getMonth()+1, 0).getDate();

document.getElementById("bulan").textContent = bulan[now.getMonth()];
document.getElementById("tahun").textContent = now.getFullYear();

const grid = document.getElementById("kalender-grid");
for (let i = 1; i <= daysInMonth; i++) {
const dayDiv = document.createElement("div");
dayDiv.textContent = i;
grid.appendChild(dayDiv);
}