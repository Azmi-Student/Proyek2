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

    public function update(Request $request, $id)
{
    try {
        // Validasi data input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required|in:user,admin,dokter',
            'password' => 'nullable|min:6',  // Password hanya valid jika diisi
        ]);

        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Data yang akan diupdate
        $dataToUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        // Jika password diisi, lakukan hashing dan update
        if ($request->password) {
            $dataToUpdate['password'] = Hash::make($request->password);  // Hash password baru
        }

        // Update pengguna dengan data yang sudah disiapkan
        $user->update($dataToUpdate);

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        // Tangani error dan kembalikan pesan kesalahan
        return response()->json([
            'success' => false,
            'message' => $e->getMessage(),
        ], 422);
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
