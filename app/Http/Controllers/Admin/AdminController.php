<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
{
    $users = User::all();
    return view('admin.dashboard', compact('users'));
}
    // Mengubah role user menjadi dokter
    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = 'dokter';  // Mengubah role menjadi dokter
        $user->save();

        return redirect()->route('admin.dashboard')->with('status', 'Role pengguna berhasil diubah menjadi dokter');
    }

    
}
