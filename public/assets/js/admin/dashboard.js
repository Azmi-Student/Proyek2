function tambahPengguna() {
    Swal.fire({
        title: "Tambah Pengguna",
        html: `
          <input id="nama" class="swal2-input" placeholder="Nama">
          <input id="email" type="email" class="swal2-input" placeholder="Email">
          <input id="password" type="password" class="swal2-input" placeholder="Password">
          <select id="role" class="swal2-select">
              <option value="user">User</option>
              <option value="admin">Admin</option>
              <option value="dokter">Dokter</option> <!-- Opsi dokter ditambahkan -->

          </select>
      `,
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: "Simpan",
        preConfirm: () => {
            const nama = document.getElementById("nama").value;
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;
            const role = document.getElementById("role").value;

            if (!nama || !email || !password) {
                Swal.showValidationMessage("Semua field wajib diisi!");
                return false;
            }

            return { name: nama, email, password, role };
        },
    }).then((result) => {
        if (result.isConfirmed) {
            fetch("/admin/users", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                body: JSON.stringify(result.value),
            })
                .then((res) => res.json())
                .then((res) => {
                    if (res.success) {
                        Swal.fire(
                            "Berhasil",
                            "Pengguna berhasil ditambahkan!",
                            "success"
                        ).then(() => location.reload());
                    } else {
                        Swal.fire(
                            "Gagal",
                            res.message || "Terjadi kesalahan.",
                            "error"
                        );
                    }
                })
                .catch((err) => {
                    Swal.fire("Error", "Gagal menyimpan data.", "error");
                });
        }
    });
}

function editPengguna(id, name, email, role) {
    Swal.fire({
        title: "Edit Pengguna",
        html: `
            <input id="edit-name" class="swal2-input" placeholder="Nama" value="${name}">
            <input id="edit-email" class="swal2-input" placeholder="Email" value="${email}">
            <input id="edit-password" type="password" class="swal2-input" placeholder="Password Baru (Kosongkan jika tidak ingin mengubah)">
            <select id="edit-role" class="swal2-input">
                <option value="user" ${
                    role === "user" ? "selected" : ""
                }>User</option>
                <option value="admin" ${
                    role === "admin" ? "selected" : ""
                }>Admin</option>
                <option value="dokter" ${
                    role === "dokter" ? "selected" : ""
                }>Dokter</option>
            </select>`,
        showCancelButton: true,
        confirmButtonText: "Simpan",
        focusConfirm: false,
        preConfirm: () => {
            const nama = document.getElementById("edit-name").value;
            const email = document.getElementById("edit-email").value;
            const password = document.getElementById("edit-password").value;
            const role = document.getElementById("edit-role").value;

            if (!nama || !email || !role) {
                Swal.showValidationMessage("Semua field harus diisi!");
                return false;
            }

            const data = { name: nama, email, role };
            if (password) {
                data.password = password; // Menambahkan password baru jika diisi
            }

            return data;
        },
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/admin/users/${id}`, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                body: JSON.stringify(result.value),
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.success) {
                        Swal.fire(
                            "Berhasil",
                            "Data diperbarui!",
                            "success"
                        ).then(() => location.reload());
                    } else {
                        throw new Error(data.message || "Update gagal.");
                    }
                })
                .catch((err) => {
                    Swal.fire("Gagal", err.message, "error");
                });
        }
    });
}
