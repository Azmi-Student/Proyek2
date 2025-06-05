<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            logger('Update request data:', $request->all()); // ⬅️ Log semua data yang masuk

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:3',
                'role' => 'required|in:user,admin,dokter',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);


            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
{
    try {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(), // Pastikan email tetap unik kecuali milik pengguna ini
            'password' => 'nullable|min:6',  // Password hanya valid jika diisi
        ]);

        // Temukan pengguna yang sedang login
        $user = auth()->user();

        // Data yang akan diupdate
        $dataToUpdate = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Jika password diisi, lakukan hashing dan update
        if ($request->password) {
            $dataToUpdate['password'] = Hash::make($request->password);  // Hash password baru
        }

        // Update pengguna dengan data yang sudah disiapkan
        $user->update($dataToUpdate);

        // Arahkan kembali ke halaman pengaturan dengan pesan sukses
        return redirect()->route('fitur.pengaturan')->with('success', 'Profil berhasil diperbarui!');
    } catch (\Exception $e) {
        // Tangani error dan kembalikan pesan kesalahan
        return back()->withErrors(['error' => $e->getMessage()]);
    }
}





    public function destroy($id)
    {
        if (auth()->id() == $id) {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        User::destroy($id);
        return redirect()->back()->with('success', 'Pengguna dihapus.');
    }
}
