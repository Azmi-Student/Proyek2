<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
{
    $users = \App\Models\User::all();
    return view('admin.dashboard', compact('users'));
}


    
}
